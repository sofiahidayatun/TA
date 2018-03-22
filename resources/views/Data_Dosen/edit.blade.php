@extends ('layouts.index')

 <!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">

@section ('content')

<form class="form-horizontal" role="form" action="{{ url('/Data_Dosen/update',$dosens->nidn )}}" method="POST" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="box box-primary">

        <div class="box-body">
            
		    <table>
				<tr>
					<td width="150px">NIDN</td>
					<td>
						<div class="form-group">
		                  <input type="text" name="nidn" class="form-control" value="{{ $dosens->nidn }}" readonly>
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Nama Dosen</td>
					<td>
						<div class="form-group">
		                  <input type="text" name="nama_dosen" class="form-control" value="{{ $dosens->nama_dosen }}">
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Gelar Dosen</td>
					<td>
						<div class="form-group">
		                  <input type="text" name="gelar_dosen" class="form-control" value="{{ $dosens->gelar_dosen }}">
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>
						<div class="form-group">
		                  <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
		                  <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td>
						<div class="form-group">
		                  <input type="text" name="tempat_lahir" class="form-control" value="{{ $dosens->tempat_lahir }}">
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<!--<td><input type="text" id="form-field-5" name="tgl_lahir" /></td>-->
					<td>
						<div class="form-group">
		                  	<div class="input-group date">
			                  <div class="input-group-addon">
			                    <i class="fa fa-calendar"></i>
			                  </div>
			                  <input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir" value="{{ $dosens->tgl_lahir }}">
			                </div>
		                </div>
		            </td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>
						<!--<div class="form-group">
		                  <input type="text" name="agama" class="form-control" value="{{ $dosens->agama }}">
		                </div>-->

						<div class="form-group">
		                  <select name="agama">
		                  	<option value="Islam">Islam</option>
		                  	<option value="Kristen">Kristen</option>
		                  	<option value="Hindu">Hindu</option>
		                  	<option value="Katholik">Katholik</option>
		                  	<option value="Budha">Budha</option>
		                  </select>
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>
						<div class="form-group">
		                  <input type="telepon" name="telepon" class="form-control" value="{{ $dosens->telepon }}">
		                </div>
	                </td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>
						<div class="form-group">
		                  <input type="email" name="email" class="form-control" value="{{ $dosens->email }}">
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>
						<div class="form-group">
		                  <input type="text" name="alamat" class="form-control" value="{{ $dosens->alamat }}">
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Foto</td>
					<td>
						<div class="form-group">
		                  <input type="file" id="inputgambar" name="foto" value="{{ $dosens->foto }}" class="validate"/ >
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Kata Sandi</td>
					<td>
						<div class="form-group">
		                  <input type="text" name="password" class="form-control" value="{{ $dosens->password }}">
		                </div>
	                </td>
				</tr>
			</table>

        </div>

	    <div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<input class="btn btn-info" type="submit" class="ace-icon fa fa-check bigger-110" value="Edit" id="bootbox-confirm">
					{{ csrf_field() }}
				&nbsp; &nbsp; &nbsp;
				<a href="{{url('Data_Dosen')}}"><button class="btn" type="button">
					<i class="ace-icon fa fa-undo bigger-110"></i>
					Kembali
				</button></a>
			</div>
		</div>
		<div class="hr hr-24"></div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
</form>

@endsection

<!-- bootstrap datepicker -->
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

  });
</script>