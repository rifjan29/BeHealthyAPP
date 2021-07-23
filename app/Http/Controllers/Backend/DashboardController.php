<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Authors;
use App\Models\Konten;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function index()
    {
        $pengguna = Auth::user();
        if (isset($pengguna) != null) {
            Session::put('id', $pengguna->id);
            Session::put('name', $pengguna->name);
            Session::put('photos', $pengguna->photos);

            $this->param['artikel'] = Article::all()->count();

            $this->param['authors'] = Authors::all()->count();
    
            $this->param['content'] = Konten::all()->count();
    
            $this->param['type'] = Type::all()->count();
            // return $this->param['data'];
    
            return view('dashboard',$this->param);
        }else{
            return redirect()->route('login');
        }

       
    }


}
