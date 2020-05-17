@extends('admin.layouts.main')

@section('title','Tag')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row p-2">
  	<div class="col">
  		<h1 class="h3 mb-2 text-gray-800">Tag</h1>
	 	<p class="mb-4">Tag dari artikel yang telah dibuat.</p>
  	</div>
  	<div class="col text-right">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary pl-5 pr-5" data-toggle="modal" data-target="#exampleModalCenter">
		  Tambah Tag
		</button>
  	</div>
  </div>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 text-gray-800">Tag</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Tag</th>
              <th>Jumlah Artikel</th>
              <th>Dibuat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Tag</th>
              <th>Jumlah Artikel</th>
              <th>Dibuat</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
          	<?php $i = 1; ?>
          	@foreach($tag as $t)
            <tr>
              <td><?= $i; ?></td>
              <td>{{ $t->nama_tag}}</td>
              <td>{{ count($t->Artikel_Tag) }}</td>
              <td>{{ $t->created_at }}</td>
              <td>
              	<button type="button" class="pl-3 pr-3 btn btn-sm btn-warning" data-toggle="modal" data-target="#action" data-id_list="{{$t->id}}" data-name_list="{{$t->nama_tag}}">Edit</button>
              	<a type="button" class="btn btn-danger btn-sm" href="{{ url('/admin/kategori/deletestore/'.$t->id) }}">Hapus</a>
              </td>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
    
    <form action="{{url('/admin/tag/tambah')}}" method="POST">
    	{{ csrf_field() }}
        <input class="form-control" type="text" name="nama_tag" placeholder="Nama Tag">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

      </div>
    </div>
  </div>
</div>

<!-- modal-edit -->
<div class="modal fade" id="action" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="{{url('/admin/tag/editstore')}}" method="POST">
    	{{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_list" name="id_tag">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" id="name_list" name="nama_tag">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>

@endsection

