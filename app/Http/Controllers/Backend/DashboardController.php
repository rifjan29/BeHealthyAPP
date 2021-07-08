<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Authors;
use App\Models\Konten;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $this->param['artikel'] = Article::all()->count();

        $this->param['authors'] = Authors::all()->count();

        $this->param['content'] = Konten::all()->count();

        $this->param['type'] = Type::all()->count();

        return view('dashboard',$this->param);

    }

    // Untuk tampilan landing page
    public function landingPage()
    {
        $this->param['artikel'] = Article::select('*')
                                           ->orderBy('id','DESC')
                                           ->limit('4')
                                           ->get();
        // $this->param['type'] = Type::all();
        // return $this->param;
        return view('welcome', $this->param);   
    }

    public function detailArtikel($slug)
    { 
        $this->param['detailArtikel'] = Article::select('*')
                                                 ->where('slug', $slug)
                                                 ->get();
        return view('detailArtikel');
    }

}
