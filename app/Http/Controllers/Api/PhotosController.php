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
        if ($request->hasFile('photos')) {
            $extension = $request->file('photos')->extension();
            $photo = uniqid() . '.' . $extension;
            $request->file('photos')->storeAs(Yacht::UPLOAD_DIR, $photo);
            if ($request->yacht_id && ($yacht = Yacht::find($request->yacht_id))) {
                $yacht->photos = array_merge($yacht->photos, [$photo]);
                $yacht->save();
            }
            return $photo;
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
        if ($id && ($yacht = Yacht::find($id))) {
            $yacht->photos = array_diff($yacht->photos, [$request->photo]);
            $yacht->save();
        }
        Storage::delete(Yacht::UPLOAD_DIR . $request->photo);
    }
}
