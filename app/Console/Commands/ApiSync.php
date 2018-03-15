<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Api\Yacht;
use App\Models\Api\Company;
use App\Models\Api\Price;
use App\Models\Api\Location;
use App\Service\Api;

class ApiSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Charter companies
        $companies = Api::call(Api::COMPANIES);

        Company::truncate();

        foreach($companies['companies'] as $company) {
            Company::create($company);
            $company_yachts = Api::call(Api::YACHTS . $company['id']);
            Yacht::truncate();
            Price::truncate();
            foreach($company_yachts['yachts'] as $yacht) {
                Yacht::create($yacht);
                foreach($yacht['seasonSpecificData'][0]['prices'] as $price) {
                    $price['yacht_id'] = $yacht['id'];
                    Price::create($price);
                }
            }
        }

        // Locations
        Location::truncate();

        $locations = Api::call(Api::LOCATIONS);
        foreach($locations['locations'] as $location) {
            $location['name'] = isset($location['name']['textRU']) ? $location['name']['textRU'] : $location['name']['textEN'];
            Location::create($location);
        }
    }
}
