@extends('layout.mainartikel')
@section('title', $artikel->judul)

@section('content')
    <!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                {{ $artikel->judul }}.
            </h1>
            <ul class="s-content__header-meta">
                <li class="date">{{ $tanggal }}</li>
                        In
                <li class="cat">
                    <a href="{{ url('/kategori/'. $kategori->id) }}">{{ $kategori->kategori }}</a>
                </li>
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                
                @foreach($artikel->FotoBlog as $t)
                <img src="{{ asset('img/artikel/' . $t->foto) }}" 
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="{{ $artikel->judul }}" >
                @endforeach
                
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

            <p class="lead">{!! $artikel->isi !!}</p>

            <p class="s-content__tags">
                <span>Post Tags</span>
             
                @foreach($artikel->Tag as $t)
                <span class="s-content__tag-list">
                    <a href="{{ url('/tag/'.$t->id) }}">{{ $t->nama_tag }}</a>
                </span>
                @endforeach
            
            </p> <!-- end s-content__tags -->

            <div class="s-content__author">
                <img src="{{ asset('images/untold-stories2.jpg')}}" alt="">

                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a href="#0">Admin US</a>
                    </h4>
                
                    <p>Mengisi waktu saya yang kebanyakan rebahan, semoga ada sedikit pelajaran yang bisa kita petik bersama Amiin.. 
                    </p>

                    <ul class="s-content__author-social">
                       <li><a href="https://www.facebook.com/matrix.kevin83">Facebook</a></li>
                       <li><a href="https://www.instagram.com/untold.stories13/">Instagram</a></li>
                    </ul>
                </div>
            </div>

            <div class="s-content__pagenav">
                <div class="s-content__nav">
                    <div class="s-content__prev">
                        <a href="{{ url('/artikel/'.$prev['id']) }} " rel="prev">
                            <span>Previous Post</span>
                        @if(!empty($prev))
                            {{ $prev['judul'] }} 
                        @else
                            {{ '--' }}
                        @endif
                        </a>
                        
                    </div>
                    <div class="s-content__next">
                        
                        <a href="{{ url('/artikel/'.$next['id']) }}" rel="next">
                            <span>Next Post</span>
                        @if(!empty($next))
                             {{ $next['judul'] }}
                        @else
                            {{ '--' }}
                        @endif
                        </a>
                    </div>
                </div>
            </div> <!-- end s-content__pagenav -->

        </div> <!-- end s-content__main -->

    </article>


    <!-- comments
    ================================================== -->
    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">
                <h3 class="h2">{{ $jumlahcomment }} Comments</h3>

                <!-- commentlist -->
                <ol class="commentlist">

                <?php for ($i=0; $i < count($comment) ; $i++) : ?>

                    <li class="thread-alt depth-1 comment">

                        <div class="comment__avatar">
                            <img width="50" height="50" class="avatar" src="{{ asset('images/avatars/user-04.jpg') }}" alt="">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                            <cite>{{ $comment[$i]->Commentd[0]->nama }}</cite>

                            <div class="comment__meta">
                                <time class="comment__time">{{ $comment[$i]->Commentd[0]->created_at }}</time>
                                <a class="reply bls" href="#formkomen" data-idid="{{ $comment[$i]->id }}" data-nama="{{ $comment[$i]->Commentd[0]->nama }}">Reply</a>
                            </div>
                            </div>

                            <div class="comment__text">
                            <p>{{ $comment[$i]->Commentd[0]->isi }}</p>
                            </div>

                        </div>

                        <ul class="children">
                        <?php for ($e=1; $e < count($comment[$i]->Commentd) ; $e++): ?> 
                            <li class="depth-2 comment">

                                <div class="comment__avatar">
                                    <img width="50" height="50" class="avatar" src="{{ asset('images/avatars/user-03.jpg')}}" alt="">
                                </div>

                                <div class="comment__content">

                                    <div class="comment__info">
                                        <cite>
                                            {{$comment[$i]->Commentd[$e]->nama}}
                                        </cite>

                                        <div class="comment__meta">
                                            <time class="comment__time">
                                                {{$comment[$i]->Commentd[$e]->created_at}}
                                            </time>
                                            <a class="reply bls" href="#formkomen" data-idid="{{ $comment[$i]->id }}" data-nama="{{ $comment[$i]->Commentd[$e]->nama }}">Reply</a>
                                        </div>
                                    </div>

                                    <div class="comment__text">
                                        <p>{{$comment[$i]->Commentd[$e]->isi}}</p>
                                    </div>
                                </div>

                            </li>
                        <?php endfor; ?>
                        </ul>

                    </li> <!-- end comment level 1 -->

                <?php endfor; ?>
                </ol> <!-- end commentlist -->


                <!-- respond
                ================================================== -->
                <div class="respond">

                    <h3 class="h2">Add Comment</h3>

                    <form id="formkomen" method="post" action="{{ url('/artikel/comment')}}">
                        <fieldset>
                            {{ csrf_field() }}
                            <div class="form-field">
                                    <input name="artikel_id" id="artikel_id" type="hidden" class="full-width" value="{{ $artikel->id }}">
                            </div>

                            <div class="form-field">
                                    <input name="id" type="hidden" id="id_commentm" class="full-width" value="">
                            </div>

                            <div class="form-field">
                                    <input name="nama" type="text" id="username" class="full-width" placeholder="Username" value="">
                            </div>

                            <div class="form-field">
                                    <input name="email" type="email" id="email" class="full-width" placeholder="Email" value="">
                            </div>

                            <div class="message form-field">
                                <textarea name="isi" id="isi" class="full-width" placeholder="Comment"></textarea>
                            </div>

                            <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>

                        </fieldset>
                    </form> <!-- end form -->

                </div> <!-- end respond -->

            </div> <!-- end col-full -->

        </div> <!-- end row comments -->
    </div> <!-- end comments-wrap -->

</section> <!-- s-content -->

@endsection