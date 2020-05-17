<!-- s-extra
================================================== -->
<section class="s-extra">

    <div class="row top">

        <div class="col-eight md-six tab-full popular">
            <h3>Popular Post</h3>

            <div class="block-1-2 block-m-full popular__posts">
                <?php for ($i=0; $i < 6; $i++) :?>
                <article class="col-block popular__post">
                    <a href="{{ url('/artikel/'. $artlimit[$i]->id) }}" class="popular__thumb">
                        <img src="{{ asset('img/artikel/' . $artlimit[$i]->FotoBlog[0]->foto) }}" alt="">
                    </a>
                    <h5><a href="{{ url('/artikel/'. $artlimit[$i]->id) }}">{{ $artlimit[$i]->judul }}</a></h5>
                    <section class="popular__meta">
                        <span class="popular__date"><span>on</span> <time datetime="">{{ $artlimit[$i]->tanggal }}</time></span>
                    </section>
                </article>
                <?php endfor; ?>
            </div> <!-- end popular_posts -->
        </div> <!-- end popular -->
        
        <div class="col-four md-six tab-full about">
            <h3>About Untold Stories</h3>

            <p>
            Mengungkap cerita-cerita menarik serta sejarah yang jarang orang ketahui.
            Diawali dari masa lampau hingga kemajuan teknologi, dari hal-hal yang mungkin jarang kita perhatikan disekitar.
            </p>

            <ul class="about__social">
                <li>
                    <a href="https://www.facebook.com/matrix.kevin83"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/untold.stories13/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->
        </div> <!-- end about -->

    </div> <!-- end row -->

    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>Tags</h3>

            <div class="tagcloud">
                @foreach($tag as $t)
                    <a href="{{ url('/tag/'. $t->id) }}">{{ $t->nama_tag }}</a>
                @endforeach
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->

</section> <!-- end s-extra -->

  <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                    <h4>Quick Links</h4>

                    <ul class="s-footer__linklist">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#0">Blog</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="#0">Contact</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__archives">
                        
                    <h4>Arsip</h4>

                    <ul class="s-footer__linklist">
                        <li><a href="#0">January 2018</a></li>
                        <li><a href="#0">December 2017</a></li>
                        <li><a href="#0">November 2017</a></li>
                        <li><a href="#0">October 2017</a></li>
                        <li><a href="#0">September 2017</a></li>
                        <li><a href="#0">August 2017</a></li>
                    </ul>

                </div> <!-- end s-footer__archives -->

                <div class="col-two md-four mob-full s-footer__social">
                        
                    <h4>Media Sosial</h4>

                    <ul class="s-footer__linklist">
                        <li><a target="blank" href="https://www.facebook.com/matrix.kevin83">Facebook</a></li>
                        <li><a target="blank" href="https://www.instagram.com/untold.stories13/">Instagram</a></li>
                    </ul>

                </div> <!-- end s-footer__social -->

                <div class="col-five md-full end s-footer__subscribe">
                        
                    <h4>Suara Kami</h4>

                    <p>Saran Dan Masukkan.</p>

                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        <span>© Copyright UntoldStories 2020</span> 
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/comment.js') }}"></script>

</body>

</html>