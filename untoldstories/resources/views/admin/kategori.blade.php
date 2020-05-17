@extends('admin.layouts.main')

@section('title','Kategori')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row p-2">
  	<div class="col">
  		<h1 class="h3 mb-2 text-gray-800">Kategori</h1>
	 	<p class="mb-4">Pengelompokan dari artikel yang di posting.</p>
  	</div>
  	<div class="col text-right">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary pl-5 pr-5" data-toggle="modal" data-target="#exampleModalCenter">
		  Tambah Kategori
		</button>
  	</div>
  </div>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h4 class="m-0 text-gray-800">Kategori</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Deskripsi</th>
              <th>Jumlah Artikel</th>
              <th>Dibuat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Deskripsi</th>
              <th>Jumlah Artikel</th>
              <th>Dibuat</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
          	<?php $i = 1; ?>
          	@foreach($kategori as $k)
            <tr>
              <td><?= $i; ?></td>
              <td>{{ $k->kategori}}</td>
              <td>
                  <button type="button" class="pl-3 pr-3 btn btn-sm btn-primary" data-toggle="modal" data-target="#lihatdesk" data-isidesk="{{ $k->deskripsi }}">Lihat</button>
              </td>
              <td>{{ count($k->Artikel) }}</td>
              <td>{{ $k->created_at }}</td>
              <td>
              	<button type="button" class="pl-3 pr-3 btn btn-sm btn-warning" data-toggle="modal" data-target="#action" data-id_list="{{$k->id}}" data-deskripsis="{{ $k->deskripsi }}" data-name_list="{{$k->kategori}}">Edit</button>
              	<a type="button" class="btn btn-danger btn-sm" href="/admin/kategori/deletestore/{{$k->id}}">Hapus</a>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
    
    <form action="{{url('/admin/kategori/tambah')}}" method="POST">
    	{{ csrf_field() }}
        <div class="form-group">
          <input class="form-control" type="text" name="name_list" placeholder="Nama List">
        </div>
        <div class="form-group">
          <textarea name="deskripsi" id="edit"></textarea>
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

<!-- modal-edit -->
<div class="modal fade" id="action" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="{{url('/admin/kategori/editstore')}}" method="POST">
        <div id="nani"></div>
    	{{ csrf_field() }}
          <div class="form-group">
            <input type="hidden" class="form-control" id="id_list" name="id_list">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" id="name_list" name="name_list">
          </div>
          <div class="form-group">
            <textarea class="edt-des" name="deskripsi" id="ckdt">Copy lagi deskripsi kesini jika tidak ada perubahan pada deskripsi</textarea>
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


<div class="modal fade" id="lihatdesk" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Deskripsi</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="isidesks"></div>
      </div>
    </div>
  </div>
</div>

@endsection

