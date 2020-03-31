@extends('master.master')

@section('noidung')
<section>
	<div class="row" style="margin: 0;">
		<div class="main">
			<div class="content1">
				<div class="main-panel">
					<div class="box">
						<h3 class="type">Điểm Cá Nhân</h3>
						<div class="content">
							<div class="row">
                <div class="col-md-4">
                  <h3>Mã SV: {{$sv->masv}}</h3>
                </div>
                <div class="col-md-8">
                  <h3>Họ Và Tên SV: {{$sv->hosv.' '.$sv->tensv}}</h3>
                </div>
                <div class="col-md-4">
                  <h3>Ngày Sinh: {{$sv->ngaysinh}}</h3>
                </div>
                <div class="col-md-8">
                  <h3>Giới Tính: @if($sv->gioitinh == 0) Nam @else Nữ @endif</h3>
                </div>
                <div class="col-md-12">
                  <h3>Địa Chỉ: {{$sv->diachi}}</h3>
                </div>
                <div class="col-md-12">
                  <h3>Quê Quán: {{$sv->quequan}}</h3>
                </div>
							</div>
              <table class="table" style="margin-top: 40px;">
								<thead class="thead-dark">
									<tr>
										<th>Tên Môn Học</th>
										<th>Chuyên Cần</th>
                    <th>Thường Xuyên</th>
                    <th>Giữa Kỳ</th>
                    <th>Cuối Kỳ</th>
										<th>Thao Tác</th>
									</tr>
								</thead>
								<tbody>
									@foreach($diem as $list)
									<tr>
										<td>{{$list->tenmonhoc}}</td>
										<td>{{$list->chuyencan}}</td>
                    <td>{{$list->thuongxuyen}}</td>
                    <td>{{$list->giuaky}}</td>
                    <td>{{$list->cuoiky}}</td>
										<td>
                      <a href="#" data-chuyencan='{{$list->chuyencan}}' data-thuongxuyen='{{$list->thuongxuyen}}' data-giuaky='{{$list->giuaky}}' data-cuoiky='{{$list->cuoiky}}' data-id='{{$list->id}}' data-name='{{$list->tenmonhoc}}' class="badge badge-success edit-btn" data-toggle="modal" data-target="#myModal">Edit</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
              <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h5 class="modal-title">Modal Heading</h5>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="{{route('suadiem')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="idSV" value="{{$sv->id}}">
                        <div class="fom-group">
                          <label for="chuyencan">Chuyên Cần:</label>
                          <input id="chuyencan" type="number" name="chuyencan" step="any" class="form-control form-control-sm">
                        </div>
                        <div class="fom-group">
                          <label for="thuongxuyen">Thường Xuyên:</label>
                          <input id="thuongxuyen" type="number" name="thuongxuyen" step="any" class="form-control form-control-sm">
                        </div>
                        <div class="fom-group">
                          <label for="giuaky">Giữa Kỳ:</label>
                          <input id="giuaky" type="number" name="giuaky" step="any" class="form-control form-control-sm">
                        </div>
                        <div class="fom-group">
                          <label for="cuoiky">Cuối Kỳ:</label>
                          <input id="cuoiky" type="number" name="cuoiky" step="any" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                          <label for=""></label>
                          <button type="submit" class="btn btn-success" name="button">Sửa</button>
                        </div>
                      </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>
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
@include('master.script')
<script type="text/javascript">
  $(document).ready(function(){
    $('.edit-btn').click(function(){
      id = $(this).data('id');
      title = $(this).data('name');
      chuyencan = $(this).data('chuyencan');
      thuongxuyen = $(this).data('thuongxuyen');
      giuaky = $(this).data('giuaky');
      cuoiky = $(this).data('cuoiky');
      $('.modal-title').text(title);
      $('#id').val(id);
      $('#chuyencan').val(chuyencan);
      $('#thuongxuyen').val(thuongxuyen);
      $('#giuaky').val(giuaky);
      $('#cuoiky').val(cuoiky);
    })
  })
</script>
@endsection

@section('style')
<style media="screen">
  h3{
    font-size: 15px;
    padding: 10px 0px;
  }
</style>
@endsection
