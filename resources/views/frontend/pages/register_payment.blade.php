@extends('frontend.layouts.app')
@section('title', 'Membership Payment')
@section('style')
    <style>
        .input-hidden {
            position: absolute;
            left: -9999px;
        }
        input[type=radio]:checked + label>img {
            border: 1px solid #fff;
            box-shadow: 0 0 3px 3px #ff0000;
        }
        input[type=radio] + label>img {
            border: 1px dashed #444;
            width: 95px;
            height: 95px;
            transition: 500ms all;
            margin-bottom: 10px;
        }
        input[type=radio]:checked + label>img {
            transform: scale(0.8);
        }
        .box{
            display: none;
        }
    </style>
@endsection
@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="card" style="border-radius: 0">
                        <div class="card-header pt-4">
                            <h4 class="card-title">Memeber Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="bootstrap-media">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 text-center">
                                        <img class="img-fluid rounded" width="120" src="{{asset('public')}}/images/profile/{{ Auth::user()->profile_photo_path }}" alt="DexignZone">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{Auth::user()->name}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Member Type <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{Auth::user()->memberType->name}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Location <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{Auth::user()->infoPersonal->parmanent_address}}</span></div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Joining Date <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{date("j F, Y", strtotime(Auth::user()->created_at))}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 form">
                    @if (session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif
                    <form action="{{route('registation-payment.store')}}" method="post" enctype="multipart/form-data" class="php-email-form"> 
                        @csrf
                        <div class="row g-3">
                            <div class="d-flex justify-content-center" style="border-bottom: 1px dashed #ff0000;">
                                <div>
                                    <input type="radio" name="payment_method_id" id="cash" class="input-hidden" value="0"/>
                                    <label for="cash"><img src="{{asset('public/images')}}/cash.png" alt="Payment Chash" style="transform: scale(1);"/></label>
                                
                                    <input type="radio" name="payment_method_id" id="bKash" class="input-hidden" value="1"/>
                                    <label for="bKash"><img src="{{asset('public/images')}}/bKash.png" alt="Payment bKash" /></label>
                                
                                    <input type="radio" name="payment_method_id" id="nagad" class="input-hidden" value="2"/>
                                    <label for="nagad"><img src="{{asset('public/images')}}/nagad.png" alt="Payment nagad" /></label>
                                
                                    <input type="radio" name="payment_method_id" id="roket" class="input-hidden" value="3"/>
                                    <label for="roket"><img src="{{asset('public/images')}}/roket.png" alt="Payment roket" /></label>
                                    
                                    @error('payment_method_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 mt-2">
                                    <label class="form-label">Payment Number</label>
                                    <div class="0 box" style="display: block">
                                        <input type="text" class="form-control @error('payment_number') is-invalid @enderror" name="payment_number" value="{{old('payment_number')}}" placeholder="Cash Payment" @disabled(true)>
                                    </div>
                                    <div class="1 2 3 box">
                                        <select name="payment_number" class="form-control form-select  @error('payment_number') is-invalid @enderror" style="height: 40px;">
                                            <option value="01909302126" class="1 box">01909302126</option>
                                            <option value="01922437143" class="1 box">01922437143</option>
                                            <option value="01995275933" class="1 box">01995275933</option>
                                            <option value="01922437143" class="2 box">01922437143</option>
                                            <option value="01995275933" class="2 box">01995275933</option>
                                            <option value="01922437143" class="3 box">01922437143</option>
                                            <option value="01995275933" class="3 box">01995275933</option>
                                            {{-- @foreach ($bkash as $row)
                                                <option value="{{$row->pay_number}}" class="1 box">{{$row->pay_number}}</option>
                                            @endforeach
                                            @foreach ($nagad as $row)
                                                <option value="{{$row->pay_number}}" class="2 box">{{$row->pay_number}}</option>
                                            @endforeach
                                            @foreach ($rocket as $row)
                                                <option value="{{$row->pay_number}}" class="2 box">{{$row->pay_number}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label class="form-label">Transaction Number</label>
                                    <input type="text" name="transaction_number" class="form-control" value="{{old('transaction_number')}}" placeholder="xxxxxxxxxxxx">
                                    @error('transaction_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label class="form-label">Transfer Number</label>
                                    <input type="text" name="transfer_number" class="form-control" placeholder="01X-XXXX-XXXX" value="{{old('transfer_number') }}">
                                    @error('transfer_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label class="form-label">Amount</label>
                                    <input type="text" id="amount" class="form-control" value="{{auth::user()->memberType->registration_fee}}" disabled>
                                    <input type="hidden" name="amount" value="{{auth::user()->memberType->registration_fee}}">
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control py-3 @error('message') is-invalid @enderror" name="message" value="{{old('message')}}" rows="2" placeholder="Enter your message here..."></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 mt-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
        function multiply() {
            let monthNo = parseFloat(document.getElementById('month_no').value);
            let baseAmount = parseFloat(document.getElementById('duo_amount').value);
            let total = monthNo * baseAmount;
            document.getElementById('TOTAL').value = total.toFixed(2);
        }
    </script>
@endsection