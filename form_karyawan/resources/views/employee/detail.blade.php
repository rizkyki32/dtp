@extends('layout.master')

@section('title', 'Detail Karyawan')

@section('content')

@if(session('status'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning text-center">
            {{session('status')}}
        </div>
    </div>
</div>
@endif

<br />

<table>
    <tr>
        <td>Nama *</td>
        <td>:</td>
        <td>{{ $employee->nama }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $employee->alamat }}</td>
    </tr>
    <tr>
        <td>NO_KTP *</td>
        <td>:</td>
        <td>{{ $employee->no_ktp }}</td>
    </tr>
</table>

    <br>
    <b>Pendidikan</b>
    <br><br>
    <table class="table table-bordered">
        <tr>
            <th>Nama Sekolah / Universitas</th>
            <th>Jurusan</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
        <tr>
            @foreach($employee->education as $e)
        <tr>
            <td>
                {{$e->nama_sekolah_univ}}
            </td>
            <td>
                {{$e->jurusan}}
            </td>
            <td>
                {{$e->tahun_masuk}}
            </td>
            <td>
                {{$e->tahun_lulus}}
            </td>
                @endforeach
        </tr>
    </table>

    <br>
    <b>Pengalaman Kerja</b>
    <br><br>
    <table class="table table-bordered">
        <tr>
            <th>Perusahaan</th>
            <th>Jabatan</th>
            <th>Tahun</th>
            <th>Keterangan</th>
        <tr>
            @foreach($employee->job as $j)
        <tr>
            <td>
                {{$j->perusahaan}}
            </td>
            <td>
                {{$j->jabatan}}
            </td>
            <td>
                {{$j->tahun}}
            </td>
            <td>
                {{$j->keterangan}}
            </td>
                @endforeach
        </tr>
    </table>

    <a class="btn btn-danger" href="{{route('employee.index')}}">Kembali</a>

@endsection