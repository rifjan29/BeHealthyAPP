<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Type;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->param['title'] = 'Kategori';
    }
    public function index()
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;
        $this->param['data'] = Category::all();
        return view('backend.category.index', $this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['title'] = 'Tambah Data';
        $this->param['linkBaru'] = 'category';
        $this->param['subtitleBaru'] = 'Kategory';
        $this->param['tipe'] = Type::all();
        return view('backend.category.create',$this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'kategori' => 'required|string',
            'tipe' => 'required'
        ],[
            'required' => ':Attribute harus terisi',
            'string' => ':Attribute tidak boleh angka'
        ],[
            'kategori' => 'Data Kategori',
            'tipe' => 'Data Tipe'
        ]);

        try {
            $addCategory = new Category();
            $addCategory->name_category = $request->kategori;
            if ($request->tipe != 0) {
                $addCategory->type_id = $request->tipe;
            }else{
                alert()->warning('Kategori tidak boleh kosong', 'Gagal')->autoclose(3000);
                return redirect()->route('category.create');

            }
            $addCategory->save();
            alert()->success('Berhasil Menambah data kategori', 'Sukses')->autoclose(3000);
            return redirect()->route('category');
        } catch (Exception $e) {
            return $e;
        }catch(\Illuminate\Database\QueryException $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->param['tit;e'] = 'Edit Data Kategori ';
        $this->param['subtitleBaru'] = 'Kategori';
        $this->param['linkBaru'] = 'category';
        $this->param['type'] = Type::all();
        $this->param['data'] = Category::findOrFail($id);

        return view('backend.category.update', $this->param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string',
            'tipe' => 'required'
        ],[
            'required' => ':Attribute harus terisi',
            'string' => ':Attribute tidak boleh angka'
        ],[
            'kategori' => 'Data Kategori',
            'tipe' => 'Data Tipe'
        ]);

        try {
            $updateCategory = Category::findOrFail($id);
            $updateCategory->name_category = $request->kategori;
            $updateCategory->type_id = $request->tipe;
            $updateCategory->updated_at = date('Y-m-d H:m:s');
            $updateCategory->save();

            alert()->success('Berhasil Mengganti data kategori', 'Sukses')->autoclose(3000);
            return redirect()->route('category');
        } catch (Exception $e) {
            return $e;
        }catch(\Illuminate\Database\QueryException $e){
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCategory = Category::find($id);
        $deleteCategory->delete();
        return redirect()->route('category');
    }
}
