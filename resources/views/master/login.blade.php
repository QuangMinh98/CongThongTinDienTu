<div class="box box-margin" style="height: 250px;">
	@if(Auth::check())
	<h4>Thông tin users</h4>
	<h5 style="font-size: 13px;">Tên Người dùng: {{Auth::user()->name}}</h5>
	<a href="{{route('logout')}}">Đăng Xuất</a>
	@else
	<h4>Đăng Nhập</h4>
	<form action="{{route('login')}}" method="post" class="form-login">
		@csrf
		<label for="email">Tên Đăng Nhập</label>
		<input type="text" name="email">
		<label for="password">Mật Khẩu</label>
		<input type="password" name="password">
		<button type="submit" class="login-btn">Đăng Nhập</button>
	</form>
	@endif
</div>
