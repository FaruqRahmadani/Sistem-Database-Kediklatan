@extends('User.Layouts.Master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Informasi Aplikasi</div>
			<div class="panel-body">
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
			</div>
		</div>
	</div>
</div>
<div class="panel panel-container">
	<div class="row">
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
		<div class="panel panel-teal panel-widget border-right">
			<div class="row no-padding">
				<em class="fa fa-xl fa-user color-blue"></em>
				<div class="large">120</div>
				<div class="text-muted">Penyuluh</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
		<div class="panel panel-blue panel-widget border-right">
			<div class="row no-padding">
				<em class="fa fa-xl fa-users color-orange"></em>
				<div class="large">52</div>
				<div class="text-muted">Kelompok Tani</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
		<div class="panel panel-orange panel-widget border-right">
			<div class="row no-padding">
				<em class="fa fa-xl fa-archive color-teal"></em>
				<div class="large">24</div>
				<div class="text-muted">Komoditas</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
		<div class="panel panel-red panel-widget ">
			<div class="row no-padding">
				<em class="fa fa-xl fa-book color-red"></em>
				<div class="large">23</div>
				<div class="text-muted">Pelatihan</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection