<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class InformativeController extends Controller
{
    public function index(){
        $templates = Template::all();
        return view('informatives.index', compact('templates'));
    }

   
}
