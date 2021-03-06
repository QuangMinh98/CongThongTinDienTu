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
										<form action="" method="get">
											<div class="form-group">
												<label for="search">Search</label>
												<input type="search" name="search" class="form-control form-control-sm">
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-3">
									<button id="add" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; "><i class="fas fa-plus-circle"></i>&nbspThêm Người Dùng</button>
								</div>
							</div>
							<div class="form-add">
								<form action="{{route('addUser')}}" method="post">
									@csrf
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="email">Email:</label>
												<input type="text" name="email" class="form-control form-control-sm">
											</div>
										</div>
                    <div class="col-md-4">
											<div class="form-group">
												<label for="name">Username:</label>
												<input type="text" name="name" class="form-control form-control-sm">
											</div>
										</div>
                    <div class="col-md-4">
											<div class="form-group">
												<label for="password">Password:</label>
												<input type="password" name="password" class="form-control form-control-sm">
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
								<form action="{{route('editUser')}}" method="post">
									@csrf
									<input type="hidden" name="id" id="id">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="name">Username:</label>
												<input type="text" id="edit-name" name="name" class="form-control form-control-sm">
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
										<th>Email</th>
										<th>Username</th>
										<th>Thao Tác</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $list)
									<tr>
										<td>{{$list->email}}</td>
										<td>{{$list->name}}</td>
										<td><a href="javascript:" data-id="{{$list->id}}" data-name="{{$list->name}}"  class="badge badge-success edit-btn">Edit</a>
											<a href="javascript:" class="badge badge-danger delete-btn" data-id="{{$list->id}}">Delete</a>
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
<script type="text/javascript" src="{{asset('js/changeLoaiTin.js')}}"></script>
@include('master.script')
@endsection
