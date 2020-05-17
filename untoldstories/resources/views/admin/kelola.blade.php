@extends('admin.layouts.main')

@section('title', 'KodingIndie|Kelola Artikel')
@section('content')
 <!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-10">
      <h1 class="h3 mb-2 text-gray-800">Artikel</h1>
      <p class="mb-4">Pengelompokan artikel berdasarkan kategori.</p>
    </div>
    <div class="col-2 text-right">
      <a href="{{ url('/admin/Artikeltrash') }}" class="btn btn-success">
        <small>Tempat Sampah</small>
        <i class="fas fa-trash"></i>
      </a>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card"></div>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tag</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Url</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tag</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Url</th>
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
              <?php for($x=0; $x < count($a->Artikel_Tag); $x++) : ?>
                <div>
                  {{ $a->Tag[$x]->nama_tag }} 
                  <a href="{{ url('/admin/tagdelete/'. $a->Artikel_Tag[$x]->id) }}">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </div>
              <?php endfor; ?>
              <button type="button" class="btn btn-sm btn-primary mt-3" data-artikelsid="{{ $a->id }}" data-toggle="modal" data-target="#modal-tag">
              <i class="fas fa-plus"></i>
              </button>
            </td>
            <td>
                {{ $a->Kategori['kategori'] }}
            </td>
            @foreach($a->FotoBlog as $as)
            <td class="text-center">
              <div class="row">   
                <div class="col">
                  <img id="img_kelola" src="{{ asset('img/artikel/'.$as->foto) }}">  
                </div>
                <div class="col">    
                  <button type="button" class="btn btn-sm btn-primary mt-3" data-idartikel="{{ $a->id }}" data-toggle="modal" data-target="#modal-gambar">
                    <i class="fas fa-edit"></i>
                  </button><br>
                  <a class="btn btn-primary btn-sm mt-3" target="blank" href="/artikel/{{ $a->id }}">
                    <i class="fa fa-eye"></i>
                  </a>
                </div>
              </div>
            </td>
            <td>
              <div class="row">   
                <div class="col">
                  <span> {{ $as->url }} </span>  
                </div>
                <div class="col">    
                  <button type="button" class="btn btn-sm btn-primary mt-3" data-artikldssparam="{{ $a->id }}" data-namaimg="{{ $as->foto }}" data-toggle="modal" data-target="#modal-url">
                    <i class="fas fa-edit"></i>
                  </button>
                </div>
              </div>
            </td>
            <td>
              <button class="btn btn-sm btn-warning mr-2 mt-2" data-judul="{{ $a->judul }}" data-idartikel="{{ $a->id }}" data-idlistz="{{ $a->Kategori['id'] }}" data-listname="{{ $a->Kategori['kategori'] }}" data-toggle="modal" data-target="#modal-judul">
            @endforeach
                <i class="fas fa-heading"></i>
              </button>
              <a class="btn btn-sm btn-warning mr-2 mt-2" target="blank" href="{{ url('/admin/artikeledit/'. $a->id) }}">
                <i class="fas fa-paragraph"></i>
              </a>
              <a href="/admin/hapuspost/{{ $a->id }}" class="btn btn-danger btn-sm mt-2">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
            <?php $i++; ?>
          @endforeach
          </tr>
        </tbody>
      </table>
        {{ $artikel->links() }} 
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal Edit judul tag -->
<div id="modal-judul" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
        <form action="{{ url('/admin/edittitle') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="id_artikel" id="idArtikel">
          <div class="form-group">
            <label for="">Judul : </label>
            <input type="text" class="form-control" name="judulnew" id="judulz">
          </div>
          <div class="form-group">
            <label for="lne">Kategori : </label>
            <select class="custom-select" name="list_id" id="lne">
              <option id="list_name_edit" value="" selected></option>
              @foreach($kategori as $k)
              <option value="{{ $k->id }}">{{ $k->kategori }}</option>
              @endforeach
            </select>
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

<!-- Modal Gambar -->
<div class="modal fade" id="modal-gambar" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGambarLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
    <!-- form -->
        <form action="{{ url('/admin/editgambar') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="id_artikel" id="idartikelz">
          <label for="gambar" class="btn btn-primary">Ubah Gambar</label>
          <input type="file" name="gambar" id="gambar">
          <p>Pilih Gambar untuk melakukan perubahan gambar. <br>
          Dengan Ukuran 1600 x 1160 (agar selaras)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <!-- end-form -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Tag -->
<div class="modal fade" id="modal-tag" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGambarLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
    <!-- form -->
        <form action="{{ url('/admin/artikeltag') }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="artikel_id" id="artikls">
          <select class="custom-select" name="tag_id">
              @foreach($tag as $t)
                <option value="{{ $t->id }}">{{ $t->nama_tag }}</option>
              @endforeach
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <!-- end-form -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Url -->
<div class="modal fade bd-example-modal-xl" id="modal-url" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGambarLabel">Modal URL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
    <!-- form -->
        <form action="{{ url('/admin/artikelurlimage') }}" method="POST">
          {{ csrf_field() }}
          <input type="text" name="idurl" id="artikldss">
          <input type="text" name="urlss" id="imgurl" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <!-- end-form -->
      </div>
    </div>
  </div>
</div>


@endsection