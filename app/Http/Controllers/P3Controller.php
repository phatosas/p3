<?php

namespace p3\Http\Controllers;

use Illuminate\Http\Request;

use p3\Http\Requests;

use \Kieranajp\Generator\Generator;

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
		'words' => 'required|numeric|min:1|max:9', 
		]);
		//dd($request->all());

        $g = new Generator();
		$password = array('word');
		$i = 1;
		
		while ($i < intval($request["words"])){
			array_push($password, 'word');
			$i++;
		}
		if ($request["number"] == "on"){
			array_push($password, 'num');
		}
		if ($request["sym"] == "on"){
			array_push($password, 'symbol');
		}
		$g->setFormat($password);

		return $g->generate();
    }
}
