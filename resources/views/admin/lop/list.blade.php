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
									<form class="" action="{{route('lop')}}" method="get">
										<div class="form-group">
											<label for="khoa">Khóa</label>
											<select class="form-control form-control-sm" name="khoa" onchange="this.form.submit()">
												@foreach($khoa as $list)
												<option value="{{$list->id}}" @if(isset($sort) and $sort==$list->id)selected @endif>{{$list->tenkhoa}}</option>
												@endforeach
											</select>
										</div>
									</form>
								</div>
								<div class="col-md-3">
									<button id="add" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; "><i class="fas fa-plus-circle"></i>&nbspThêm Lớp</button>
								</div>
							</div>
							<div class="form-add">
								<form action="{{route('addLop')}}" method="post">
									@csrf
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="tentheloai">Tên Lớp:</label>
												<input type="text" name="tenlop" class="form-control form-control-sm">
											</div>
										</div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="idKhoa">Khóa</label>
                        <select class="form-control form-control-sm" name="idKhoa">
                          @foreach($khoa as $list)
                          <option value="{{$list->id}}">{{$list->tenkhoa}}</option>
                          @endforeach
                        </select>
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
								<form action="{{route('editLop')}}" method="post">
									@csrf
									<input type="hidden" name="id" id="id">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="tentheloai">Tên Lớp:</label>
												<input type="text" id="edit-name" name="tenlop" class="form-control form-control-sm">
											</div>
										</div>
                    <div class="col-md-4">
											<div class="form-group">
                        <label for="idKhoa">Khóa</label>
                        <select id="edit-Khoa" class="form-control form-control-sm" name="idKhoa">
                          @foreach($khoa as $list)
                          <option id="{{$list->id}}" value="{{$list->id}}">{{$list->tenkhoa}}</option>
                          @endforeach
                        </select>
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
										<th>Tên Lớp</th>
										<th>Tên Khóa</th>
										<th>Thao Tác</th>
									</tr>
								</thead>
								<tbody>
									@foreach($lop as $list)
									<tr>
										<td>{{$list->tenlop}}</td>
										<td>{{$list->tenkhoa}}</td>
										<td><a href="javascript:" data-id="{{$list->id}}" data-name="{{$list->tenlop}}" data-khoa="{{$list->idKhoa}}"  class="badge badge-success edit-btn">Edit</a>
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
      khoa = $(this).data('khoa');
  		$('#id').val(id);
  		$('#edit-name').val(name);
      $('#'+khoa).attr('selected','true');
  		$('.form-edit').slideDown();
  	})
  	$('#cancel-edit').click(function(){
  		$('.form-edit').slideUp();
  	})
  })
</script>
@include('master.script')
@endsection
