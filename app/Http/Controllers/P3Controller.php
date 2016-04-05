<?php

namespace p3\Http\Controllers;

use Illuminate\Http\Request;

use p3\Http\Requests;

use \Kieranajp\Generator;

use \Badcow\LoremIpsum;

use Faker\Factory as Faker;

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
		
		$data = $request->all();
		
        $generator = new LoremIpsum\Generator();
		
		$paragraphs = $generator->getParagraphs($data["paragraphs"]);
		
		return view('lorem-ipsum.index')->with('paragraph', $paragraphs);
		
    }
    public function postIndexUserGenerator(Request $request)
    {
		$this->validate($request, [
		'users' => 'required|numeric|max:99', 
		]);
		//dd($request->all());
		$faker = Faker::create();
		
		$my_users = array('users');
		$i = 0;
		
		while ($i < intval($request["users"])){
			array_push($my_users, $faker->name);
			if ($request["birthdate"] == "on"){
				array_push($my_users, $faker->date);
			}
			if ($request["profile"] == "on"){
				array_push($my_users, $faker->phoneNumber);
				array_push($my_users, $faker->address);
				array_push($my_users, $faker->email);
				array_push($my_users, $faker->text);
			}
			array_push($my_users, "\n");
			$i++;
		}
		return view('user-generator.index')->with(['user' => $my_users]);
		
    }
    public function postIndexXkcdGenerator(Request $request)
    {
		$this->validate($request, [
		'words' => 'required|numeric|min:1|max:9', 
		]);

        $g = new Generator\Generator();
		$my_password = array('word');
		$i = 1;
		
		while ($i < intval($request["words"])){
			array_push($my_password, 'word');
			$i++;
		}
		if ($request["number"] == "on"){
			array_push($my_password, 'num');
		}
		if ($request["sym"] == "on"){
			array_push($my_password, 'symbol');
		}
		$g->setFormat($my_password);

		$password = $g->generate();
		
		return view('xkcd-generator.index')->with('password', $password);
    }
}
