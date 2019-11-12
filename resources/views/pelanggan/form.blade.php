@extends('main')

@section('title','Form Pelanggan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6"><h1>Pelanggan</h1> </div>
                <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('pelanggan.index')}}">List Pelanggan</a></li>
                    <li class="breadcrumb-item active">Form Pelanggan</li>
                </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Pelanggan</h3>
            </div>
        <div class="card-body">
            <form action={{isset($data)?route("pelanggan.update",[$data->id]):route("pelanggan.store")}} method="POST" autocomplete="off">
                    @csrf
                    @if (isset($data))
                        @method("PUT")
                    @endif
                    <div class="form-group">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" maxlength="25" value="{{old("nama",isset($data)?$data->nama:"")}}">
                        @error("nama")
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error("alamat") is-invalid @enderror" name="alamat" maxlength="25" value="{{old("alamat",isset($data)?$data->alamat:"")}}">
                        @error("alamat")
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                      
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="number" class="form-control @error("telepon") is-invalid @enderror" name="telepon" maxlength="25" value="{{old("telepon",isset($data)?$data->telepon:"")}}">
                        @error("telepon")
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error("email") is-invalid @enderror" name="email" value={{ (isset($data)?$data->email:old("email"))}}>
                            @error("email")
                            <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
        
                    <div class="form-group float-right">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{route('pelanggan.index')}}" class="btn btn-danger">Batal</a>
                    </div>
            </form>
            
        </div>
        </div>
    </div>
</div>
    
@endsection