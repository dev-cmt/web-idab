
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url({{asset('public/frontend')}}/img/building-interior.jpg);">
                    <div class="carousel-container">
                        <div class="intro-wrapper">
                            <div>
                            <div class="intro-logo">
                                <img src="{{asset('public/frontend')}}/img/logo.png" alt="">
                            </div>
                            <div class="intro-cover">
                                <h1 class="intro-title">Content Revel on Page Scroll</h1>
                            </div>
                            <div class="intro-text">
                                <span class="animate__animated animate__fadeInUp"><h4>THE SOCIETY</h4></span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url({{asset('public/frontend')}}/img/slide/slide-1.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Grow Your Business</h2>
                            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui
                                aliquid. Sequi
                                ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut.
                                Similique ea
                                voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore
                                modi architecto.</p>
                            <div>
                                <a href="#about"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div id="particles-js"></div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section><!-- End Hero -->