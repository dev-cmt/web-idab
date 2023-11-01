
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                {{-- <div class="carousel-item active" style="background-image: url({{asset('public/images')}}/slide/bg-interior.jpg);"> --}}
                <div class="carousel-item active" style="background-color: #f2f2f2">
                    <div class="carousel-container">
                        <div class="intro-wrapper">
                            <div class="intro-logo">
                                <img src="{{asset('public/images')}}/logo.png" alt="">
                            </div>
                            
                            <div class="carousel-content">
                                <h4 id="hero-title" class="animate__animated animate__fadeInDown">Interior Designers Association Of Bangladesh</h4>
                                <h4 class="animated-text">Hallo, Wij zijn Codefield!</h4>
                                <style>
                                    .animated-text {
                                        font-size: 32px;
                                        color: #bd0000;
                                        text-transform: uppercase;
                                    }

                                    .animated-text span {
                                        border-right: .05em solid;
                                        animation: caret 1s steps(1) infinite;
                                    }

                                    @keyframes caret {
                                        50% {
                                            border-color: transparent;
                                        }
                                    }
                                </style>

                                <script>
                                    document.addEventListener('DOMContentLoaded',function(event){
                                    // array with texts to type in typewriter
                                    var dataText = [ "Utrecht.", "Full Service.", "Webdevelopment.", "Wij zijn Codefield!"];
                                    
                                    // type one text in the typwriter
                                    // keeps calling itself until the text is finished
                                    function typeWriter(text, i, fnCallback) {
                                        // chekc if text isn't finished yet
                                        if (i < (text.length)) {
                                        // add next character to h1
                                        document.querySelector(".animated-text").innerHTML = text.substring(0, i+1) +'<span aria-hidden="true"></span>';

                                        // wait for a while and call this function again for next character
                                        setTimeout(function() {
                                            typeWriter(text, i + 1, fnCallback)
                                        }, 100);
                                        }
                                        // text finished, call callback if there is a callback function
                                        else if (typeof fnCallback == 'function') {
                                        // call callback after timeout
                                        setTimeout(fnCallback, 700);
                                        }
                                    }
                                    // start a typewriter animation for a text in the dataText array
                                    function StartTextAnimation(i) {
                                        if (typeof dataText[i] == 'undefined'){
                                            setTimeout(function() {
                                            StartTextAnimation(0);
                                            }, 20000);
                                        }
                                        // check if dataText[i] exists
                                        if (i < dataText[i].length) {
                                        // text exists! start typewriter animation
                                        typeWriter(dataText[i], 0, function(){
                                        // after callback (and whole text has been animated), start next text
                                        StartTextAnimation(i + 1);
                                        });
                                        }
                                    }
                                    // start the text animation
                                    StartTextAnimation(0);
                                    });
                                </script>
                            </div>
                            <!--<div class="intro-cover">
                                <h1 class="intro-title">Interior Designers Association Of Bangladesh</h1>
                            </div>
                            <div class="intro-text">
                                <span class="animate__animated animate__fadeInUp"><h4>THE ASSOCIATION</h4></span>
                            </div>-->
                        </div>
                    </div>
                </div>
                <!-- Slide 1 -->
                {{-- <div class="carousel-item active" style="background-image: url({{asset('public/images')}}/slide/bg-interior.jpg);">
                    <div class="carousel-container">
                        <div class="intro-wrapper">
                            <div class="intro-logo">
                                <img src="{{asset('public/images')}}/logo.png" alt="">
                            </div>
                            <div class="intro-cover">
                                <h1 class="intro-title">Interior Designers Association Of Bangladesh</h1>
                            </div>
                            <div class="intro-text">
                                <span class="animate__animated animate__fadeInUp"><h4>THE ASSOCIATION</h4></span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Slide 2 -->
                {{-- <div class="carousel-item" style="background-image: url({{asset('public/images')}}/slide/slide-2.jpg);">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">Grow Your Business</h2>
                            <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid quialiquid. Sequiea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique eamodi architecto.</p>
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