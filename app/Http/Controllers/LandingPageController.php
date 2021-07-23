<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class LandingPageController extends Controller
{
    private $param;
    public function index()
    {
        $this->param['artikel'] = Article::select('*')
        ->orderBy('id','DESC')
        ->limit('4')
        ->get();
        // $this->param['type'] = Type::all();
        // return $this->param;
        return view('welcome', $this->param); 
    }
    public function detailArticle($slug)
    {
        $this->param['artikel'] = Article::where('slug', $slug)->first();
        return view('detailArtikel', $this->param);
    }
}
