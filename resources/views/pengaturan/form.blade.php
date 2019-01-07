@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Pengaturan Aplikasi</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Image Landing Page
				</div>
				<div class="panel-body text-center">
					<img src="{{asset('img/logofix.png')}}" style="width:85%">
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{Route('p4sTambahSubmit')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-md-2 control-label">Image Landing Page</label>
							<div class="col-md-10">
								<input type="file" name="image_landing" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Kontak</label>
							<div class="col-md-10">
								<textarea name="kontak" rows="4" class="form-control" required></textarea>
							</div>
						</div>
						<div class="row">
							<div class="text-center">
								<div class="col-md-12">
									<button id="submit" type="submit" class="btn btn-info btn-fill">Simpan</button>
									<button type="reset" class="btn btn-warning btn-fill">Batal</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
