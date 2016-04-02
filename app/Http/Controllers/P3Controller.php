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
    public function postIndex()
    {
        return 'Process the rate index';
    }
}
