<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use Exception;
use Illuminate\Http\Request;
use App\Models\Category;
class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $param;

    public function __construct()
    {
        $this->param['title'] = 'Data Narator';
    }
    public function index()
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;
        $this->param['data'] = Authors::all();
        return view('backend.authors.index', $this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['title'] = "Tambah Data";
        $this->param['linkBaru'] = 'authors';
        $this->param['subtitleBaru'] = 'Narator';
        return view('backend.authors.create',$this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;
        $validateData = $request->validate([
            'name' => 'required|string|min:2',
            'jobs' => 'max:100',
            'gender' => 'required'
        ],
        [
            'required' => ':attribute harus terisi',
            'jobs.max' => ':attribute Data tidak boleh lebih dari 100 karakter.',
            'string' => 'data tidak boleh angka',
            'min' => ':attribute tidak boleh kurang dari 4 karakter.',
        ],
        [
            'name' => 'Nama Narator',
            'jobs' => 'Pekerjaan',
            'gender' => 'Jenis Kelamin'
        ]);
        

        try {
            $newAuthor = new Authors;
            $newAuthor->name_author = $request->name;
            $newAuthor->gender = $request->gender;
            if (isset($request->jobs)) {
                $newAuthor->jobs = $request->jobs;
             }else{
                $newAuthor->jobs = null;
            }
            $newAuthor->save();
            alert()->success('Berhasil menambahkan data Narator','Sukses')->autoclose(3000);
            return redirect('dashboard/authors');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->param['title'] = "Edit Data";
        $this->param['linkBaru'] = 'authors';
        $this->param['subtitleBaru'] = 'Narator';
        try {
            $this->param['data'] = Authors::where('authors.id', $id)->first();
            return view('backend.authors.update', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
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
        try {
            $updateAuthor = Authors::find($id);
            $updateAuthor->name_author = $request->name;
            $updateAuthor->gender = $request->gender;
            $updateAuthor->updated_at = date('Y-m-d H:m:s');
            if (isset($request->jobs)) {
                $updateAuthor->jobs = $request->jobs;
             }else{
                $updateAuthor->jobs = null;
            }
            $updateAuthor->save();
            alert()->warning('Berhasil Mengganti data Narator','Sukses')->autoclose(3000);
            return redirect('dashboard/authors');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
        // $request->validate([
        //     'name' => 'required',
        //     'jobs' => 'required|min:5',
        //     'gender' => 'required'
        // ],
        // [
        //     'required' => 'Data harus terisi',
        //     'min' => 'Data harus lebih dari 5 karakter'
        // ]);
        // $updateAuthor = Authors::findOrFail($id);
        // $updateAuthor->name_author = $request->name;
        // $updateAuthor->jobs = $request->jobs;
        // $updateAuthor->gender = $request->gender;
        // $updateAuthor->updated_at = date('Y-m-d H:m:s');
        // $updateAuthor->save();
        // return redirect('dashboard/authors');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteAuthor = Authors::findOrFail($id);
        $deleteAuthor->delete();
        alert()->warning('Data berhasil dihapus')->autoclose(3000);
        return redirect('dashboard/authors');
    }
}
