<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controller\AuthorController;
use App\Models\Type;
use Exception;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->param['title'] = 'Tipe';
    }
    public function index()
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;
        $this->param['data'] = Type::all();

        return view('backend.type.index', $this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->param['title'] = 'Edit Data Tipe';
        $this->param['linkBaru'] = 'type';
        $this->param['subtitleBaru'] = 'Tipe';
        $this->param['data'] = Type::findOrFail($id);
        return view('backend.type.update', $this->param);
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
            'tipe' => 'required|string'
        ],[
            'required' => ':Attribute harus terisi',
            'string' => ':Attribute Data tidak boleh angka'
        ],[
            'tipe' => 'Tipe data'
        ]);

        try {
            $updateType  = Type::findOrFail($id);
            $updateType->type = $request->tipe;
            $updateType->save();

            alert()->success('Berhasil mengganti data Tipe', 'Sukses')->autoclose(3000);
            return redirect()->route('type');
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
        //
    }
}
