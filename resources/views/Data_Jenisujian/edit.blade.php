@extends ('layouts.index')

 <!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">

@section ('content')

<form class="form-horizontal" role="form" action="{{ url('/Data_Jenisujian/update',$jenisujians->kode_jenisujian )}}" method="POST" enctype="multipart/form-data">
<div class="col-md-6">
    <div class="box box-primary">

        <div class="box-body">
            
		    <table>
				<tr>
					<td width="150px">Kode Jenis Ujian</td>
					<td>
						<div class="form-group">
		                  <input type="text" name="kode_jenisujian" class="form-control" value="{{ $jenisujians->kode_jenisujian }}" readonly>
		                </div>
	                </td>
				</tr>
				<tr>
					<td>Jenis Ujian</td>
					<td>
						<div class="form-group">
		                  <select name="jenisujian">
		                  	<option value="UTS">UTS</option>
		                  	<option value="UAS">UAS</option>
		                  	<option value="Susulan">Susulan</option>
		                  </select>
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
				<a href="{{url('Data_Jenisujian')}}"><button class="btn" type="button">
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