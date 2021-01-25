@extends('layout.master')

@section('title', 'Data Karyawan')

@section('content')

<div class="form-group">
    <a class="btn btn-primary float-right mb-2" href="{{route('employee.create')}}"> + Tambah Karyawan Baru</a>
</div>

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
<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>NO KTP</th>
        <th>Pendidikan</th>
        <th>Pengalaman</th>
        <th>#</th>
    </tr>
    @foreach($employee as $e)
    <tr>
        <td>{{ $e->nama }}</td>
        <td>{{ $e->alamat }}</td>
        <td>{{ $e->no_ktp }}</td>
        <td>@foreach($e->education as $ed)
            <li> {{ $ed->nama_sekolah_univ }} </li>
            @endforeach
        </td>
        <td>
            @foreach($e->job as $j)
            <li> {{ $j->perusahaan }} | {{ $j->jabatan }} </li>
            @endforeach
        </td>
        <td>
            <div class="btn btn-group">
                <a class="btn btn-warning btn-sm" href="{{route('employee.edit', [$e->id])}}">Edit</a>
                <a href="{{route('employee.show', [$e->id])}}" class="btn btn-primary btn-sm"> Detail
                </a>
                <form class="d-inline" action="{{route('employee.destroy', [$e->id])}}" method="POST"
                    onsubmit="return confirm('Anda yakin ingin menghapus {{$e->nama}} ?')">
    
                    @csrf
    
                    <input type="hidden" value="DELETE" name="_method">
                    <input type="submit" class="btn btn-danger btn-sm" value="Hapus">
                </form>
            </div>
           
        </td>
    </tr>
    @endforeach
</table>

<br />
Halaman : {{ $employee->currentPage() }} <br />
Jumlah Data : {{ $employee->total() }} <br />
Data Per Halaman : {{ $employee->perPage() }} <br />

<br>
<!-- jika ke halaman selanjut-nya data tidak di reset di awal -->
{{ $employee->appends(Request::all())->links() }}

@endsection