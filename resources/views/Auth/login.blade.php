<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Login</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="text-center">
					<img class="login-logo" src="{{asset('img/logo.png')}}">					
				</div>
				<hr>
				<div class="panel-body">
					<p>Masukan username dan password anda dengan benar !</p>
					<form action="{{ route('login') }}" method="post">
						{{ csrf_field() }}
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="username" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password">
							</div>
						</fieldset>
						<button type="submit" class="btn btn-primary btn-block" name="button">Login</button>
					</form>
					
					<a href="#" class="forget-pass pull-right">Lupa Password?</a>
				</div>
				<div class="panel-footer text-center">
					<p>&copy; 2018 Balai Besar Pelatihan Pertanian <br>
					Binuang - Kalimantan Selatan</p>
				</div>

			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js')}}"></script>
	<script type="text/javascript">
		@if (count($errors) != 0)
			notif('error', 'Error', '{{$errors->first()}}');
		@endif
	</script>
</body>
</html>
