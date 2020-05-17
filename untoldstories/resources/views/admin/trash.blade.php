@extends('admin.layouts.main')

@section('title', 'Kelola Artikel')
@section('content')
 <!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-9">
      <h1 class="h3 mb-2 text-gray-800">Tempat Sampah</h1>
      <p class="mb-4">Berisi data artikel yang telah dihapus, dapat dibersihkan maupun di restore.</p>
    </div>
    <div class="col-3 text-right">
      <a href="{{ url('/admin/restoreall') }}" class="btn btn-primary btn-sm mt-2">
        Restore All
        <i class="fas fa-trash-restore-alt"></i>
      </a>
      <a href="{{ url('/admin/deleteall') }}" class="btn btn-danger btn-sm mt-2 pl-3">
        Delete All
        <i class="fas fa-trash-alt"></i>
      </a>
    </div>  
  </div>

  <!-- DataTales Example -->
  <div class="card body shadow p-4 mt-4">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $i = 1; ?>
          @foreach($artikel as $a)
          <tr>
            <td>{{$i}}</td>
            <td>{{$a->judul}}</td>
            <td>
              <a class="btn btn-sm btn-primary mr-2 mt-2" href="{{ url('/admin/artikelrestore/'. $a->id) }}">
                <i class="fas fa-trash-restore-alt"></i>
              </a>
              <a href="{{ url('/admin/artikeldelete/'. $a->id) }}" class="btn btn-danger btn-sm mt-2">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
            <?php $i++; ?>
          @endforeach
          </tr>
        </tbody>
      </table>
    </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection