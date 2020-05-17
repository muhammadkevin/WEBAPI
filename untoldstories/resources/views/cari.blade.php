@extends('layout.mainartikel')
@section('title', 'Search | '. $cari)

@section('content')
  <!-- s-content
    ================================================== -->
<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Search: {{ $cari }}</h1>
        </div>
    </div>
    
    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

            <?php for($c=0; $c < count($artikel); $c++): ?>
            <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    
                <div class="entry__thumb">
                    <a href="{{ url('/artikel/' . $artikel[$c]->id) }}" class="entry__thumb-link">    @foreach($FotoBlog[$c] as $FB)
                            <img src="{{ asset('img/artikel/' . $FB->foto) }}" alt="{{ $artikel[$c]->judul }}">
                        @endforeach
                    </a>
                </div>

                <div class="entry__text">
                    <div class="entry__header">
                        
                        <div class="entry__date">
                            <a href="single-standard.html">{{ $tanggal[$c] }}</a>
                        </div>
                        <h1 class="entry__title"><a href="{{ url('/artikel/'. $artikel[$c]->id) }}">{{ $artikel[$c]->judul }}</a></h1>
                        
                    </div>
                    <div class="entry__excerpt">
                        <div class="isi-dash">
                            {!! $artikel[$c]->isi !!}
                        </div>
                    </div>
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                            <a href="{{ url('/kategori/'. $kategoris[$c]->id) }}">
                                {{ $kategoris[$c]->kategori }}
                            </a>
                        </span>
                    </div>
                </div>

            </article> <!-- end article -->            
            <?php endfor; ?>

        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="col-full">
            {{ $artikel->links() }}
        </div>
    </div>

</section> <!-- s-content -->
@endsection