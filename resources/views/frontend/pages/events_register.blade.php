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
    input:disabled{
        background-color: #090;
    }
    .form-label{
        margin: 8px 0px;
    }
    .border-dashed{
        border: 1px dashed #ff0000;
        border-radius: 0;
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
@include('frontend.layouts.partial.banner')
    <!-- Contact Start -->
    <div class="container py-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{route('registation-payment.store')}}" method="post" enctype="multipart/form-data" class="row"> 
            @csrf
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">                
                        <img class="img-fluid w-100 rounded" src="{{asset('public')}}/images/events/{{ $data->image}}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">{{$data->title}}</h4>
                        <p class="description_4">{{$data->description}}</p>
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
                        <input type="number" id="self_no" name="self" class="form-control border-dashed" value="1"  placeholder="Person of number" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="self_fee" value="{{$data->self}}">
                        <input type="number" id="self_total" class="form-control border-dashed bg-light" value="{{ $data->self }}" style="height: 40px;" disabled>
                    </div>
                </div>
                <div class="row my-2" id="dvSpouse" style="display: none">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Spouse</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" id="spouse_no" name="spouse" class="form-control border-dashed" value="0"  placeholder="Person of number" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="spouse_fee" value="{{$data->spouse}}">
                        <input type="number" id="spouse_total" class="form-control border-dashed bg-light" value="0.00" style="height: 40px;">
                    </div>
                </div>
                <div class="row my-2" id="dvChild" style="display: none">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Child (Above 12 Year)</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" id="childAbove_no" name="child_above" class="form-control border-dashed" value="0" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="childAbove_fee" value="{{$data->child_above}}">
                        <input type="number" id="childAbove_total" class="form-control border-dashed bg-light" value="0.00" style="height: 40px;">
                    </div>
                    <div class="col-md-5 mt-2">
                        <label class="form-label">Child (Bellow 12 Year)</label>
                    </div>
                    <div class="col-md-3 mt-2">
                        <input type="number" id="childBellow_no" name="child_bellow" class="form-control border-dashed" value="0" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mt-2">
                        <input type="hidden" id="childBellow_fee" value="{{$data->child_bellow}}">
                        <input type="number" id="childBellow_total" class="form-control border-dashed bg-light" value="0.00" style="height: 40px;">
                    </div>
                </div>
                <div class="row my-2" id="dvGuest" style="display: none">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Guest</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" id="guest_no" name="guest" class="form-control border-dashed" value="0" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="guest_fee" value="{{$data->guest}}">
                        <input type="number" id="guest_total" class="form-control border-dashed bg-light" value="0.00" style="height: 40px;" disabled>
                    </div>
                </div>
                <div class="row my-2" id="dvDriver" style="display: none">
                    <div class="col-md-5 mb-1">
                        <label class="form-label">Driver</label>
                    </div>
                    <div class="col-md-3 mb-1">
                        <input type="number" id="driver_no" name="driver" class="form-control border-dashed" value="0" style="height: 40px;">
                    </div>
                    <div class="col-md-4 mb-1">
                        <input type="hidden" id="driver_fee" value="{{$data->driver}}">
                        <input type="number" id="driver_total" class="form-control border-dashed bg-light" value="0.00" style="height: 40px;" disabled>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-5 mb-1 bg-light">
                        <label class="text-default fw-bold pt-2">Total</label>
                    </div>
                    <div class="col-md-3 mb-1 bg-light">
                        <input type="hidden" name="total_person" id="total_person" value="1">
                        <input type="number" id="PER_TOTAL" class="form-control text-default fw-bold border-0 bg-light" value="1" disabled>
                    </div>
                    <div class="col-md-4 mb-1 bg-light">
                        <input type="hidden" name="amount" id="total_amount" value="{{old('self') ?? $data->self}}">
                        <input type="number" id="TOTALS" class="form-control text-default fw-bold border-0 bg-light" value="{{$data->self}}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <input type="hidden" name="payment_reason_id" value="2">
                <input type="hidden" name="ref_reason_id" value="{{$data->id}}">
                <div class="row g-3">
                    <div class="d-flex justify-content-center pb-2" style="border-bottom: 1px dashed #ff0000;">
                        <div >
                            <input type="radio" name="payment_method_id" id="bKash" class="input-hidden" value="1"/>
                            <label for="bKash"><img src="{{asset('public/images')}}/payment/bKash.png" alt="Payment bKash" /></label>
                        
                            {{-- <input type="radio" name="payment_method_id" id="roket" class="input-hidden" value="2"/>
                            <label for="roket"><img src="{{asset('public/images')}}/payment/roket.png" alt="Payment roket" /></label>
                        
                            <input type="radio" name="payment_method_id" id="nagad" class="input-hidden" value="3"/>
                            <label for="nagad"><img src="{{asset('public/images')}}/payment/nagad.png" alt="Payment nagad" /></label> --}}
                            
                            <input type="radio" name="payment_method_id" id="city-bank" class="input-hidden" value="2"/>
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
                            <select name="payment_number" id="payment_number" class="form-control form-select @error('payment_number') is-invalid @enderror" style="height: 40px;">
                                <option selected disabled>Choose Payment Method</option>
                            </select>
                            @error('payment_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mt-2" id="slip" style="display: none">
                            <label class="form-label">Bank Slip</label>
                            <input type="file" id="slip" name="slip" class="form-control @error('slip') is-invalid @enderror" value="{{old('slip')}}" accept=".pdf,.jpeg,.jpg,.png,.gif,.doc,.docx">
                            @error('slip')
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
                            <button type="submit" class="btn btn-success border-0 px-4">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        
        </form>
    </div>
@endsection
@section('script')
    <script>
        //======Show & Get Number
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
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
                    // payment_number_dr.append('<option disabled selected>--Select--</option>');
                    if(datas.length > 0){
                        $.each(datas, function(index, option) {
                            payment_number_dr.append('<option value="' + option.number + '">' + option.number + '</option>');
                        });
                    }else{
                        payment_number_dr.append('<option disabled selected>Not available</option>');
                    }
                },
                error: function() {
                    alert('Sorry try agian...');
                }
            });
            if(methodId == 2){
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
        //======Total Calculation
        $(document).ready(function() {
            $("#chkSpouse").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvSpouse").show();
                } else {
                    $("#dvSpouse").hide();
                    $("#spouse_no").val(0);
                    $('#spouse_total').val(0);
                }
                calculateTotals();
            });
            $("#chkChild").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvChild").show();
                } else {
                    $("#dvChild").hide();
                    $("#childAbove_no").val(0);
                    $("#childBellow_no").val(0);
                }
                calculateTotals();
            });
            $("#chkGuest").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvGuest").show();
                } else {
                    $("#dvGuest").hide();
                    $("#guest_no").val(0);
                }
                calculateTotals();
            });
            $("#chkDriver").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvDriver").show();
                } else {
                    $("#dvDriver").hide();
                    $("#driver_no").val(0);
                }
                calculateTotals();
            });

            $('input[id^="self_"], input[id^="spouse_"], input[id^="childAbove_"], input[id^="childBellow_"], input[id^="guest_"], input[id^="driver_"]').on('input', function() {
                calculateTotals();
            });

            function calculateTotals() {
                // Convert input values to numbers
                var self_no = Number($('#self_no').val());
                var spouse_no = Number($('#spouse_no').val());
                var childAbove_no = Number($('#childAbove_no').val());
                var childBellow_no = Number($('#childBellow_no').val());
                var guest_no = Number($('#guest_no').val());
                var driver_no = Number($('#driver_no').val());

                // Calculate individual totals
                var self_total = self_no * Number($('#self_fee').val());
                var spouse_total = spouse_no * Number($('#spouse_fee').val());
                var childAbove_total = childAbove_no * Number($('#childAbove_fee').val());
                var childBellow_total = childBellow_no * Number($('#childBellow_fee').val());
                var guest_total = guest_no * Number($('#guest_fee').val());
                var driver_total = driver_no * Number($('#driver_fee').val());

                // Calculate overall totals
                var PER_TOTAL = self_no + spouse_no + childAbove_no + childBellow_no + guest_no + driver_no;
                var TOTAL = self_total + spouse_total + childAbove_total + childBellow_total + guest_total + driver_total;

                // Update output fields
                $('#self_total').val(self_total);
                $('#spouse_total').val(spouse_total);
                $('#childAbove_total').val(childAbove_total);
                $('#childBellow_total').val(childBellow_total);
                $('#guest_total').val(guest_total);
                $('#driver_total').val(driver_total);
                $('#PER_TOTAL').val(PER_TOTAL);
                $('#TOTALS').val(TOTAL);
                $('#total_person').val(PER_TOTAL);
                $('#total_amount').val(TOTAL);
            }
        });
    </script>
@endsection
