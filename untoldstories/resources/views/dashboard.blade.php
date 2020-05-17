@extends('layout.mainhome')
@section('title', 'UntoldStories | Home')
@section('content')

<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">

                <div class="featured__column featured__column--big">
                    <div class="entry" style="background-image:url('images/UntoldStories.jpg');">
                        
                        <div class="entry__content">
                            <span class="entry__category"><a href="{{ url('/kategori/5') }}">Tempat</a></span>

                            <h1><a href="{{ url('/kategori/5') }}" title="">Beberapa Tempat Dengan Cerita Dibaliknya.</a></h1>

                        </div> <!-- end entry__content -->
                        
                    </div> <!-- end entry -->
                </div> <!-- end featured__big -->

                <div class="featured__column featured__column--small">

                    <div class="entry" style="background-image:url('images/adat.jpg');">
                        
                        <div class="entry__content">
                            <span class="entry__category"><a href="{{ url('/kategori/6') }}">Budaya</a></span>

                            <h1><a href="{{ url('/kategori/6') }}" title="">Budaya beragam, dari tanah air.</a></h1>

                        </div> <!-- end entry__content -->
                      
                    </div> <!-- end entry -->

                    <div class="entry" style="background-image:url('images/kuliner.jpg');">

                        <div class="entry__content">
                            <span class="entry__category"><a href="{{ url('/kategori/1') }}">Kuliner</a></span>

                            <h1><a href="{{ url('/kategori/1') }}" title="">Banyak Hal Unik Dari Makanan Selain Rasa.</a></h1>

                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->

                </div> <!-- end featured__small -->
            </div> <!-- end featured -->

        </div> <!-- end col-full -->
    </div> <!-- end pageheader-content row -->

</section> <!-- end s-pageheader -->



<!-- s-content
================================================== -->
<section class="s-content">
    
    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>

            <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    
                <div class="entry__thumb">
                    <a href="/artikel/{{ $artikel[0]->id }}" class="entry__thumb-link">
                        @foreach($artikel[0]->FotoBlog as $af)
                        <img class="img-fluid" src="{{ asset('img/artikel/'. $af->foto) }}" alt="{{ $artikel[0]->judul }}">
                        @endforeach
                    </a>
                </div>

                <div class="entry__text">
                    <div class="entry__header">
                        
                        <div class="entry__date">
                            <a href="{{ url('/artikel/'. $artikel[0]->id) }}">{{ $tgl[0] }}</a>
                        </div>
                        <h1 class="entry__title"><a href="{{ url('/artikel/'.$artikel[0]->id) }}">{{ $artikel[0]->judul }}</a></h1>
                        
                    </div>
                    <div class="entry__excerpt">
                        <div class="isi-dash">
                            {!! $isidepan[0] !!}
                        </div>
                    </div>
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                        <a href="{{ url('/kategori/'. $artikel[0]->Kategori['id']) }}">{{ $artikel[0]->Kategori['kategori'] }}</a> 
                        </span>
                    </div>
                </div>

            </article> <!-- end article -->

            <article class="masonry__brick entry format-quote" data-aos="fade-up">
                    
                <div class="entry__thumb">
                    <blockquote>
                            <p>Untold Series.</p>
                    </blockquote>
                </div>   

            </article> <!-- end article -->

            <?php for ($i=1; $i < count($artikel) ; $i++): ?> 
            <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    
                <div class="entry__thumb">
                    <a href="{{ url('/artikel/'. $artikel[$i]->id) }}" class="entry__thumb-link">
                       @foreach($artikel[$i]->FotoBlog as $af)
                            <img src="{{ asset('img/artikel/'. $af->foto) }}" alt="{{ $artikel[$i]->judul }}">
                        @endforeach
                    </a>
                </div>
                <div class="entry__text">
                    <div class="entry__header">
                        
                        <div class="entry__date">
                            <a href="{{ url('/artikel/'. $artikel[$i]->id) }}">
                                {{ $tgl[$i] }}
                            </a>
                        </div>
                        <h1 class="entry__title"><a href="{{ url('/artikel/'.$artikel[$i]->id) }}">{{ $artikel[$i]->judul }}</a></h1>
                        
                    </div>
                    <div class="entry__excerpt">
                        <div class="isi-dash">
                            {!! $isidepan[$i] !!}
                        </div>
                    </div>
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                             <a href="{{ url('/kategori/'.$artikel[$i]->Kategori['id']) }}">{{ $artikel[$i]->Kategori['kategori'] }}</a>
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

