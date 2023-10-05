@extends('frontend.layouts.app')
@section('title', 'Why Be Member')
@section('content')
@include('frontend.layouts.partial.banner')
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="section-title">
                <h2 class="reveal">Why Be A Member?</h2>
                <!--<p>IDAB a complete association of people who are passionate about Interior Design in Bangladesh.</p>-->
            </div>

            <div class="row">

                <div class="col-lg-3">
                    <div class="box" style="height:460px">
                        <span><i class="bi bi-info-circle-fill"></i></span>
                        <!--<h4>The Association</h4>-->
                        <p>When you join the association, you become a part of a national and international network of Interior designers.</p>
                    </div>
                </div>

                <div class="col-lg-3 mt-4 mt-lg-0">
                    <div class="box" style="height:460px">
                        <span><i class="bi bi-bar-chart-fill"></i></span>
                        <p>We are more than an association. IDAB vision and mission must remind to contribute selflessly to interior design industries and designers in Bangladesh. IDAB always believe on first track skilled and knowledge on Interior design.</p>
                    </div>
                </div>

                <div class="col-lg-3 mt-4 mt-lg-0">
                    <div class="box" style="height:460px">
                        <span><i class="bi bi-cash-coin"></i></span>
                        <p>As a non-profit association governed by law, we do believe on standard of professionalism of Interior designers, but to be able to resolve industries issues. It has solemn duty to promote the creativity and professionalism in Bangladesh interior design in the world.</p>
                    </div>
                </div>
                
                <div class="col-lg-3 mt-4 mt-lg-0">
                    <div class="box" style="height:460px">
                        <span><i class="bi bi-person-bounding-box"></i></span>
                        <p>Our all members and committee are made up of Interior Design (ID) professional and academic who are working selflessly to give of their time, share their work experience with all of us and it makes our ID industry more professional.</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Why Us Section -->
    

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your message was sent successfully.',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route("/") }}';
                }
            });
        </script>
    @endif
@endsection