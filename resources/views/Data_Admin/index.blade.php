@extends ('layouts.index')
<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

@section ('content')

 <!-- alert message start-->
<!--@foreach (['danger', 'warning', 'success', 'info'] as $msg)
     @if(Session::has('alert-' . $msg))
    <div class="alert alert-{{ $msg }} alert-dismissable fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('alert-' . $msg) }}
        </div>
     @endif
@endforeach-->
<!-- alert message end --> 
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
<div class="row">
<div class="col-xs-12">
  <a href="{{url('Data_Admin/add') }}">
    <button class="btn btn-xs btn btn-info">
      <i class="ace-icon fa fa-plus bigger-110"></i>
      Tambah
      <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
    </button>
  </a>
  <br><br>
  <div class="col-sm-6">
    <div id="datatabel_length" class="dataTables_length">
      <label>
        <select class="form-control input-sm" name="datatabel_length" aria-controls="datatabel">
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
        Baris per halaman
      </label>
    </div>
  </div>
  <div class="col-sm-6">
    <!--<div id="datatabel" class="datatabel_filter">
      <label>
        Cari:
        <input class="form-control input-sm" aria-controls="datatabel" type="search">
      </label>
    </div>-->
  </div>
</div>
</div>

  <table id="datatbl" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama Admin</th>
            <th>Jabatan</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal_lahir</th>
            <th>Agama</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Foto</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      @foreach($admins as $admin)
        <tr>
          <td>{{ $admin->id_admin }}</td>
          <td>{{ $admin->nama_admin }}</td>
          <td>{{ $admin->jabatan }}</td>
          <td>{{ $admin->jenis_kelamin }}</td> 
          <td>{{ $admin->tempat_lahir }}</td> 
          <td>{{ $admin->tgl_lahir }}</td> 
          <td>{{ $admin->agama }}</td> 
          <td>{{ $admin->telepon }}</td>
          <td>{{ $admin->email }}</td> 
          <td>{{ $admin->alamat }}</td> 
          <td><img src="{{ asset('image/'.$admin->foto)  }}" style="max-height:50px;max-width:50px;margin-top:10px;"></td>
          <td>{{ $admin->password }}</td> 
          <td>
            <div class="hidden-sm hidden-xs btn-group">
              <a href="{{ url('Data_Admin/edit',$admin->id )}}">
                <button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
              </a>
              <a href="{{ url('Data_Admin/hapus',$admin->id )}}">
                <button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>
              </a>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row">
    <div class="col-sm-6">
      <div id="datatabel_info" class="dataTables_info" role="alert" aria-live="polite" aria-relevant="all">Menampilkan 1 dari 2</div>
    </div>
    <div class="col-sm-6">
      <div id="datatabel_paginate" class="dataTables_paginate paging_simple_numbers">
        <ul class="pagination">
          <li id="datatabel_previous" class="paginate_button previous disabled" aria-controls="datatabel" tabindex="0">
            <a href="#">Sebelumnya</a>
          </li>
          <li class="paginate_button active" aria-controls="datatabel" tabindex="0">
          <a href="#">1</a>
          </li>
          <li id="datatabel_next" class="paginate_button next disabled" aria-controls="datatabel" tabindex="0">
          <a href="#">Selanjutnya</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  @endsection

