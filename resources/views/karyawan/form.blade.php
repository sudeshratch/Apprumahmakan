@extends('main')

@section('title','Form Karyawan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6"><h1>Karyawan</h1> </div>
                <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('karyawan.index')}}">List Karyawan</a></li>
                    <li class="breadcrumb-item active">Form Karyawan</li>
                </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Karyawan</h3>
            </div>

            <div class="card-body">
                <form action={{isset($data)?route("karyawan.update",[$data->id]):route("karyawan.store")}} method="POST" autocomplete="off">
                        @csrf
                        @if (isset($data))
                            @method("PUT")
                        @endif
            <div class="form-group">
                <label for="nama">Nama Karyawan</label>
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
                        <label for="jenis">Jenis</label>
                        {{-- user memilih kelompok dari pilihan yang memiliki waiter/koki/kasir --}}
                        <select name="jenis" id="jenis"
                            class="form-control">
                            <option value="waiter"
                                {{isset($data)&&$data->jenis=="waiter"?"SELECTED":""}}>
                                Waiter</option>
                            <option value="koki"
                            {{isset($data)&&$data->jenis=="koki"?"SELECTED":""}}>
                                Koki</option>
                            <option value="kasir"
                            {{isset($data)&&$data->jenis=="kasir"?"SELECTED":""}}>
                                Kasir</option>
                        </select>
                    </div>
        
                    <div class="form-group float-right">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{route('karyawan.index')}}" class="btn btn-danger">Batal</a>
                    </div>
            </form>
            
        </div>
        </div>
    </div>
</div>
    
@endsection