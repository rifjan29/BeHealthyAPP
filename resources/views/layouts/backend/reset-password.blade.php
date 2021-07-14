{{-- <div class="modal fade" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Reset Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row form-group">
                        <div class="col-lg-12 mb-4 mt-3">
                            <label for="password">Password Lama<span class="text-required"> * </span></label>
                            <input type="password" name="password" id="password" class="input-lg form-control-lg form-control @error('password') is-invalid @enderror" data-toggle="password" autocomplete="current-password">
                            <small id="helpId" class="text-muted" >Masukkan Password dengan benar</small>
                            @if ($errors->has('password'))
                                <span class="badge bg-danger">{{  $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-12 mb-4 mt-3">
                            <label for="new_password">Password Baru <span class="text-required"> * </span></label>
                            <input type="password" name="new_password" id="new_password" class="input-lg form-control-lg form-control @error('new_password') is-invalid @enderror" data-toggle="password" autocomplete="current-password">
                            <small id="helpId" class="text-muted" >Ulangi Password dengan benar</small>
                            @if ($errors->has('new_password'))
                                <span class="badge bg-danger">{{  $errors->first('new_password') }}</span>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            </form>

        </div>
    </div>
</div> --}}

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Be Healthy &amp;  Administrator</title>
    <style>
        html, body{
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .reset-password {
            width: 100%;
            max-width: 30%;
            padding: 15px;
            margin: auto;
        }
        .reset-password input[type=password]{
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
  
        .reset-password  .form-floating:focus-within {
             z-index: 2;
        }

    </style>
</head>
  <body class="text-center">
      {{-- @foreach ($resetPassword as $item) --}}
          {{-- {{ $item->id }} --}}
      {{-- @endforeach --}}
    <main class="reset-password">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form class="p-5" action="{{ route('update-password') }}" method="POST">
                        @csrf
                        {{-- {{ method_field('PUT') }} --}}
                          <div class="form-floating">
                            <input type="password" name="password_lama" class="form-control @error('password_lama') is-invalid  @enderror" id="floatingInput" placeholder="Password Lama">
                            <label for="floatingInput">Password Lama</label>
                          </div>
                          <div class="d-flex justify-content-start mb-3">
                              @if ($errors->has('password_lama'))
                                <span class="badge bg-danger">{{  $errors->first('password_lama') }}</span>
                              @endif
                          </div>
                          <div class="form-floating">
                            <input type="password" name="password_baru" class="form-control @error('password_baru') is-invalid  @enderror" id="floatingPassword" placeholder="Password Baru">
                            <label for="floatingPassword">Password Baru</label>
                          </div>
                          <div class="d-flex justify-content-start mb-3">
                              @if ($errors->has('password_baru'))
                                <span class="badge bg-danger">{{  $errors->first('password_baru') }}</span>
                              @endif
                          </div>
                          <div class="form-floating">
                            <input type="password" name="ulangi_password" class="form-control @error('ulangi_password') is-invalid  @enderror" id="floatingPassword" placeholder="Ulangi Password Baru">
                            <label for="floatingPassword">Ulangi Password Baru</label>
                          </div>
                          <div class="d-flex justify-content-start mb-3">
                              @if ($errors->has('ulangi_password'))
                              <span class="badge bg-danger">{{  $errors->first('ulangi_password') }}</span>
                              @endif
                          </div>
                          <div class="d-flex justify-content-end">
                              <div class="p-1">
                                  <button type="reset" class="btn btn-outline-danger" style="padding:10px 50px">Batal</button>
                              </div>
                              <div class="p-1">
                                  <button type="submit" class="btn btn-success" style="padding:10px 50px">Simpan</button>
                              </div>
                          </div>
                    </form>
                    <span class="text-muted mb-2"><a href="{{ route('dashboard') }}" class="text-decoration-none">Kembali Beranda</a></span>
                </div>
            </div>
        </div>

        
          {{-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      
        
          <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
    </main>
      
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>