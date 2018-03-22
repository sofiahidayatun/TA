<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
    	$judul = 'admin';
    	$admins = Admin::all();

    	return view ('Data_Admin.index',compact('admins','judul'));
    }

    public function create()
    {
    	//$judul = 'Tambah Dosen';
    	//return view('DataDosen.add',compact('judul'));
        return view('Data_Admin.add');
    }



    /*public function store(Request $request)
    {
    	$validator = \Validator::make($request->all(),[
    		'nidn'=> 'required|unique:dosen',
    		'nama_dosen'=> 'required|unique:dosen',
    		'jenis_kelamin'=> 'required|unique:dosen',
    		'tempat_lahir'=> 'required|unique:dosen',
    		'tgl_lahir'=> 'required|unique:dosen',
    		'agama'=> 'required|unique:dosen',
    		'telepon'=> 'required|unique:dosen',
    		'email'=> 'required|unique:dosen',
    		'alamat'=> 'required|unique:dosen',
    		'foto'=> 'required|unique:dosen',
    		'password'=> 'required|unique:dosen'
    	]);

    	if($validator->fails()){
    		\Session::flash('alert-danger', 'Tidak bisa menyimpan data karena sudah ada atau belum mengisi data.');
			return redirect('/DataDosen');
    	}
    	else{

    		$simpan = new Dosen();
    		$simpan->nidn = $request->nidn;
    		$simpan->nama_dosen = $request->nama_dosen;
            $simpan->gelar_dosen = $request->gelar_dosen;
    		$simpan->jenis_kelamin = $request->jenis_kelamin;
    		$simpan->tempat_lahir = $request->tempat_lahir;
    		$simpan->tgl_lahir = $request->tgl_lahir;
    		$simpan->agama = $request->agama;
    		$simpan->telepon = $request->telepon;
    		$simpan->email = $request->email;
    		$simpan->alamat = $request->alamat;
    		$simpan->foto = $request->foto;
    		$simpan->password = $request->password;
    		$simpan->save();
    		if($simpan){
    			\Session::flash('alert-success', 'Data berhasil disimpan.');
				return redirect('/DataDosen');
    		}
    		\Session::flash('alert-danger', 'Terjadi kesalahan saat menyimpan data.');
				return redirect('/DataDosen');
    	}
    }*/
    public function store(Request $request)
    {
        $admins = new Admin();
            $admins->nip = $request->nip;
            $admins->nama_admin = $request->nama_admin;
            $admins->jabatan = $request->jabatan;
            $admins->jenis_kelamin = $request->jenis_kelamin;
            $admins->tempat_lahir = $request->tempat_lahir;
            $admins->tgl_lahir = $request->tgl_lahir;
            $admins->agama = $request->agama;
            $admins->telepon = $request->telepon;
            $admins->email = $request->email;
            $admins->alamat = $request->alamat;
            
            $file       = $request->file('foto');
            $fileName   = $file->getClientOriginalName();
            $request->file('foto')->move("image/", $fileName);

            $admins->foto = $fileName;
            $admins->password = $request->password;
    
        if($admins->save())
            return redirect('/Data_Admin');
    
    }


   /*public function edit($nidn)
    {
        $judul         = 'Edit Kategori';
        $datadosens = Dosen::where('nidn',$nidn)->first();
        return view('DataDosen.edit',compact('datadosens','judul'));
    }*/
public function edit($nip)
    {
            if($admins = Admin::find($nip))
        {
            return view('Data_Admin.edit', compact('admins'));
        }
        else
        {
            echo "data tidak ditemukan";
        }
    
    }

    /*public function update(Request $request, $nidn)
    {
        $validator = \Validator::make($request->all(),[
            'nidn'=> 'required|unique:dosen',
            'nama_dosen'=> 'required|unique:dosen',
            'jenis_kelamin'=> 'required|unique:dosen',
            'tempat_lahir'=> 'required|unique:dosen',
            'tgl_lahir'=> 'required|unique:dosen',
            'agama'=> 'required|unique:dosen',
            'telepon'=> 'required|unique:dosen',
            'email'=> 'required|unique:dosen',
            'alamat'=> 'required|unique:dosen',
            'foto'=> 'required|unique:dosen',
            'password'=> 'required|unique:dosen'
        ]);

        if($validator->fails()){
            \Session::flash('alert-danger', 'Tidak bisa menyimpan data karena sudah ada atau belum mengisi data.');
            return redirect('/DataDosen');
        }
        else{

            $update = Dosen::where('nidn',$nidn)->first();
            $update->nidn = $request->nidn;
            $update->nama_dosen = $request->nama_dosen;
            $update->gelar_dosen = $request->gelar_dosen;
            $update->jenis_kelamin = $request->jenis_kelamin;
            $update->tempat_lahir = $request->tempat_lahir;
            $update->tgl_lahir = $request->tgl_lahir;
            $update->agama = $request->agama;
            $update->telepon = $request->telepon;
            $update->email = $request->email;
            $update->alamat = $request->alamat;
            $update->foto = $request->foto;

            $file       = $request->file('foto');
            $fileName   = $file->getClientOriginalName();
            $request->file('foto')->move("image/", $fileName);

            $simpan->foto = $fileName;

            $update->password = $request->password;
            $update->update();
            if($update)
            {
                \Session::flash('alert-success', 'Data berhasil dirubah.');
                return redirect('/DataDosen');
            }
            \Session::flash('alert-danger', 'Gagal menyimpan perubahan.');
                return redirect('/DataDosen');
        }
    }*/

    public function update(Request $request,$nip)
    {
        if($admins = Admin::find($nip)){
            $admins->nip = $request->nip;
            $admins->nama_admin = $request->nama_admin;
            $admins->gelar_admin = $request->gelar_admin;
            $admins->jenis_kelamin = $request->jenis_kelamin;
            $admins->tempat_lahir = $request->tempat_lahir;
            $admins->tgl_lahir = $request->tgl_lahir;
            $admins->agama = $request->agama;
            $admins->telepon = $request->telepon;
            $admins->email = $request->email;
            $admins->alamat = $request->alamat;
            $admins->foto = $request->foto;
            $admins->password = $request->password;

        if($admins->update())
            return redirect('/Data_Admin');
    
        }else{
            echo "data tidak ditemukan";
        }

    }


    /*public function destroy($nidn)
    {
    	$hapus = Dosen::where('nidn',$nidn)->first();
    	$hapus->delete();
    	if($hapus)
    	{
    		\Session::flash('alert-success', 'Data berhasil dihapus.');
				return redirect('/DataDosen');
    	}
    		\Session::flash('alert-danger', 'Gagal menghapus data.');
				return redirect('/DataDosen');
    }*/

    public function delete($nip)
    {
        if($admins = Admin::find($nip)){
            $admins->delete($nip);
            //if($mahasiswa->hapus($nim))
                return redirect('/Data_Admin');
        }else{
            echo "gagal";
        }
    }
}
