<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href={{ URL::asset('assets/css/register/styleRegister.css'); }} />
	</head>
	<body>
		<div class="wrapper" style="background-image: url('assets/img/registration-form-2.png');">
				<form action="/register" method="POST">
					@csrf
					<h3>Registration Form</h3>
						<div class="form-group">
							<div class="form-wrapper">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control is-invalid" id="name" placeholder="Name" required value="{{ old('name') }}">
								@error('name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Email Address</label>
							<input type="email" name="email" class="form-control is-invalid" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
							@error('email')
									<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-wrapper">
							<label for="">Password</label>
							<input type="password" name="password" class="form-control is-invalid" id="password" placeholder="Password" required>
							@error('password')
									<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					<button>Register Now</button>
					<div class="register-card-footer">
						Already have an account? <a href="/login">Go to Login.</a>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>