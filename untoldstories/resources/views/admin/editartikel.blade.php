@extends('admin.layouts.main')

@section('title', 'Edit|' . $artikel->judul)
@section('content')
<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header">
			<h4>Edit Isi {{ $artikel->judul }}</h4>
		</div>
		<div class="card-body">	
			<form action="{{ url('/admin/editpost') }}" method="POST">
				{{ csrf_field() }}
	          <div class="form-group">
	          	<input type="hidden" name="id_artikel" value="{{ $artikel->id }}">
	            <label for="">Isi Artikel : </label>
	            <textarea name="isi" id="edit">{!! $artikel->isi !!}</textarea>
	          </div>
	          <button type="submit" class="btn btn-primary">Simpan</button>
	        </form>
		</div>
	</div>
</div>
@endsection