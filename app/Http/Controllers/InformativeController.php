<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class InformativeController extends Controller
{
    public function index(){
        //$templates = Template::all();
        //$templates = Template::Template()->paginate(5);, compact('templates')
        $templates = Template::Template()->paginate(8);
        return view('informatives.index', compact('templates'));
    }

    public function all(Request $request)
    {   
       /*$templates = \DB::table('templates')
        ->select('templates.*')
        ->orderBy('id','DESC')
        ->get();

        return response(json_encode($templates),200)->header('Content-type','text/plain');*/
        $templates = Template::simplePaginate(5);

        return view('informatives.index', compact('templates'));
    }

    public function show($id){
        $template = Template::find($id);

        return response()->json($template);
    }
}
