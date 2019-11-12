@extends('main')

@section('title','Form Bahan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6"><h1>Bahan</h1> </div>
                <div class="col-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('bahan.index')}}">List Bahan</a></li>
                    <li class="breadcrumb-item active">Form Bahan</li>
                </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Bahan</h3>
            </div>
        <div class="card-body">
            <form action={{isset($data)?route("bahan.update",[$data->id]):route("bahan.store")}} method="POST" autocomplete="off">
                    @csrf
                    @if (isset($data))
                        @method("PUT")
                    @endif
                    <div class="form-group">
                        <label for="nama">Nama Bahan</label>
                        <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" maxlength="25" value="{{old("nama",isset($data)?$data->nama:"")}}">
                    @error("nama")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
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
                  
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" class="form-control @error("qty") is-invalid @enderror" name="qty" maxlength="25" value="{{old("qty",isset($data)?$data->qty:"")}}">
                    @error("qty")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control @error("satuan") is-invalid @enderror" name="satuan" maxlength="25" value="{{old("satuan",isset($data)?$data->satuan:"")}}">
                    @error("satuan")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
        
                    <div class="form-group float-right">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{route('bahan.index')}}" class="btn btn-danger">Batal</a>
                    </div>
            </form>
            
        </div>
        </div>
    </div>
</div>
    
@endsection