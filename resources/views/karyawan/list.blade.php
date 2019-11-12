@extends('main')

@section('tutle','List Karyawan')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-6"><h1>Karyawan</h1></div>
            <div class="col-6">
                    <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">List Karyawan</li>
                        </ol>
            </div>
                
        </div>
            
    </section>
    <section class="content">
        @if ($message = session("info"))
            <div class="alert alert-success">
                <i class="fa fa-info-circle"></i>{{$message}}
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">List Karyawan</h3>
            </div>
        <div class="card-body">
        <div class="float-right mb-2">
            <a href="{{route('karyawan.create')}}" class="btn btn-success">
                <i class="fa fa-plus">Tambah</i>
            </a>
        </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Jenis</th>
                        <th colspan="4" width=25%>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration + (10*($data->currentPage()-1 )) }}</td>                    
                        <td>{{$item->nama}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->telepon}}</td>
                        <td>{{$item->jenis}}</td> 
                        <td><a href="{{route('karyawan.show',[$item->id])}}" class="btn btn-warning btn-block"><i class="fa fa-pencil-alt"></i>Ubah</a></td>

                        <td>
                        <form action="{{route("karyawan.destroy",[$item->id])}}" method="POST">
                                               
                        @method("DELETE")
                            @csrf
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                        </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                           
            </table>
                <div class="float-right mt-2">
                    {{$data->links()}}
                </div>
        </div>
        </div>
        
    </section>
</div>
@endsection