<?php

namespace App\Models;

use \Shared\Model;

class User extends Model
{
    protected $connection = 'egecrm';
    protected $table = 'admins';


    protected $commaSeparated = ['rights'];

    const USER_TYPE    = 'USER';
    const DEFAULT_COLOR = 'black';

    # Fake system user
    const SYSTEM_USER = [
        'id'    => 0,
        'login' => 'system',
    ];

    /**
     * Если пользователь заблокирован,то его цвет должен быть черным
     */
    public function getColorAttribute()
    {
        if ($this->allowed(\Shared\Rights::ERC_BANNED)) {
            return static::DEFAULT_COLOR;
        } else {
            return $this->attributes['color'];
        }
    }

    /**
     * Вход пользователя
     */
    public static function login($data)
    {
        $query = dbEgecrm('users')->where('email', $data['login']);

         # проверка логина
        if ($query->exists()) {
            $user_id = $query->value('id_entity');
        } else {
            // self::log(null, 'failed_login', 'неверный логин', ['login' => $data['login']]);
            return false;
        }

        # проверка пароля
        $query->where('password', static::_password($data['password']));
        if (! $query->exists()) {
            // self::log($user_id, 'failed_login', 'неверный пароль');
            return false;
        }

        $user = self::find($query->value('id_entity'));

        if ($user->isBanned()) {
            // self::log($user_id, 'failed_login', 'пользователь заблокирован');
        } else {
            $allowed_to_login = $user->allowedToLogin();
            # из офиса или есть доступ вне офиса
            if ($allowed_to_login) {
                $_SESSION['user'] = $user;
                return true;
            }
        }

        return false;
    }

    public static function logout()
    {
        unset($_SESSION['user']);
    }

    public static function id()
    {
        return User::fromSession()->id;
    }

    /*
	 * Проверяем, залогинен ли пользователь
	 */
	public static function loggedIn()
	{
        return isset($_SESSION["user"]) && $_SESSION["user"] 	// пользователь залогинен
            && ! User::fromSession()->isBanned()      			// и не заблокирован
            && User::fromSession()->allowedToLogin(); 			// и можно входить
	}


    /*
	 * Пользователь из сессии
	 * @boolean $init – инициализировать ли соединение с БД пользователя
	 * @boolean $update – обновлять данные из БД
	 */
	public static function fromSession($upadte = false)
	{
		// Если обновить данные из БД, то загружаем пользователя
		if ($upadte) {
			$User = User::find($_SESSION["user"]->id);
			$User->toSession();
		} else {
			// Получаем пользователя из СЕССИИ
			$User = $_SESSION['user'];
		}

		// Возвращаем пользователя
		return $User;
	}

    /**
     * Текущего пользователя в сессию
     */
    public function toSession()
    {
        $_SESSION['user'] = $this;
    }

    /**
     * Вернуть системного пользователя
     */
    public static function getSystem()
    {
        return (object)static::SYSTEM_USER;
    }

    /**
	 * Вернуть пароль, как в репетиторах
	 *
	 */
	private static function _password($password)
	{
		$password = md5($password."_rM");
        $password = md5($password."Mr");

		return $password;
	}

    /**
     * Get real users
     *
     */
    public static function scopeActive($query)
    {
        return $query->whereRaw('NOT FIND_IN_SET(' . \Shared\Rights::ERC_BANNED . ', rights)');
    }

    public function isBanned()
    {
        return $this->allowed(\Shared\Rights::WSTAT_BANNED);
    }

    /**
     * Логин из офиса
     */
    public static function fromOffice()
    {
        return app('env') == 'local' || strpos($_SERVER['HTTP_X_REAL_IP'], '213.184.130.') === 0;
    }

    /**
     * User has rights to perform the action
     */
    public function allowed($right)
    {
        return in_array($right, $this->rights);
    }

    /**
	 * Можно ли логиниться с этого IP?
	 */
	public function allowedToLogin()
	{
        if (app('env') === 'local') {
            return (object)[
                'confirm_by_sms' => false
            ];
        }

        $current_ip = ip2long($_SERVER['HTTP_X_REAL_IP']);
        $admin_ips = dbEgecrm('admin_ips')->where('id_admin', $this->id)->get();
        foreach($admin_ips as $admin_ip) {
            $ip_from = ip2long(trim($admin_ip->ip_from));
            $ip_to = ip2long(trim($admin_ip->ip_to ?: $admin_ip->ip_from));
            if ($current_ip >= $ip_from && $current_ip <= $ip_to) {
                return $admin_ip;
            }
        }

        return false;
	}
}
