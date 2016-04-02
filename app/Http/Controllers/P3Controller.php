<?php

namespace p3\Http\Controllers;

use Illuminate\Http\Request;

use p3\Http\Requests;

class P3Controller extends Controller
{
    public function getIndexLoremIpsum()
    {
        return view('lorem-ipsum.index');
    }
	public function getIndexUserGenerator()
    {
        return view('user-generator.index');
    }
	public function getIndexXkcdGenerator()
    {
        return view('xkcd-generator.index');
    }
    public function postIndexLoremIpsum(Request $request)
    {
		$this->validate($request, [
		'paragraphs' => 'required|numeric|max:99', 
		]);
		
        return 'Generate Lorem Ipsum';
    }
    public function postIndexUserGenerator(Request $request)
    {
		$this->validate($request, [
		'users' => 'required|numeric|max:99', 
		]);
		//dd($request->all());
        return 'Generate Users';
    }
    public function postIndexXkcdGenerator(Request $request)
    {
		$this->validate($request, [
		'words' => 'required|numeric|max:9', 
		]);
		dd($request->all());
        return 'Generate Xkcd passwords';
    }
}
