<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Konten;
use App\Models\AndroidUser;
class ContentController extends Controller
{
    public function allType(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $type = Type::find($id);

            if ($type) {
                return ResponseFormatter::success($type, 'Data Type Berhasil Diambil');
            }else{
                return ResponseFormatter::eror(null, 'Data produk tidak ada', 404);
            }
        }else{
            $type = Type::all();
            if ($type) {
                return ResponseFormatter::success($type, 'Data Type Berhasil Diambil');
            }else{
                return ResponseFormatter::eror(null, 'Data produk tidak ada', 404);
            }
        }
    }
    public function allMeditasi(Request $request)
    {
      $meditasi = Konten::select('content.*',
                        'authors.id AS id_author', 'authors.name_author', 'authors.gender', 'authors.jobs',
                        'category.id AS id_kategori', 'category.type_id', 'category.name_category',
                        'type.id AS id_type', 'type.type')
                        ->join('authors', 'authors.id', 'content.authors_id')
                        ->join('category', 'category.id', 'content.category_id')
                        ->join('type', 'type.id', 'category.type_id')
                        ->where('type.id', 3)
                        ->orderBy('content.id','DESC')
                        ->get();
        if ($meditasi) {
            return ResponseFormatter::success($meditasi, 'Data Meditasi Berhasil Diambil');
        }else{
            return ResponseFormatter::eror(null, 'Data produk tidak ada', 404);
        }
    }
    public function allYoga(Request $request)
    {
        $yoga = Konten::select('content.*',
            'authors.id AS id_author', 'authors.name_author', 'authors.gender', 'authors.jobs',
            'category.id AS id_kategori', 'category.type_id', 'category.name_category',
            'type.id AS id_type', 'type.type')
            ->join('authors', 'authors.id', 'content.authors_id')
            ->join('category', 'category.id', 'content.category_id')
            ->join('type', 'type.id', 'category.type_id')
            ->where('type.id', 2)
            ->orderBy('content.id','DESC')
            ->get();
        if ($yoga) {
            return ResponseFormatter::success($yoga, 'Data Meditasi Berhasil Diambil');
        }else{
            return ResponseFormatter::eror(null, 'Data produk tidak ada', 404);
        }
            }
    public function allOlahraga(Request $request)
    {
        $olahraga = Konten::select('content.*',
        'authors.id AS id_author', 'authors.name_author', 'authors.gender', 'authors.jobs',
        'category.id AS id_kategori', 'category.type_id', 'category.name_category',
        'type.id AS id_type', 'type.type')
        ->join('authors', 'authors.id', 'content.authors_id')
        ->join('category', 'category.id', 'content.category_id')
        ->join('type', 'type.id', 'category.type_id')
        ->where('type.id', 1)
        ->orderBy('content.id','DESC')
        ->get();

        if ($olahraga) {
            return ResponseFormatter::success($olahraga, 'Data Meditasi Berhasil Diambil');
        }else{
            return ResponseFormatter::eror(null, 'Data produk tidak ada', 404);
        }
    }

    public function registerAndroid(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
        ]);
        $addAndroidUser = new AndroidUser;
        $addAndroidUser->name = $request->name;
        $addAndroidUser->age = $request->age;
        $addAndroidUser->gender = $request->gender;
        $addAndroidUser->save();
        if ($addAndroidUser) {
            return ResponseFormatter::success($addAndroidUser, 'Data User Android Berhasil Diambil');
        }else{
            return ResponseFormatter::eror(null, 'Data User android tidak ada', 404);
        }
    }
}
