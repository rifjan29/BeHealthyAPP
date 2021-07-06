<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Exception;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
// use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{


    public function __construct() {
        $this->param['title'] = 'Artikel';
    }
    public function index()
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;
        $this->param['data'] = Article::all();
        return view('backend.article.index', $this->param);
    }


    public function create()
    {
        $this->param['title'] = 'Tambah Data';
        $this->param['linkBaru'] = 'article';
        $this->param['subtitleBaru'] = 'Artikel';
        return view('backend.article.create',$this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'cove_artikel' => 'required|mimes:png,jpg,jpeg',
        //     'title' => 'required|string',
        //     'deskripsi' =>'required',
        // ],
        // [
        //     'required' => 'Data harus terisi',
        //     'mimes' => 'Ekstensi Harus png, jpg, jpeg',

        // ]);
      try {
        $slug = Str::slug($request->title, "-");
        $addArticle = new Article();
        $addArticle->user_id = $request->userId;
        $addArticle->title = $request->title;
        $addArticle->slug = $slug;

        // input cover artikel
        $image = $request->file('cover_artikel');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('uploads/article/cover');

        $imgFile = Image::make($image->getRealPath());

        $imgFile->resize(200,200, function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['file']);

        if (isset($input['file'])) {
            $destinationPath = public_path('uploads/article/cover');
            $image->move($destinationPath, $input['file']);
            $addArticle->cover = $input['file'];
        }
        // end input artikel

        // input gambar deskripsi artikel
        $storage = 'uploads/article';
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/',$src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $fileNameArticle = uniqid();
                $fileNameArticleRand = substr(md5($fileNameArticle),6,6).'_'.time();
                $filePath = ("$storage/$fileNameArticleRand.$mimeType");
                $image = Image::make($src)
                        ->resize(1200, 1200)
                        ->encode($mimeType,100)
                        ->save(public_path($filePath));
                $new_src = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src',$new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }
        // end input deskripsi artikel
        $deskripsi = $dom->saveHTML();
        $addArticle->desc = $deskripsi;
        $addArticle->save();
        alert()->success('Data berhasil ditambahkan','Sukses')->autoclose(3000);
        return redirect()->route('article');

        }catch( Exception $e ){
            return $e;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
       }
}




    //     $addArticle->desc = $dom->saveHTML();
    //     $addArticle->save();

    //     return view('backend.authors.index');
    //   } catch (Exception $e) {
    //     return $e;
    //   }catch(\Illuminate\Database\QueryException $e){
    //     return $e;
    //   }

        // return view('backend.article.index');
        // // return $slug;

    // }

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
        $this->param['title'] = "Edit Data Artikel";
        $this->param['linkBaru'] = 'article';
        $this->param['subtitleBaru'] = 'Artikel';
        $this->param['data'] = Article::findOrFail($id);

        return view('backend.article.update', $this->param);
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
        $updateArticle = Article::findOrFail($id);

        $slug = Str::slug($request->title, '-');

        // $slugTitle = date('')

        // input gambar deskripsi artikel
        $storage = 'uploads/article';
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        // return $dom->saveHTML();
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        // variable untuk mengecek base64
        $bs64 = 'base64';
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // if (strpos()) {
            //     # code...
            // }
            if (preg_match('/data:image/',$src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $fileNameArticle = uniqid();
                $fileNameArticleRand = substr(md5($fileNameArticle),6,6).'_'.time();
                $filePath = ("$storage/$fileNameArticleRand.$mimeType");
                $image = Image::make($src)
                        ->resize(1200, 1200)
                        ->encode($mimeType,100)
                        ->save(public_path($filePath));
                $new_src = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src',$new_src);
                $img->setAttribute('class', 'img-responsive');
                // $addArticle->desc = $dom->saveHTML();
            }
        }
        return $filePath;
        // end input deskripsi artikel

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
