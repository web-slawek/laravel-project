<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Request;
use Session;
use DB;

class UploadController extends Controller {

    public function upload() {
        // getting all of the post data
        $file = array('image' => Input::file('image'));

		$tytul = Input::get('title');
		$podpis = Input::get('subtitle');

		$image = Input::file('image');
		$img_name = $image->getClientOriginalName();

        //setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = $img_name;

                
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message

                DB::insert('insert into gallery (title, subtitle, image) values (?,?,?)', [$tytul, $podpis, $fileName]);

                Session::flash('success', 'Upload successfully');
                return Redirect::to('upload');
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');
            }
        }
    }

    public function show(){
    	$lista = DB::select('select * from gallery');

    	//$gallery = \App\Gallery::get();

    	return view('lista')->with('lista', $lista);

		// echo '<pre>';
		// 	print_r($lista);
		// echo '</pre>';
    	//return 'test';
    }

}
