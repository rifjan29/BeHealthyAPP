<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchOldPassword;
// use App\User as Userid;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->param['title'] = 'Pengguna Admin' ;
        
    }
    public function index()
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;
        $this->param['data'] = User::all();
        return view('backend.users.index', $this->param);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['title'] = "Tambah Data";
        $this->param['linkBaru'] = 'pengguna-admin';
        $this->param['subtitleBaru'] = 'Pengguna';
        return view('backend.users.create',$this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'username' => 'required|min:4|unique:users,username,except,id',
            'gender' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'photos' => 'image|mimes:jpeg,png,jpg',
        ],[
            'unique' => 'Username Sudah Digunakan',
            'required' => 'Data Harus Terisi',
            'mimes' => 'Format diharuskan jpeg,png,jpg',    
        ]);
       
        try {
            $addPengguna = new User();
            $addPengguna->name = $request->get('name');
            $addPengguna->username = $request->get('username');
            $addPengguna->gender = $request->get('gender');
            $addPengguna->password = Hash::make($request->get('password'));

            $photosProfile = $request->file('photos');
            $date = date("Y-m-d");  // 17:16:18
            $datePhotos = str_replace('-','',$date); 
            $input['file'] = $datePhotos.$request->get('username').'.'.$photosProfile->getClientOriginalExtension();
            
            // tempat penyimpanan
            $path = public_path('uploads/profile');
            $folder = 'uploads/profile/'.$input['file'];
            $imgFile = Image::make($photosProfile->getRealPath());

            if (isset($photosProfile)) {
                // resize image
                $imgFile->resize(200,200, function($constraint){
                    $constraint->aspectRatio();
                })->save($path.'/'.$input['file']);

                $path = public_path('uploads/profile');
                $photosProfile->move($path, $input['file']);
                $addPengguna->photos = $input['file'];
            }else{
                alert()->danger('Gagal periksa kembali data anda')->autclose(3000);
                return redirect()->route('pengguna-admin.create');
            }
            
            $addPengguna->save();
            alert()->success('Data berhasil ditambahkan','Sukses')->autoclose(3000); 
            return redirect()->route('pengguna-admin');

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
        $this->param['title'] = "Edit Data";
        $this->param['linkBaru'] = "pengguna-admin";
        $this->param['subtitleBaru'] = "Pengguna Admin";
        $this->param['data'] = User::find($id);
        return view('backend.users.update', $this->param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    // 'username' => 'required|min:4|unique:users,username,except,id',
    {
        return $request;
        $request->validate([
            'name' => 'required|min:5',
            'username' => 'required|min:4',
            'gender' => 'required',
            'password' => ['required', new MatchOldPassword],
            'photos' => 'image|mimes:jpeg,png,jpg',
        ],[
            'unique' => 'Username Sudah Digunakan',
            'required' => 'Data Harus Terisi',
            'mimes' => 'Format diharuskan jpeg,png,jpg'   
        ]);

        try {
            $updatePengguna = User::find($id);
            $updatePengguna->name = $request->get('name');
            $updatePengguna->username = $request->get('username');
            $updatePengguna->gender = $request->get('gender');
            // $updatePengguna->password = Hash::make($request->get('password'));

            $photosProfile = $request->file('photos');
            $date = date("Y-m-d");  // 17:16:18
            $datePhotos = str_replace('-','',$date); 
            $input['file'] = $datePhotos.$request->get('username').'.'.$photosProfile->getClientOriginalExtension();
            
            // tempat penyimpanan
            $path = public_path('uploads/profile');
            $folder = 'uploads/profile/'.$input['file'];
            $imgFile = Image::make($photosProfile->getRealPath());

            if (isset($photosProfile) != null && isset($photosProfile) != '' ) {
                // Hapus foto lama
                $lastImage = 'uploads/profile/'.$updatePengguna->photos;
                if (File::exists($lastImage)) {
                    File::delete($lastImage);    
                }else{

                    echo "Ttidak ada data public";
                }

                // resize image
                $imgFile->resize(200,200, function($constraint){
                    $constraint->aspectRatio();
                })->save($path.'/'.$input['file']);
                
                $path = public_path('uploads/profile');
                $photosProfile->move($path, $input['file']);
                $updatePengguna->photos = $input['file'];
            }else{
                echo "Tidak ada data baru";
            }
                $updatePengguna->updated_at = date('Y-m-d H:m:s');
                $updatePengguna->save();
                // alert()->danger('Gagal periksa kembali data anda')->autclose(3000);
                alert()->warning('Data Berhasil Diupdate', 'Sukses')->autoclose(3500);
                return redirect()->route('pengguna-admin');
            
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
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
        try {
            $deletePengguna = User::find($id);
            $deletePhotos = 'uploads/profile/'.$deletePengguna->photos;
            if (File::exists($deletePhotos)) {
                File::delete($deletePhotos);    
            }else{

                echo "Ttidak ada data public";
            }
            $deletePengguna->delete();
            alert()->warning('Data berhasil dihapus')->autoclose(3000);
            return redirect()->route('pengguna-admin');
            
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
       
    }

    // Reset Password
    public function editPassword()
    {
       $resetPassword = Auth::user();
    
       return view('layouts.backend.reset-password')->with('resetPassword', $resetPassword);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => ['required', new MatchOldPassword],
            'password_baru' => 'min:6|required',
            'ulangi_password'=> 'required|min:6|same:password_baru'
        ],[
            'min' => 'minimaal jumlah password adalah 6',
            'same' => 'Ulangi Password baru harus sesuai'
        ]);
            // $resetPassword = Auth::user();
            // $id = $resetPassword->id;
        // $updatePassword = Auth::user()->idate;
        // $updatePengguna->password = $request->get('password_baru');
        // $updatePassword->save();   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password_baru)]);
        alert()->success('Berhasil Mengganti Password','Sukses')->autoclose(3500); 
        return redirect()->route('dashboard');
    }
}

