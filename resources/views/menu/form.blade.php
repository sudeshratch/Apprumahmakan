@extends('main')

@section('title','Form Menu')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6"><h1>Menu</h1> </div>
                <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('menu.index')}}">List Menu</a></li>
                    <li class="breadcrumb-item active">Form Menu</li>
                </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form menu</h3>
            </div>
        <div class="card-body">
            <form action={{isset($data)?route("menu.update",[$data->id]):route("menu.store")}} method="POST" autocomplete="off">
                    @csrf
                    @if (isset($data))
                        @method("PUT")
                    @endif
                    <div class="form-group">
                        <label for="nama">Nama Menu</label>
                        <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" maxlength="25" value="{{old("nama",isset($data)?$data->nama:"")}}">
                    @error("nama")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelompok">Kelompok</label>
                        {{-- user memilih kelompok dari pilihan yang memiliki makanan dan minuman --}}
                        <select name="kelompok" id="kelompok"
                            class="form-control">
                            <option value="makanan"
                                {{isset($data)&&$data->kelompok=="makanan"?"SELECTED":""}}>
                                Makanan</option>
                            <option value="minuman"
                            {{isset($data)&&$data->kelompok=="minuman"?"SELECTED":""}}>
                                Minuman</option>
                        </select>
                    </div>
                  
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control @error("harga") is-invalid @enderror" name="harga" maxlength="25" value="{{old("harga",isset($data)?$data->harga:"")}}">
                    @error("harga")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
        
                    <div class="form-group float-right">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{route('menu.index')}}" class="btn btn-danger">Batal</a>
                    </div>
            </form>
            
        </div>
        </div>
    </div>
</div>
    
@endsection