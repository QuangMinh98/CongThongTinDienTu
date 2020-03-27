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
									<button id="add" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; "><i class="fas fa-plus-circle"></i>&nbspThêm Thể Loại</button>
								</div>
							</div>
							<div class="form-add">
								<form action="" method="post">
									@csrf
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="tentheloai">Tên Thể Loại:</label>
												<input type="text" name="tentheloai" class="form-control form-control-sm">
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
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="right-panel">
			@include('master.login')
			@include('master.thongbaochinh')
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
	})
</script>
@endsection