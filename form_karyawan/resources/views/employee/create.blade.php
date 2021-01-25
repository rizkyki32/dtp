@extends('layout.master')

@section('title', 'Tambah Karyawan')

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
    <form action="{{route('employee.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Nama *</label>
            <input type="text" name="nama" placeholder="Masukkan nama lengkap" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" class="form-control" placeholder="Masukkan alamat"></textarea>
        </div>
        <div class="form-group">
            <label for="">NO-KTP *</label>
            <input type="number" name="no_ktp" placeholder="Masukkan NO-KTP" class="form-control" required>
        </div>
        <b><label for="">PENDIDIKAN</label></b>
        <hr>
        <div class="form-group">
            <label for="">Nama Sekolah / Universitas *</label>
            <input type="text" name="nama_sekolah_univ[]" placeholder="Masukkan Nama Sekolah / Univ" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Jurusan *</label>
            <input type="text" name="jurusan[]" placeholder="Jurusan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Tahun Masuk *</label>
            <input type="date" name="tahun_masuk[]" placeholder="tahun_masuk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Tahun Lulus *</label>
            <input type="date" name="tahun_lulus[]" placeholder="tahun_lulus" class="form-control" required>
        </div>
        <div class="form-pendidikan"></div>
        <hr>
        <b><label for="">PENGALAMAN</label></b>
        <hr>
        <div class="form-group">
            <label for="">Perusahaan *</label>
            <input type="text" name="perusahaan[]" placeholder="Nama perusahaan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Jabatan *</label>
            <input type="text" name="jabatan[]" placeholder="Jabatan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Tahun *</label>
            <input type="date" name="tahun[]" placeholder="Tahun" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan[]" id="" class="form-control" placeholder="Masukkan keterangan"></textarea>
        </div>
        <div class="form-pengalaman"></div>
        <div class="form-group">
            <input type="submit" name="submit" id="" class="btn btn-info"> 
            <a class="btn btn-danger" href="{{route('employee.index')}}">Kembali</a>
        </div>
    </form>

</div>

@endsection