<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;

class DosenController extends Controller
{
    public function index(){
    	$judul = 'dosen';
    	$dosens = Dosen::all();

    	return view ('Data_Dosen.index',compact('dosens','judul'));
    }

    public function create()
    {
    	//$judul = 'Tambah Dosen';
    	//return view('DataDosen.add',compact('judul'));
        return view('Data_Dosen.add');
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
        $dosens = new Dosen();
            $dosens->nidn = $request->nidn;
            $dosens->nama_dosen = $request->nama_dosen;
            $dosens->gelar_dosen = $request->gelar_dosen;
            $dosens->jenis_kelamin = $request->jenis_kelamin;
            $dosens->tempat_lahir = $request->tempat_lahir;
            $dosens->tgl_lahir = $request->tgl_lahir;
            $dosens->agama = $request->agama;
            $dosens->telepon = $request->telepon;
            $dosens->email = $request->email;
            $dosens->alamat = $request->alamat;
            
            $file       = $request->file('foto');
            $fileName   = $file->getClientOriginalName();
            $request->file('foto')->move("image/", $fileName);

            $dosens->foto = $fileName;
            $dosens->password = $request->password;
    
        if($dosens->save())
            return redirect('/Data_Dosen');
    
    }


   /*public function edit($nidn)
    {
        $judul         = 'Edit Kategori';
        $datadosens = Dosen::where('nidn',$nidn)->first();
        return view('DataDosen.edit',compact('datadosens','judul'));
    }*/
public function edit($nidn)
    {
            if($dosens = Dosen::find($nidn))
        {
            return view('Data_Dosen.edit', compact('dosens'));
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

    public function update(Request $request,$nidn)
    {
        if($dosens = Dosen::find($nidn)){
            $dosens->nidn = $request->nidn;
            $dosens->nama_dosen = $request->nama_dosen;
            $dosens->gelar_dosen = $request->gelar_dosen;
            $dosens->jenis_kelamin = $request->jenis_kelamin;
            $dosens->tempat_lahir = $request->tempat_lahir;
            $dosens->tgl_lahir = $request->tgl_lahir;
            $dosens->agama = $request->agama;
            $dosens->telepon = $request->telepon;
            $dosens->email = $request->email;
            $dosens->alamat = $request->alamat;
            $dosens->foto = $request->foto;
            $dosens->password = $request->password;

        if($dosens->update())
            return redirect('/Data_Dosen');
    
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

    public function delete($nidn)
    {
        if($dosens = Dosen::find($nidn)){
            $dosens->delete($nidn);
            //if($mahasiswa->hapus($nim))
                return redirect('/Data_Dosen');
        }else{
            echo "gagal";
        }
    }
}
?>


