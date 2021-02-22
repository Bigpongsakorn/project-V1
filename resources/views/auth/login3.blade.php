@extends('layouts.app2')
@section('content')

	<div class="limiter">
		<div class="login-text">
            <h3>สำนักงานเทศบาลตำบลวังพร้าว</h3>
            <p>( เข้าสู่ระบบสำหรับเจ้าหน้าที่ )</p>
        </div>
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-title p-b-32">
						เข้าสู่ระบบ
					</span>

					<span class="txt1 p-b-11">
						ชื่อผู้ใช้
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						รหัสผ่าน
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							{{-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me"> --}}
							
							<input class="input-checkbox100" type="checkbox" name="remember" id="ckb1"
							    {{ old('remember') ? 'checked' : '' }}>
							<label class="label-checkbox100" for="ckb1">
								จำฉันไว้ในระบบ
							</label>
						</div>

						<div>
							{{-- <a id="password" type="password" class="txt3">
								ลืมรหัสผ่าน ?
							</a> --}}
							@if (Route::has('password.request'))
							<a class="txt3" href="{{ route('password.request') }}">
							    {{ __('ลืมรหัสผ่านหรือไม่ ?') }}
							</a>
							@endif
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">เข้าสู่ระบบ</button>
						{{-- <button class="login100-form-btn">ยกเลิก</button> --}}
						<a href="/" class="login100-form-btn">ยกเลิก</a>
					</div>
					

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

@endsection