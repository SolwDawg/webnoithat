<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="{{ url('/')  }}"><img src="{{ asset('assets/img/banner/Logo_removebg.png') }}" alt="" width="80px"></a>
                    </div>
                    <p>{{ $appSetting->meta_description }}</p>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="{{ url('/collections') }}">Shop</a></li>
                        <li><a href="{{ url('/new-arrivals') }}">New Arrivals</a></li>
                        <li><a href="{{ url('/trending') }}">Trending</a></li>
                        <li><a href="{{ url('/featured') }}">Featured</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Payment Methods</a></li>
                        <li><a href="#">Delivary</a></li>
                        <li><a href="#">Return & Exchanges</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>NewLetter</h6>
                    <div class="footer__newslatter">
                        <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                        <form action="#">
                            <input type="text" placeholder="Your email">
                            <button type="submit"><span class="icon_mail_alt"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4 text-center">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #3b5998;"
                   href="{{ $appSetting->facebook ?? '' }}"
                   role="button">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>

                <!-- Twitter -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #55acee;"
                   href="{{ $appSetting->twitter ?? '' }}"
                   role="button">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>

                <!-- Google -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #dd4b39;"
                   href="{{ $appSetting->youtube ?? '' }}"
                   role="button">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>

                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #ac2bac;"
                   href="{{ $appSetting->instagram ?? '' }}"
                   role="button">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
            </section>
            <!-- Section: Social media -->
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p>Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- Footer Section End -->
