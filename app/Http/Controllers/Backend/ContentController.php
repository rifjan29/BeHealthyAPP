<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use wapmorgan\Mp3Info\Mp3Info;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Authors;
use App\Models\Konten;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->param['title'] = 'Data Konten';
    }
    public function index()
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;
        $this->param['data'] = Konten::select('content.*',
                                            'authors.id AS id_author', 'authors.name_author', 'authors.gender', 'authors.jobs',
                                            'category.id AS id_kategori', 'category.type_id', 'category.name_category',
                                            'type.id AS id_type', 'type.type')
                                            ->join('authors', 'authors.id', 'content.authors_id')
                                            ->join('category', 'category.id', 'content.category_id')
                                            ->join('type', 'type.id', 'category.type_id')
                                            ->orderBy('content.id','DESC')
                                            ->get();
        return view('backend.content.index', $this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['category'] = Category::select('category.*',
                                                    'type.id AS id_type', 'type.type')
                                                ->join('type','type.id', 'category.type_id')
                                                ->get();
        $this->param['authors'] = Authors::all();                
        $this->param['title'] = 'Tambah data konten';
        $this->param['linkBaru']='content';
        $this->param['subtitleBaru']='Konten';
        return view('backend.content.create', $this->param);
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
            'cover' => 'mimes:png,jpg,jpeg|required',
            'category' => 'required',
            'narator' => 'required',
            // 'file' => 'mimes:gif,mp3',
            'deskripsi' => 'required'
        ]);
        try {
            $data = $this->getIdKategori($request->get('category'));
            $id_type = $data[1];
            $id_category = $data[0];
    
            $cover = $request->file('cover');
            $date = date("His");  // 17:16:18
            $dateCover = str_replace('-','',$date); 
            $input['file'] = $dateCover.'.'.$cover->getClientOriginalExtension();
    
            $addContent = new Konten;
            $addContent->authors_id = $request->get('narator');
            $addContent->category_id =$id_category;
            $addContent->desc = $request->get('deskripsi');
            $file = $request->file('file');
            switch ($id_type) {
                case 3:
                    $path = public_path('uploads/cover/meditasi');
                    $folder = 'uploads/cover/meditasi/'.$input['file'];
                    $coverFile = Image::make($cover->getRealPath());
    
                    if (isset($cover)) {
                        $coverFile->resize(200, 200, function($constraint){
                            $constraint->aspectRatio();
                        })->save($path.'/'.$input['file']);
                        $path = public_path('uploads/cover/meditasi');
                        $cover->move($path, $input['file']);
                        $addContent->cover = $input['file'];
                    }
                    $extension = $request->file('file')->getClientOriginalExtension();
                    $file_audio = date('His').'.'.$extension;
                    $size = $request->file('file')->getSize();
                    if ($data = $file->move('uploads/meditasi',$file_audio)) {
                        $duration_audio = new Mp3Info($data, true);
                        $audio_duration = floor($duration_audio->duration / 60).''.PHP_EOL;
                    };
                    $addContent->file = $file_audio;
                    $addContent->duration = $audio_duration;
                    break;
                case 2:
                    $path = public_path('uploads/cover/yoga');
                    $folder = 'uploads/cover/yoga/'.$input['file'];
                    $coverFile = Image::make($cover->getRealPath());
                   
                    if (isset($cover)) {
                            $coverFile->resize(200, 200, function($constraint){
                                $constraint->aspectRatio();
                            })->save($path.'/'.$input['file']);
                            $path = public_path('uploads/cover/yoga');
                            $cover->move($path, $input['file']);
                            $addContent->cover = $input['file'];
                        }
                    //  return $request->get('youtube');
                    $addContent->duration = null;
                    $addContent->link_youtube = $request->get('youtube');
                    
                    break;
                case 1:
                    $path = public_path('uploads/cover/olahraga');
                    $folder = 'uploads/cover/olahraga/'.$input['file'];
                    $coverFile = Image::make($cover->getRealPath());
 
                    if (isset($cover)) {
                        $coverFile->resize(200, 200, function($constraint){
                            $constraint->aspectRatio();
                        })->save($path.'/'.$input['file']);
                        $path = public_path('uploads/cover/olahraga');
                        $cover->move($path, $input['file']);
                        $addContent->cover = $input['file'];
                    }
                    $gif_image = $request->file('file');
                    if ($gif_image->getClientOriginalExtension() == 'gif') {
                        $gif_image = $request->file('file');
                        $gif_filename = date('His').'.'.$gif_image->getClientOriginalExtension();
                        $gif_location = public_path('/uploads/olahraga/');
                        // Image::make($gif_image)->save($gif_location);
                        $gif_image->move($gif_location,$gif_filename);
                    }
                    $addContent->duration = null;
                    $addContent->file = $gif_filename;
                    break;
                default:
                break;
            };
            $addContent->save();
            alert()->success('Berhasil menambahkan data Konten','Sukses')->autoclose(3000);
            return redirect('dashboard/content');
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
    public function getIdKategori($kategori)
    {
        $type_id = explode('-', $kategori);
        return $type_id;
    }
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
        $this->param['data'] = Konten::select('content.*',
                            'authors.id AS id_author', 'authors.name_author', 'authors.gender', 'authors.jobs',
                            'category.id AS id_kategori', 'category.type_id', 'category.name_category',
                            'type.id AS id_type', 'type.type')
                            ->join('authors', 'authors.id', 'content.authors_id')
                            ->join('category', 'category.id', 'content.category_id')
                            ->join('type', 'type.id', 'category.type_id')
                            ->where('content.id',$id)
                            ->first();
        $this->param['category'] = Category::select('category.*',
                                    'type.id AS id_type', 'type.type')
                                ->join('type','type.id', 'category.type_id')
                                ->get();
                                // return $this->param['data'];
        $this->param['authors'] = Authors::all();                
        $this->param['title'] = 'Edit data konten';
        $this->param['linkBaru']='content';
        $this->param['subtitleBaru']='Konten';
        return view('backend.content.update', $this->param);
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
        // return $request;
        $request->validate([
            'cover' => 'mimes:png,jpg,jpeg|required',
            'category' => 'required',
            'narator' => 'required',
            // 'file' => 'mimes:gif,mp3',
            'deskripsi' => 'required'
        ]);
        try {
            $data = $this->getIdKategori($request->get('category'));
            $id_type = $data[1];
            $id_category = $data[0];
    
            $cover = $request->file('cover');
            $date = date("His");  // 17:16:18
            $dateCover = str_replace('-','',$date); 
            $input['file'] = $dateCover.'.'.$cover->getClientOriginalExtension();
    
            $updateKonten = Konten::find($id);
            $updateKonten->authors_id = $request->get('narator');
            $updateKonten->category_id =$id_category;
            $updateKonten->desc = $request->get('deskripsi');
            $file = $request->file('file');
            switch ($id_type) {
                case 3:
                    $path = public_path('uploads/cover/meditasi');
                    $folder = 'uploads/cover/meditasi/'.$input['file'];
                    $coverFile = Image::make($cover->getRealPath());
                    
                    // cover lama
                    if (isset($cover)) {
                        $lastImage = 'uploads/cover/meditasi/'.$updateKonten->cover;
                        if (File::exists($lastImage)) {
                            File::delete($lastImage);    
                        }else{
        
                            echo "Ttidak ada data public";
                        }
                        $coverFile->resize(200, 200, function($constraint){
                            $constraint->aspectRatio();
                        })->save($path.'/'.$input['file']);
                        $path = public_path('uploads/cover/meditasi');
                        $cover->move($path, $input['file']);
                        $updateKonten->cover = $input['file'];
                    }

                    // audio lama
                    if ($request->file('file') != null && $request->file('file') != '' ) {
                        $extension = $request->file('file')->getClientOriginalExtension();
                        $file_audio = date('His').'.'.$extension;
                        $size = $request->file('file')->getSize();
                        if ($data = $file->move('uploads/meditasi',$file_audio)) {
                            $duration_audio = new Mp3Info($data, true);
                            $audio_duration = floor($duration_audio->duration / 60).''.PHP_EOL;
                        };
                        $last_audio = 'uploads/meditasi/'.$updateKonten->file;
                        if (File::exists($last_audio)) {
                            File::delete($last_audio);    
                        }else{
        
                            echo "Ttidak ada data public";
                        }
                    };
                    $updateKonten->file = $file_audio;
                    $updateKonten->duration = $audio_duration;
                    break;
                case 2:
                    $path = public_path('uploads/cover/yoga');
                    $folder = 'uploads/cover/yoga/'.$input['file'];
                    $coverFile = Image::make($cover->getRealPath());
                    if (isset($cover)) {
                        $lastImage = 'uploads/cover/yoga/'.$updateKonten->cover;
                        if (File::exists($lastImage)) {
                            File::delete($lastImage);    
                        }else{
        
                            echo "Ttidak ada data public";
                        }
                        $coverFile->resize(200, 200, function($constraint){
                            $constraint->aspectRatio();
                        })->save($path.'/'.$input['file']);
                        $path = public_path('uploads/cover/yoga');
                        $cover->move($path, $input['file']);
                        $updateKonten->cover = $input['file'];
                    }
                    $updateKonten->duration = null;
                    $updateKonten->link_youtube = $request->get('youtube');
                    break;
                case 1:
                    // cover lama
                    $path = public_path('uploads/cover/olahraga');
                    $folder = 'uploads/cover/olahraga/'.$input['file'];
                    $coverFile = Image::make($cover->getRealPath());
                    $lastImage = 'uploads/cover/olahraga/'.$updateKonten->cover;
                    if (isset($cover)) {
                        if (File::exists($lastImage)) {
                            File::delete($lastImage);    
                        }else{
        
                            echo "Ttidak ada data public";
                        }
                        $coverFile->resize(200, 200, function($constraint){
                            $constraint->aspectRatio();
                        })->save($path.'/'.$input['file']);
                        $path = public_path('uploads/cover/olahraga');
                        $cover->move($path, $input['file']);
                        $updateKonten->cover = $input['file'];
                    }
                    $gif_image = $request->file('file');
                    if (isset($gif_image) != null && isset($gif_image) != '') {
                        if ($gif_image->getClientOriginalExtension() == 'gif') {
                            $gif_image = $request->file('file');
                            $gif_filename = date('His').'.'.$gif_image->getClientOriginalExtension();
                            $gif_location = public_path('/uploads/olahraga/');
                            $gif_image->move($gif_location,$gif_filename);
                            $last_gif = '/uploads/olahraga/'.$updateKonten->file;
                            if (File::exists($last_gif)) {
                                File::delete($last_gif);    
                            }else{
            
                                echo "Ttidak ada data public";
                            }
                        }
                        $updateKonten->duration = null;
                        $updateKonten->file = $gif_filename;
                    }
                    
                    break;
                default:
                break;
            };
            $updateKonten->save();
            alert()->success('Berhasil mengganti data Konten','Sukses')->autoclose(3000);
            return redirect('dashboard/content');
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
            $deleteKonten = Konten::select('content.*',
                                        'authors.id AS id_author', 'authors.name_author', 'authors.gender', 'authors.jobs',
                                        'category.id AS id_kategori', 'category.type_id', 'category.name_category',
                                        'type.id AS id_type', 'type.type')
                                        ->join('authors', 'authors.id', 'content.authors_id')
                                        ->join('category', 'category.id', 'content.category_id')
                                        ->join('type', 'type.id', 'category.type_id')
                                        ->where('content.id',$id)
                                        ->first();
            $kode_type = $deleteKonten->id_type;
            $file_cover = $deleteKonten->cover;

          
            switch ($kode_type) {
                case 3:
                    $img_path = public_path().'/uploads/cover/meditasi/';
                    $file_cover = $img_path . $file_cover;
                    File::delete($file_cover);

                    $audio_path = public_path().'/uploads/meditasi/';
                    $file_audio = $audio_path . $file;
                    File::delete($file_audio);
                    break;
                case 2:
                    $img_path = public_path().'/uploads/cover/yoga/';
                    $file_cover = $img_path . $file_cover;
                    File::delete($file_cover);
                    break;
                case 1:
                    $img_path = public_path().'/uploads/cover/olahraga/';
                    $file_cover = $img_path . $file_cover;
                    File::delete($file_cover);

                    // gif
                    $gif_path = public_path().'/uploads/olahraga/';
                    $file_gif = $gif_path . $deleteKonten->file;
                    File::delete($file_gif);
                    break;
                default:
                    # code...
                    break;
            }
            $deleteKonten->delete();
            alert()->warning('Data berhasil dihapus')->autoclose(3000);
            return redirect()->route('content');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function changeStatus($id, $status)
    {
        try {
            $noAktif = 0;
            $changeStatus = Konten::findOrFail($id);
            if ($changeStatus->id == $id && $status == '1') {
                $changeStatus->status = $noAktif;
                $changeStatus->update();
            }else{
                $noAktif = 1;
                $changeStatus->status = $noAktif;
                $changeStatus->update(); 
            }

        }catch(Exception $e){
            alert()->error($e->getMessage(), 'Error');
        }catch(\Illuminate\Database\QueryException $e){
            alert()->error($e->getMessage(), 'Database Error');
        }finally{
            alert()->success('Berhasil Mengganti data', 'Sukses')->autoclose(2000);
            return redirect()->route('content');
        }
    }
}
