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
  <a href="{{url('Data_Thajaran/add') }}">
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
            <th>Kode Tahun Ajaran</th>
            <th>Tahun</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      @foreach($thajarans as $thajaran)
        <tr>
          <td>{{ $thajaran->kode_thajaran }}</td>
          <td>{{ $thajaran->tahun }}</td>
          <td>{{ $thajaran->semester }}</td> 
          <td>
            <div class="hidden-sm hidden-xs btn-group">
              <a href="{{ url('Data_Thajaran/edit',$thajaran->kode_thajaran )}}">
                <button class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>
              </a>
              <a href="{{ url('Data_Thajaran/hapus',$thajaran->kode_thajaran )}}">
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

