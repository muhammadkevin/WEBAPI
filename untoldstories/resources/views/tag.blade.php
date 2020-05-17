@extends('layout.mainartikel')
@section('title', 'US | ' . $tag[0]->nama_tag)

@section('content')
  <!-- s-content
    ================================================== -->
<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Tag: {{ $tag[0]->nama_tag }}</h1>
        </div>
    </div>
    
    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>
            
            @foreach($tag as $t)
            @foreach($t->Artikel as $tgt)
            <?php for($z=0; $z < count($tanggal); $z++): ?>
                <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    
                <div class="entry__thumb">
                    <a href="{{ url('/artikel/'. $tgt->id) }}" class="entry__thumb-link">
                        @foreach($tgt->FotoBlog as $ab)
                            <img src="{{ asset('img/artikel/' . $ab->foto) }}" alt="{{ $tgt->judul }}">
                        @endforeach
                    </a>
                </div>

                <div class="entry__text">
                    <div class="entry__header">
                        
                        <div class="entry__date">
                            <a href="single-standard.html">{{ $tanggal[$z] }}</a>
                        </div>
                        <h1 class="entry__title"><a href="{{ url('/artikel/'.  $tgt->id) }}">{{ $tgt->judul }}</a></h1>
                        
                    </div>
                    <div class="entry__excerpt">
                        <div class="isi-dash">
                            {!! $tgt->isi !!}
                        </div>
                    </div>
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                          
                            <a href="{{ url('/kategori/'. $tgt->Kategori->id) }}">
                                {{ $tgt->Kategori->kategori }}
                            </a>
                         
                        </span>
                    </div>
                </div>

            </article> <!-- end article -->  
            <?php endfor;?>
            @endforeach
          @endforeach


        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="col-full">
          
        </div>
    </div>

</section> <!-- s-content -->
@endsection