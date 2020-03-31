@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="content1">
				<div class="main-panel">
					<div class="box">
						<h3 class="type">Thêm Sinh Viên</h3>
						<div class="content">
							<form action="{{route('editSV')}}" method="post" enctype="multipart/form-data">
								@csrf
                <input type="hidden" name="id" value="{{$sv->id}}">
								<div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="masv">Mã Sinh Viên</label>
                      <input type="text" name="masv" class="form-control form-control-sm" value="{{$sv->masv}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="hosv">Họ Sinh Viên</label>
                      <input type="text" name="hosv" class="form-control form-control-sm" value="{{$sv->hosv}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="tensv">Tên Sinh Viên</label>
                      <input type="text" name="tensv" class="form-control form-control-sm" value="{{$sv->tensv}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ngaysinh">Ngày Sinh</label>
                      <input type="date" name="ngaysinh" class="form-control form-control-sm" value="{{$sv->ngaysinh}}">
                    </div>
                  </div>
                  <div class="col-md-1">

                  </div>
                  <div class="col-md-5">
                    <label for="gioitinh">Giới Tính:</label>
                    <div class="form-group">
                      <label for="0" style="color: #007bff;"><i class="fas fa-mars"></i></label>
                      <input type="radio" name="gioitinh" value="0" @if($sv->gioitinh == 0) checked @endif>
                      &nbsp &nbsp
                      <label for="1" style="color: pink;"><i class="fas fa-venus"></i></label>
                      <input type="radio" name="gioitinh" value="1" @if($sv->gioitinh == 1) checked @endif>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="diachi">Địa Chỉ</label>
                      <input type="text" name="diachi" class="form-control form-control-sm" value="{{$sv->diachi}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="quequan">Quê Quán</label>
                      <input type="text" name="quequan" class="form-control form-control-sm" value="{{$sv->quequan}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="khoa">Khóa Học</label>
                      <select id="khoa" class="form-control form-control-sm" name="khoa">
                      @foreach($khoa as $list)
                        <option value="{{$list->id}}" @if($list->id == $sv->idKhoa) selected @endif>{{$list->tenkhoa}}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="idLop">Lớp</label>
                      <select id="lop" class="form-control form-control-sm" name="idLop">
                      @foreach($lop as $list)
                        <option value="{{$list->id}}" @if($list->id == $sv->idLop) selected @endif>{{$list->tenlop}}</option>
                      @endforeach
                      </select>
                    </div>
                  </div>
									<div class="col-md-2">
										<button type="submit" class="btn btn-success">Thêm</button>
									</div>
									<div class="col-md-2">
										<button type="button" class="btn btn-danger">Hủy</button>
									</div>
								</div>
							</form>
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
    $('#khoa').change(function(){
      id = $(this).val();
      $.get('{{route('changeLop')}}',{id:id},function(data){
        $('#lop').html(data);
      })
    })
  })
</script>
@include('master.script')
@endsection
