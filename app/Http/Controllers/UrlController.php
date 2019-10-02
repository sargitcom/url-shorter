<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use App\Http\Helpers\Url;
use App\Http\Repository\UrlRepository;
use \Illuminate\Http\Request;

class UrlController extends Controller
{
    public function welcome(Request $request)
    {
        if ($request->isMethod('post')) {

            $validatedData = $request->validate([
                'link' => 'required|max:2048|url',
            ]);

            $repository = new UrlRepository();
            $linkId = $repository->createLink($request->input('link'));

            $encodedId = Url::encode($linkId);

            echo $encodedId;
            die;
        }

        $data = [];

        return view('welcome', $data);
    }

    public function redirectToUri(Request $request, $id)
    {
        try {
            $repository = new UrlRepository();
            $link = $repository->getLinkById(Url::decode($id));
            return redirect($link);
        } catch (\Exception $e) {
            return view('no_such_link');
        }
    }
}
