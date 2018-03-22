<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
class FakultasController extends Controller
{
    public function index(){
    	$judul = 'fakultas';
    	$fakultass = Fakultas::all();

    	return view ('Data_Fakultas.index',compact('fakultass','judul'));
    }

    public function create()
    {
    	//$judul = 'Tambah Dosen';
    	//return view('DataDosen.add',compact('judul'));
        return view('Data_Fakultas.add');
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
        $fakultass = new Fakultas();
            $fakultass->kode_fakultas = $request->kode_fakultas;
            $fakultass->fakultas = $request->fakultas;
            $fakultass->nidn = $request->nidn;
    
        if($fakultass->save())
            return redirect('/Data_Fakultas');
    
    }


   /*public function edit($nidn)
    {
        $judul         = 'Edit Kategori';
        $datadosens = Dosen::where('nidn',$nidn)->first();
        return view('DataDosen.edit',compact('datadosens','judul'));
    }*/
public function edit($kode_fakultas)
    {
            if($fakultass = Fakultas::find($kode_fakultas))
        {
            return view('Data_Fakultas.edit', compact('fakultass'));
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

    public function update(Request $request,$kode_fakultas)
    {
        if($fakultass = Fakultas::find($kode_fakultas)){
            $fakultass->kode_fakultas = $request->kode_fakultas;
            $fakultass->fakultas = $request->fakultas;
            $fakultass->nidn = $request->nidn;

        if($fakultass->update())
            return redirect('/Data_Fakultas');
    
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

    public function delete($kode_fakultas)
    {
        if($fakultass = Fakultas::find($kode_fakultas)){
            $fakultass->delete($kode_fakultas);
            //if($mahasiswa->hapus($nim))
                return redirect('/Data_Fakultas');
        }else{
            echo "gagal";
        }
    }
}
