@extends('layout.master')

@section('title', 'Edit Karyawan')

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <b>Jika ingin menambahkan form pendidikan & pengalaman silahkan klik tombol disamping!!!</b>
    <br>
    <br>
    <div class="form-group">
        <button class="float-right" id="pendidikan">TAMBAH PENDIDIKAN</button>
        <button class="float-right" id="pengalaman">TAMBAH PENGALAMAN</button>
    </div>

    <br>
    <form action="{{route('employee.update',[$employee->id])}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="">Nama *</label>
            <input type="text" name="nama" placeholder="Masukkan nama lengkap" class="form-control" value="{{$employee->nama}}" required>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" class="form-control" placeholder="Masukkan alamat">{{$employee->alamat}}</textarea>
        </div>
        <div class="form-group">
            <label for="">NO-KTP *</label>
            <input type="number" name="no_ktp" placeholder="Masukkan NO-KTP" class="form-control" value="{{$employee->no_ktp}}" required>
        </div>
        <b><label for="">PENDIDIKAN</label></b>
        <hr>
        @foreach ($employee->education as $e)
        <div class="form-group">
            <label for="">Nama Sekolah / Universitas *</label>
            <input type="text" name="nama_sekolah_univ[]" placeholder="Masukkan Nama Sekolah / Univ" class="form-control" value="{{$e->nama_sekolah_univ}}" required>
        </div>
        <div class="form-group">
            <label for="">Jurusan *</label>
            <input type="text" name="jurusan[]" placeholder="Jurusan" class="form-control" value="{{$e->jurusan}}" required>
        </div>
        <div class="form-group">
            <label for="">Tahun Masuk *</label>
            <input type="date" name="tahun_masuk[]" placeholder="tahun_masuk" class="form-control" value="{{$e->tahun_masuk}}" required>
        </div>
        <div class="form-group">
            <label for="">Tahun Lulus *</label>
            <input type="date" name="tahun_lulus[]" placeholder="tahun_lulus" class="form-control" value="{{$e->tahun_lulus}}" required>
        </div>
        @endforeach
        
        <div class="form-pendidikan"></div>
        <hr>
        @foreach ($employee->job as $j)
        <b><label for="">PENGALAMAN</label></b>
        <hr>
        <div class="form-group">
            <label for="">Perusahaan *</label>
            <input type="text" name="perusahaan[]" placeholder="Nama perusahaan" class="form-control"  value="{{$j->perusahaan}}" required>
        </div>
        <div class="form-group">
            <label for="">Jabatan *</label>
            <input type="text" name="jabatan[]" placeholder="Jabatan" class="form-control"  value="{{$j->jabatan}}" required>
        </div>
        <div class="form-group">
            <label for="">Tahun *</label>
            <input type="date" name="tahun[]" placeholder="Tahun" class="form-control"  value="{{$j->tahun}}" required>
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan[]" id="" class="form-control" placeholder="Masukkan keterangan">{{$j->keterangan}}</textarea>
        </div>
        @endforeach
        <div class="form-pengalaman"></div>
        <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-info">
            <a class="btn btn-danger" href="{{route('employee.index')}}">Kembali</a>
        </div>
    </form>

</div>

@endsection