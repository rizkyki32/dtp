<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Education;
use App\Job;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employee = Employee::paginate(10);
        return view('employee.index', ['employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'required' => ':attribute harap diisi',
            'min' => ':attribute harus diisi minimal :min karakter aja bro',
            'max' => ':attribute hanya :max karakter aja bro',
        ];
        
        \Validator::make($request->all(), [
            "nama" => "required|min:5|max:100",
            "no_ktp" => "required|max:15",
            "nama_sekolah_univ" => "required",
            "jurusan" => "required",
            "tahun_masuk" => "required",
            "tahun_lulus" => "required",
            "perusahaan" => "required",
            "jabatan" => "required",
            "tahun" => "required",
        ], $messages)->validate();

        $new_employee = new Employee;
        $new_employee->nama = $request->get('nama');
        $new_employee->alamat = $request->get('alamat');
        $new_employee->no_ktp = $request->get('no_ktp');
        $new_employee->save();

        $nama_sekolah_univ = $request->get('nama_sekolah_univ');
        $jurusan = $request->get('jurusan');
        $tahun_masuk = $request->get('tahun_masuk');
        $tahun_lulus = $request->get('tahun_lulus');

        $perusahaan = $request->get('perusahaan');
        $jabatan = $request->get('jabatan');
        $tahun = $request->get('tahun');
        $keterangan = $request->get('keterangan');

        for ($x = 0; $x < count($nama_sekolah_univ); $x++) {
            if ($nama_sekolah_univ[$x] != "" and $jurusan[$x] != "" and $tahun_masuk[$x] != "" and $tahun_lulus[$x] != "") {
                Education::create([
                    'nama_sekolah_univ' => $nama_sekolah_univ[$x],
                    'jurusan' => $jurusan[$x],
                    'tahun_masuk' => $tahun_masuk[$x],
                    'tahun_lulus' => $tahun_lulus[$x],
                    'employee_id' => $new_employee->id
                ]);
            }
        }

        for ($x = 0; $x < count($perusahaan); $x++) {
            if ($perusahaan[$x] != "" and $jabatan[$x] != "" and $tahun[$x] != "" and $keterangan[$x] != "") {
                Job::create([
                    'perusahaan' => $perusahaan[$x],
                    'jabatan' => $jabatan[$x],
                    'tahun' => $tahun[$x],
                    'keterangan' => $keterangan[$x],
                    'employee_id' => $new_employee->id
                ]);
            }
        }

        return redirect()->route('employee.index')->with('status', 'Data karyawan berhasil ditambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = Employee::findOrFail($id);

        return view('employee.detail', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee = Employee::findOrFail($id);

        return view('employee.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $messages = [
            'required' => ':attribute harap diisi',
            'min' => ':attribute harus diisi minimal :min karakter aja bro',
            'max' => ':attribute hanya :max karakter aja bro',
        ];

        \Validator::make($request->all(), [
            "nama" => "required|min:5|max:100",
            "no_ktp" => "required|max:15",
            "nama_sekolah_univ" => "required",
            "jurusan" => "required",
            "tahun_masuk" => "required",
            "tahun_lulus" => "required",
            "perusahaan" => "required",
            "jabatan" => "required",
            "tahun" => "required",
        ], $messages)->validate();

        $new_employee = Employee::findOrFail($id);
        $new_employee->nama = $request->get('nama');
        $new_employee->alamat = $request->get('alamat');
        $new_employee->no_ktp = $request->get('no_ktp');
        $new_employee->save();

        Education::where('employee_id', $id)->delete();
        Job::where('employee_id', $id)->delete();

        $nama_sekolah_univ = $request->get('nama_sekolah_univ');
        $jurusan = $request->get('jurusan');
        $tahun_masuk = $request->get('tahun_masuk');
        $tahun_lulus = $request->get('tahun_lulus');

        $perusahaan = $request->get('perusahaan');
        $jabatan = $request->get('jabatan');
        $tahun = $request->get('tahun');
        $keterangan = $request->get('keterangan');

        for ($x = 0; $x < count($nama_sekolah_univ); $x++) {
            if ($nama_sekolah_univ[$x] != "" and $jurusan[$x] != "" and $tahun_masuk[$x] != "" and $tahun_lulus[$x] != "") {
                Education::create([
                    'nama_sekolah_univ' => $nama_sekolah_univ[$x],
                    'jurusan' => $jurusan[$x],
                    'tahun_masuk' => $tahun_masuk[$x],
                    'tahun_lulus' => $tahun_lulus[$x],
                    'employee_id' => $new_employee->id
                ]);
            }
        }

        for ($x = 0; $x < count($perusahaan); $x++) {
            if ($perusahaan[$x] != "" and $jabatan[$x] != "" and $tahun[$x] != "" and $keterangan[$x] != "") {
                Job::create([
                    'perusahaan' => $perusahaan[$x],
                    'jabatan' => $jabatan[$x],
                    'tahun' => $tahun[$x],
                    'keterangan' => $keterangan[$x],
                    'employee_id' => $new_employee->id
                ]);
            }
        }

        return redirect()->route('employee.index')->with('status', 'Data karyawan berhasil diubah');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = \App\Employee::findOrFail($id);
        Education::where('employee_id', $id)->delete();
        Job::where('employee_id', $id)->delete();
        $employee->delete();

        return redirect()->route('employee.index')->with('status', 'Data karyawan berhasil dihapus');;
    }
}
