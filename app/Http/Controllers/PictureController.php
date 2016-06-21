<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Picture;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $pictures = \App\Picture::orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->select('id', 'title', 'min')
            ->paginate(12);

        if($request->ajax())
            return response()->json($pictures);

        return view('pictures.index', ['pictures' => $pictures]);
    }

    public function getNewPicture(Request $request)
    {
        if(!$request->ajax())
            return redirect('pictures');

        if(Auth::user() && Auth::user()->can('create-picture'))
            return view('pictures.modal', ['picture' => null]);
        else
            abort(403);
    }

    public function getPicture($id, Request $request)
    {
        if(!$request->ajax())
            return redirect('pictures');

        $validator = Validator::make(['id' => $id], [
            'id' => ['required', 'numeric', 'exists:pictures,id'],
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 400);

        $picture = \App\Picture::find($id);

        return view('pictures.modal', ['picture' => $picture]);
    }

    public function postPicture(Request $request)
    {
        // Check request params
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:64'],
            'description' => ['required', 'string', 'max:2048'],
            'picture' => ['required', 'mimes:jpg,jpeg,png', 'image', 'max:5000'],
        ]);

        if ($validator->fails())
            return response()->json(['status' => 'error', 'data' => $validator->errors()], 400);

        $image = $request->file('picture');
        $filename = str_random(32);
        $extension = $image->getClientOriginalExtension();

        \File::MakeDirectory(public_path('assets/pictures'));

        $picture = new Picture();
        $picture->origin = 'assets/pictures/' . $filename . '.' . $extension;
        $picture->min = 'assets/pictures/' . $filename . '_min' . '.' . $extension;

        \Intervention\Image\Facades\Image::make($image->getRealPath())
            ->fit(600, 400)
            ->save(public_path($picture->origin));

        \Intervention\Image\Facades\Image::make($image->getRealPath())
            ->fit(200, 140)
            ->save(public_path($picture->min));

        $picture->title = $request->input('title');
        $picture->description = $request->input('description');
        $picture->save();

        return response()->json([ 'status' => 'success' ]);
    }

    public function putPicture($id, Request $request)
    {
        //return response()->json(['status' => 'error', 'data' => $request->all()], 400);

        // Check request params
        $validator = Validator::make(array_merge(['id' => $id], $request->all()), [
            'id' => ['required', 'numeric', 'exists:pictures,id'],
            'title' => ['string', 'max:64'],
            'description' => ['string', 'max:2048'],
            'picture' => ['mimes:jpg,jpeg,png', 'image', 'max:5000'],
            'img_changed' => ['boolean'],
        ]);

        if ($validator->fails())
            return response()->json(['status' => 'error', 'data' => $validator->errors()], 400);

        $picture = Picture::find($id);

        if($request->input('img_changed') == 1)
        {
            $picture->deleteCovers();

            $image = $request->file('picture');
            $filename = str_random(32);
            $extension = $image->getClientOriginalExtension();

            $picture->origin = 'assets/pictures/' . $filename . '.' . $extension;
            $picture->min = 'assets/pictures/' . $filename . '_min' . '.' . $extension;

            \Intervention\Image\Facades\Image::make($image->getRealPath())
                ->fit(600, 400)
                ->save(public_path($picture->origin));

            \Intervention\Image\Facades\Image::make($image->getRealPath())
                ->fit(200, 140)
                ->save(public_path($picture->min));
        }

        $picture->title = $request->input('title');
        $picture->description = $request->input('description');
        $picture->save();

        return response()->json([ 'status' => 'success' ]);
    }

    public function deletePicture($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => ['required', 'numeric', 'exists:pictures,id'],
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 400);

        $picture = Picture::find($id);
        $picture->delete();

        return response()->json([ 'status' => 'success' ]);
    }
}
