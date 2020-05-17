@extends('admin.layouts.main')

@section('title', 'Tambah Artikel')
@section('content')
	<div class="container-fluid">
		<h3>Tambah Artikel</h3>
		<div class="card p-3 pt-5">
			@if( count($errors) >0 )
			<div class="alert-danger mb-4 text-center pt-3">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>	
			</div>
			@endif

			<form action="{{ url('/admin/artikelpost') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
				<div class="form-group col">
					<select class="custom-select" name="listing_id">
						<option value="" selected> Kategori</option>
						@foreach($kategori as $k)
						<option value="{{$k->id}}">{{$k->kategori}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col">
					<input class="form-control" type="text" name="judul" placeholder="Judul">
				</div>
				</div>
				<label for="gambar" class="btn btn-primary">Pilih Banner</label>
				<input id="gambar" type="file" name="image">
				<!-- <input class="form-control mb-3" type="text" name="tags" placeholder="Tags"> -->
				<div class="form-group">
					<textarea name="isi" id="edit"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
@endsection
