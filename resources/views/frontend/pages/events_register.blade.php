@extends('frontend.layouts.app')
@section('style')
<style>
    .input-hidden {
        position: absolute;
        left: -9999px;
    }

    input[type=radio]:checked + label>img {
        border: 1px solid #fff;
        box-shadow: 0 0 3px 3px #090;
    }

    /* Stuff after this is only to make things more pretty */
    input[type=radio] + label>img {
        border: 1px dashed #444;
        width: 130px;
        height: 130px;
        transition: 500ms all;
        margin-bottom: 3px
    }

    input[type=radio]:checked + label>img {
        /* transform: rotateZ(-45deg) rotateX(10deg); */
        transform: scale(0.8);
    }

    .box{
        /* color: #34AD54; */
        display: none;
        /* padding: 5px 0px; */
        /* border-top: 1px dashed #34AD54; */
        /* border-bottom: 1px dashed #34AD54; */
    }
    input[type=number] { text-align:right }
</style>
@endsection
@section('content')
    <!-- Contact Start -->
    <div class="container py-5">
        @if (session()->has('success'))
            <strong class="text-success">{{session()->get('success')}}</strong>
        @endif
        <form action="{{route('registation-payment.store')}}" method="post" enctype="multipart/form-data" class="php-email-form row"> 
            @csrf
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">                
                        <img class="img-fluid w-100 rounded" src="{{asset('public')}}/images/events/{{ $data->image}}" alt="">
                    </div>
                    <div class="col-md-7">

                    </div>
                </div>
                <!--__________________ FAMILY INFO.  __________________-->
                <div class="row my-2 py-2" style="border: 1px dashed #ff0000;">
                    <div class="col-lg-3">
                        <label for="chkSpouse">
                            <input type="checkbox" id="chkSpouse"/> Spouse
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label for="chkChild">
                            <input type="checkbox" id="chkChild"/> Child
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label for="chkGuest">
                            <input type="checkbox" id="chkGuest"/> Guest
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <label for="chkDriver">
                            <input type="checkbox" id="chkDriver"/> Driver
                        </label>
                    </div>
                </div>
                <!--__________________ FAMILY DETAILS __________________-->
                <div class="row my-2">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Self</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" id="self_no" onKeyUp="multiply()" class="form-control border-0 bg-light px-4" value="1"  placeholder="Person of number" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="self_fee" value="{{$data->self}}">
                        <input type="number" id="self_total" class="form-control border-0 bg-light px-4" value="{{ $data->self }}" style="height: 40px;" disabled>
                    </div>
                </div>
                <div class="row my-2" id="dvSpouse" style="display: none">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Spouse</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" id="spouse_no" onKeyUp="multiply()" class="form-control border-0 bg-light px-4" value="0"  placeholder="Person of number" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="spouse_fee" value="{{$data->spouse}}">
                        <input type="number" id="spouse_total" class="form-control border-0 bg-light px-4" value="0.00" style="height: 40px;">
                    </div>
                </div>
                <div class="row my-2" id="dvChild" style="display: none">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Child (Above 12 Year)</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" onKeyUp="multiply()" id="childAbove_no" class="form-control border-0 bg-light px-4" value="0" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="childAbove_fee" value="{{$data->child_above}}">
                        <input type="number" id="childAbove_total" class="form-control border-0 bg-light px-4" value="0.00" style="height: 40px;">
                    </div>
                    <div class="col-md-5 mt-2">
                        <label class="form-label">Child (Bellow 12 Year)</label>
                    </div>
                    <div class="col-md-3 mt-2">
                        <input type="number" onKeyUp="multiply()" id="childBellow_no" class="form-control border-0 bg-light px-4" value="0" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mt-2">
                        <input type="hidden" id="childBellow_fee" value="{{$data->child_bellow}}">
                        <input type="number" id="childBellow_total" class="form-control border-0 bg-light px-4" value="0.00" style="height: 40px;">
                    </div>
                </div>
                <div class="row my-2" id="dvGuest" style="display: none">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Guest</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" onKeyUp="multiply()" id="guest_no" class="form-control border-0 bg-light px-4" value="0" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="guest_fee" value="{{$data->guest}}">
                        <input type="number" id="guest_total" class="form-control border-0 bg-light px-4" value="0.00" style="height: 40px;" disabled>
                    </div>
                </div>
                <div class="row my-2" id="dvDriver" style="display: none">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Driver</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" onKeyUp="multiply()" id="driver_no" class="form-control border-0 bg-light px-4" value="0" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="driver_fee" value="{{$data->driver}}">
                        <input type="number" id="driver_total" class="form-control border-0 bg-light px-4" value="0.00" style="height: 40px;" disabled>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-5 mb-1 bg-light">
                        <label style="padding:6px 0px" class="text-primary">Total</label>
                    </div>
                    <div class="col-md-3 mb-1 bg-light">
                        <input type="hidden" name="person_no" id="person_no" value="1">
                        <input type="number" class="form-control border-0 bg-light px-4" id="PER_TOTAL" value="1" disabled>
                    </div>
                    <div class="col-md-4 mb-1 bg-light">
                        <input type="hidden" name="total_amount" id="total_amount" value="{{old('self') ?? $data->self}}">
                        <input type="number" id="TOTALS" class="form-control border-0 bg-light px-4" value="{{$data->self}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <input type="hidden" name="payment_reason_id" value="1">
                <input type="hidden" name="ref_reason_id">
                <div class="row g-3">
                    <div class="d-flex justify-content-center pb-2" style="border-bottom: 1px dashed #ff0000;">
                        <div >
                            <input type="radio" name="payment_method_id" id="bKash" class="input-hidden" value="1"/>
                            <label for="bKash"><img src="{{asset('public/images')}}/payment/bKash.png" alt="Payment bKash" /></label>
                        
                            <input type="radio" name="payment_method_id" id="roket" class="input-hidden" value="2"/>
                            <label for="roket"><img src="{{asset('public/images')}}/payment/roket.png" alt="Payment roket" /></label>
                        
                            <input type="radio" name="payment_method_id" id="nagad" class="input-hidden" value="3"/>
                            <label for="nagad"><img src="{{asset('public/images')}}/payment/nagad.png" alt="Payment nagad" /></label>
                            
                            <input type="radio" name="payment_method_id" id="city-bank" class="input-hidden" value="5"/>
                            <label for="city-bank"><img src="{{asset('public/images')}}/payment/city-bank.jpg" alt="Payment upay"/></label>

                            @error('payment_method_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <!--____________________// TRANSACTION //______________________-->
                    <div class="row mt-2">
                        <div class="col-md-12 mt-2">
                            <label class="form-label" id="labelChange">Payment Number 
                                <span class="text-danger">*</span>
                            </label>
                            <select name="payment_number" id="payment_number" class="form-control form-select  @error('payment_number') is-invalid @enderror" style="height: 40px;">
                                <option selected disabled>Not Found</option>
                            </select>
                            @error('payment_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-2" id="slip" style="display: none">
                            <label class="form-label">Bank Slip</label>
                            <input type="file" id="slip" name="slip" class="form-control" value="{{old('slip')}}">
                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2" id="transactionNumber">
                            <label class="form-label">Transaction Number
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="transaction_number" class="form-control @error('transaction_number') is-invalid @enderror" value="{{old('transaction_number')}}" placeholder="XXXXXXXXX">
                            @error('transaction_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-2" id="transferNumber">
                            <label class="form-label">Transfer Number
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="transfer_number" class="form-control @error('transfer_number') is-invalid @enderror" placeholder="01X-XXXX-XXXX" value="{{old('transfer_number') }}">
                            @error('transfer_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="form-label">Message</label>
                            <textarea class="form-control py-3" name="message" value="{{old('message')}}" rows="2" placeholder="Enter your message here..."></textarea>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center mt-2">
                            <button type="submit" class="btn btn-success px-4">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script>
@endsection
@section('script')
    <script>
        //======Get Payment Number Data
        $(document).on('click', 'input[type="radio"]', function() {
            var methodId = $(this).attr("value");
            $.ajax({
                url: '{{ route('get-payment-number')}}', // Make sure the route is correct
                method: 'GET',
                dataType: "json",
                data: {'method_id': methodId},
                success: function(response) {
                    //--Get Customer Type Data
                    var datas = response.data;
                    var payment_number_dr = $('#payment_number');
                    payment_number_dr.empty();
                    payment_number_dr.append('<option disabled selected>--Select--</option>');
                    $.each(datas, function(index, option) {
                        payment_number_dr.append('<option value="' + option.number + '">' + option.number + '</option>');
                    });
                },
                error: function() {
                    alert('Fail');
                }
            });
            if(methodId == 5){
                $('#transferNumber').hide();
                $('#transactionNumber').hide();
                $('#labelChange').html('Bank-Number');
                $('#slip').show();
            }else{
                $('#transferNumber').show();
                $('#transactionNumber').show();
                $('#labelChange').html('Payment Number');
                $('#slip').hide();
            }
        });
        //======Family Member Select
        $(document).ready(function() {
            $("#chkSpouse").click(function () {
                alert('hi');
                if ($(this).is(":checked")) {
                    $("#dvSpouse").show();
                } else {
                    $("#dvSpouse").hide();
                }
            });
            $("#chkChild").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvChild").show();
                } else {
                    $("#dvChild").hide();
                }
            });
            $("#chkGuest").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvGuest").show();
                } else {
                    $("#dvGuest").hide();
                }
            });
            $("#chkDriver").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvDriver").show();
                } else {
                    $("#dvDriver").hide();
                }
            });
        });
        //======Total Calculation
        $(document).ready(function() {
            $('input[id^="self_"]').on('input', function() {
                var self_no = Number($('#self_no').val());
                var self_fee = Number($('#self_fee').val());
                var self_total = self_no * self_fee;
                $('#self_total').val(self_total);
                calculateTotals();
            });

            $('input[id^="spouse_"]').on('input', function() {
                var spouse_no = Number($('#spouse_no').val());
                var spouse_fee = Number($('#spouse_fee').val());
                var spouse_total = spouse_no * spouse_fee;
                $('#spouse_total').val(spouse_total);
                calculateTotals();
            });

            $('input[id^="childAbove_"]').on('input', function() {
                var childAbove_no = Number($('#childAbove_no').val());
                var childAbove_fee = Number($('#childAbove_fee').val());
                var childAbove_total = childAbove_no * childAbove_fee;
                $('#childAbove_total').val(childAbove_total);
                calculateTotals();
            });

            $('input[id^="childBellow_"]').on('input', function() {
                var childBellow_no = Number($('#childBellow_no').val());
                var childBellow_fee = Number($('#childBellow_fee').val());
                var childBellow_total = childBellow_no * childBellow_fee;
                $('#childBellow_total').val(childBellow_total);
                calculateTotals();
            });

            $('input[id^="guest_"]').on('input', function() {
                var guest_no = Number($('#guest_no').val());
                var guest_fee = Number($('#guest_fee').val());
                var guest_total = guest_no * guest_fee;
                $('#guest_total').val(guest_total);
                calculateTotals();
            });

            $('input[id^="driver_"]').on('input', function() {
                var driver_no = Number($('#driver_no').val());
                var driver_fee = Number($('#driver_fee').val());
                var driver_total = driver_no * driver_fee;
                $('#driver_total').val(driver_total);
                calculateTotals();
            });

            function calculateTotals() {
                var self_no = Number($('#self_no').val());
                var spouse_no = Number($('#spouse_no').val());
                var childAbove_no = Number($('#childAbove_no').val());
                var childBellow_no = Number($('#childBellow_no').val());
                var guest_no = Number($('#guest_no').val());
                var driver_no = Number($('#driver_no').val());

                var self_total = self_no * Number($('#self_fee').val());
                var spouse_total = spouse_no * Number($('#spouse_fee').val());
                var childAbove_total = childAbove_no * Number($('#childAbove_fee').val());
                var childBellow_total = childBellow_no * Number($('#childBellow_fee').val());
                var guest_total = guest_no * Number($('#guest_fee').val());
                var driver_total = driver_no * Number($('#driver_fee').val());

                var PER_TOTAL = self_no + spouse_no + childAbove_no + childBellow_no + guest_no + driver_no;
                var TOTAL = self_total + spouse_total + childAbove_total + childBellow_total + guest_total + driver_total;

                $('#self_total').val(self_total);
                $('#spouse_total').val(spouse_total);
                $('#childAbove_total').val(childAbove_total);
                $('#childBellow_total').val(childBellow_total);
                $('#guest_total').val(guest_total);
                $('#driver_total').val(driver_total);
                $('#PER_TOTAL').val(PER_TOTAL);
                $('#TOTALS').val(TOTAL);
                $('#person_no').val(PER_TOTAL);
                $('#total_amount').val(TOTAL);
            }
        });
    </script>
@endsection
