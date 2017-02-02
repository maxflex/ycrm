<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Yacht;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $yacht_id = intval($request->input('yacht_id'));
        if ($request->hasFile('photos')) {
            $fileExtension = $request->file('photos')->extension();
            $fileName = rand() . rand() . rand() . '.' . $fileExtension;

            $request->file('photos')->storeAs('yachts', $fileName);

            if ($yacht_id && ($yacht = Yacht::find($yacht_id))) {
                $yacht->photos = array_merge($yacht->photos, [$fileName]);
                $yacht->save();
            }

            return $fileName;
        } else {
            abort(400);
        }
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($id && ($yacht = Yacht::find($id))) {
            $yacht->photos =  array_diff($yacht->photos, [$request->input('photo')]);
            $yacht->save();
        }
        Storage::delete('yachts/' . $request->input('photo'));
    }
}
