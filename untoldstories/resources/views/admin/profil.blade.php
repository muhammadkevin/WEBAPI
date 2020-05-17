@extends('admin.layouts.main')
@section('title', $data->name)
@section('content')
	<div class="container">
		<div class="col-10 mx-auto">
			<div class="card shadow mb-5">
				<div class="card-header pl-4 pr-4">
					<h3>Halaman Profil</h3>
				</div>
				<div class="card-body p-4">
					<div class="row">
						<div class="text-center col-8">
							@foreach($foto as $f)
							<img src="{{ asset('img/users/' . $f->foto_profil) }}" class="rounded-circle img-fluid">
							@endforeach
							<form action="{{url('/admin/editfoto')}}" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<label for="gambar" class="btn">
									<i class="fa fa-user"></i>
								</label>
								<input type="file" name="foto" id="gambar" onchange="this.form.submit()">
							</form>
						</div>
						<div class="col-4">
							<button class="btn btn-sm btn-block btn-primary mr-2 mt-2" data-iduser="{{ $data->id }}" data-nameuser="{{ $data->name }}" data-emailuser="{{ $data->email }}" data-toggle="modal" data-target="#modal-profil">
				        		Edit Profil
				      		</button>
				      		<button class="btn btn-sm btn-block btn-primary mr-2 mt-2" data-toggle="modal" data-target="#">
				        		Ganti Password
				      		</button>
						</div>
					</div>
					<div class="row">
						<div class="col-5">
							<div class="mt-3">Nama</div>
							<div class="mt-4">Email</div>
						</div>
						<div class="col-7">
							<div class="mt-3">: {{ $data->name }}</div>
							<div class="mt-4">: {{ $data->email }}</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal Edit Profil -->
<div id="modal-profil" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Edit Artikel
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <!-- form -->
        <form action="{{url('/admin/editprofil')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="iduser" id="iduser">
          <div class="form-group">
            <label for="nameuser">Nama : </label>
           <input type="text" class="form-control" name="nameuser" id="nameuser">
          </div>
          <div class="form-group">
            <label for="emailuser">email : </label>
            <input type="text" name="emailuser" class="form-control" id="emailuser">
          </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </form>
        <!-- end-form -->
      </div>
    </div>
  </div>
</div>





@endsection