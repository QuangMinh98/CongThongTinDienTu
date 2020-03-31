@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="content1">
				<div class="main-panel">
					<div class="box">
						<h3 class="type">Sinh Viên</h3>
						<div class="content">
							<div class="row">
                <div class="col-md-3">
                  <label for="khoa">Khóa</label>
                  <select class="form-control form-control-sm" id="khoa">
                    @if(isset($khoa))
                      @foreach($khoa as $list)
                      <option value="{{$list->id}}" @if(isset($class) && $class->idKhoa==$list->id) selected @endif>{{$list->tenkhoa}}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="lop">Lớp</label>
                  <select id="lop" class="form-control form-control-sm" name="lop">
                    @if(isset($lop))
                      @foreach($lop as $list)
                      <option value="{{$list->id}}" @if(isset($class) && $class->id==$list->id) selected @endif>{{$list->tenlop}}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="col-md-2">
                  <button id="link-btn" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; ">Tìm Kiếm</button>
                </div>
								<div class="col-md-3">
									<a href="{{route('showAddSV')}}">
                    <button id="add" class="btn btn-primary btn-md" style="margin-top: 30px; width: auto; ">
                      <i class="fas fa-plus-circle"></i>&nbspSinh Viên
                    </button>
                  </a>
								</div>
							</div>
              <table class="table" style="margin-top: 40px;">
								<thead class="thead-dark">
									<tr>
										<th>Mã Sinh Viên</th>
										<th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Lớp</th>
                    <th>Điểm</th>
										<th>Thao Tác</th>
									</tr>
								</thead>
								<tbody>
                  @if(isset($sv))
									@foreach($sv as $list)
									<tr>
										<td>{{$list->masv}}</td>
										<td>{{$list->hosv.' '.$list->tensv}}</td>
                    <td>
                      <label for="0">Nam</label>
                      <input type="radio" class="gender" data-id="{{$list->id}}" name="{{$list->id}}" value="0" @if($list->gioitinh == 0) checked @endif>
                      <label for="1">Nữ</label>
                      <input type="radio" class="gender" data-id="{{$list->id}}" name="{{$list->id}}" value="1" @if($list->gioitinh == 1) checked @endif>
                    </td>
                    <td>{{$list->tenlop}}</td>
                    <td>
                      <a href="{{route('diemcanhan',['id'=>$list->id])}}" class="badge badge-primary">Điểm</a>
                    </td>
										<td>
                      <a href="{{route('showEditSV',['id'=>$list->id])}}" class="badge badge-success edit-btn">Edit</a>
											<a href="javascript:" class="badge badge-danger delete-btn">Delete</a>
										</td>
									</tr>
									@endforeach
                  @endif
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
    $('.gender').click(function(){
      id = $(this).data('id');
      gender = $(this).val();
      $.post('{{route('changeGender')}}',{id:id,gender:gender,_token:"{{csrf_token()}}"}).fail(function(){
				alert('Không thể hoàn thành thao tác');
			});
    })
    $('#khoa').change(function(){
      id = $(this).val();
      $.get('{{route('changeLop')}}',{id:id},function(data){
        $('#lop').html(data);
      })
    })
    $('#link-btn').click(function(){
      let lop = $('#lop').val();
      if(lop === null){

      }
      else{
        url = lop;
        window.location = "{{route('defaultList')}}"+"/"+url;
      }
    })
  })
</script>
@include('master.script')
@endsection
