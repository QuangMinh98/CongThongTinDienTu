@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="content1">
				<div class="main-panel">
					<div class="box">
						<h3 class="type">Thể Loại</h3>
						<div class="content">
							<div class="row">
								<div class="col-md-3">
									<div class="search">
										<form action="{{route('monhoc')}}" method="get">
											<div class="form-group">
												<label for="search">Search</label>
												<input type="search" name="search" class="form-control form-control-sm">
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-3">
									<button id="add" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; "><i class="fas fa-plus-circle"></i>&nbspThêm Môn Học</button>
								</div>
							</div>
							<div class="form-add">
								<form action="{{route('addMon')}}" method="post">
									@csrf
									<div class="row">
                    <div class="col-md-4">
											<div class="form-group">
												<label for="mamonhoc">Mã Môn Học:</label>
												<input type="text" name="mamonhoc" class="form-control form-control-sm">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="tenmonhoc">Tên Môn Học:</label>
												<input type="text" name="tenmonhoc" class="form-control form-control-sm">
											</div>
										</div>
                    <div class="col-md-4">
											<div class="form-group">
												<label for="sotinchi">Số Tín Chỉ:</label>
												<input type="number" name="sotinchi" class="form-control form-control-sm">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2 col-6">
											<button type="submit" class="btn btn-primary btn-md btn-add" name="">Thêm</button>
										</div>
										<div class="col-md-2 col-6">
											<button type="button" id="cancel" class="btn btn-primary btn-md btn-add" style="background: #dc3545; border-color: #dc3545;">Hủy</button>
										</div>
									</div>
								</form>
							</div>
              <div class="form-edit">
								<form action="{{route('editMon')}}" method="post">
									@csrf
									<input type="hidden" name="id" id="id">
                  <div class="row">
                    <div class="col-md-4">
											<div class="form-group">
												<label for="mamonhoc">Mã Môn Học:</label>
												<input type="text" id="edit-mamonhoc" name="mamonhoc" class="form-control form-control-sm">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="tenmonhoc">Tên Môn Học:</label>
												<input type="text" id="edit-name" name="tenmonhoc" class="form-control form-control-sm">
											</div>
										</div>
                    <div class="col-md-4">
											<div class="form-group">
												<label for="sotinchi">Số Tín Chỉ:</label>
												<input type="number" id="editTinChi" name="sotinchi" class="form-control form-control-sm">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2 col-6">
											<button type="submit" class="btn btn-primary btn-md btn-add" name="">Sửa</button>
										</div>
										<div class="col-md-2 col-6">
											<button type="button" id="cancel-edit" class="btn btn-primary btn-md btn-add" style="background: #dc3545; border-color: #dc3545;">Hủy</button>
										</div>
									</div>
								</form>
							</div>
              <table class="table" style="margin-top: 40px;">
								<thead class="thead-dark">
									<tr>
										<th>Mã Môn Học</th>
										<th>Tên Môn Học</th>
                    <th>Số Tín Chỉ</th>
										<th>Thao Tác</th>
									</tr>
								</thead>
								<tbody>
									@foreach($monhoc as $list)
									<tr>
										<td>{{$list->mamonhoc}}</td>
										<td>{{$list->tenmonhoc}}</td>
                    <td>{{$list->sotinchi}}</td>
										<td>
                      <a href="javascript:" data-id="{{$list->id}}" data-name="{{$list->tenmonhoc}}" data-tinchi="{{$list->sotinchi}}" data-ma="{{$list->mamonhoc}}"  class="badge badge-success edit-btn">Edit</a>
											<a href="javascript:" class="badge badge-danger delete-btn">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="right-panel">
			@include('master.login')
			@include('master.danhmuc')
			@include('master.video')
		</div>
	</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $('#add').click(function(){
  		$('.form-add').slideDown();
  	})
  	$('#cancel').click(function(){
  		$('.form-add').slideUp();
  	})
  	$('.edit-btn').click(function(){
  		id = $(this).data('id');
  		name = $(this).data('name');
      ma = $(this).data('ma');
      tinchi = $(this).data('tinchi');
  		$('#id').val(id);
  		$('#edit-name').val(name);
      $('#edit-mamonhoc').val(ma);
      $('#editTinChi').val(tinchi);
  		$('.form-edit').slideDown();
  	})
  	$('#cancel-edit').click(function(){
  		$('.form-edit').slideUp();
  	})
  })
</script>
@include('master.script')
@endsection
