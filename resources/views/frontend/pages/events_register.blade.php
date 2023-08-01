@extends('frontend.layouts.app')
@section('content')
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

<script>
    $(function () {
        $("#chkSpouse").click(function () {
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
</script>

    <!-- Contact Start -->
    <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row g-5">
            <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                <img class="img-fluid w-100 rounded mb-5" src="{{asset('public')}}/images/events/{{ $data->image}}" alt="">
            </div>
            
            <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                @if (session()->has('success'))
                    <strong class="text-success">{{session()->get('success')}}</strong>
                @endif
                <form action="{{route('events_register.store', $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="radio" name="payment_type" id="cash" class="input-hidden" value="0"/>
                            <label for="cash"><img src="{{asset('public')}}/images/cash.png" alt="Payment Chash" style="transform: scale(1);"/></label>
                        
                            <input type="radio" name="payment_type" id="bKash" class="input-hidden" value="1"/>
                            <label for="bKash"><img src="{{asset('public')}}/images/bKash.png" alt="Payment bKash" /></label>
                        
                            <input type="radio" name="payment_type" id="nagad" class="input-hidden" value="2"/>
                            <label for="nagad"><img src="{{asset('public')}}/images/nagad.png" alt="Payment nagad" /></label>
                        
                            <input type="radio" name="payment_type" id="roket" class="input-hidden" value="3"/>
                            <label for="roket"><img src="{{asset('public')}}/images/roket.png" alt="Payment roket" /></label>
                            
                            @error('payment_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="row my-2 py-2" style="border-bottom: 1px dashed #34AD54;">
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
                        <div class="row my-2">
                            <div class="col-md-5 mb-1">
                                <label class="form-label">Self</label>
                            </div>
                            <div class="col-md-3 mb-1">
                                <input type="number" id="self_no" onKeyUp="multiply()" class="form-control border-0 bg-light px-4" value="1"  placeholder="Person of number" style="height: 40px;" disabled>
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


                        <div class="col-md-6">
                            <label class="form-label">Payment Number</label>
                            <div class="0 box" style="display: block">
                                <input type="text" class="form-control border-0 bg-light px-4 @error('payment_number') is-invalid @enderror" name="payment_number" value="{{old('payment_number')}}" placeholder="Cash Payment" style="height: 40px;" @disabled(true)>
                            </div>
                        <div class="1 2 3 box">
                            <select class="form-select bg-light border-0  @error('payment_number') is-invalid @enderror" name="payment_number" style="height: 40px;">
                                @foreach ($bkash as $row)
                                    <option value="{{$row->pay_number}}" class="1 box">{{$row->pay_number}}</option>
                                @endforeach
                                @foreach ($nagad as $row)
                                    <option value="{{$row->pay_number}}" class="2 box">{{$row->pay_number}}</option>
                                @endforeach
                                @foreach ($rocket as $row)
                                    <option value="{{$row->pay_number}}" class="2 box">{{$row->pay_number}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Transaction Number</label>
                            <input type="text" class="form-control border-0 bg-light px-4 @error('transaction_no') is-invalid @enderror" name="transaction_no" value="{{old('transaction_no')}}" placeholder="Transaction Number" style="height: 40px;">
                            @error('transaction_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<script>
    
    function multiply(){
        //----------------self
        self_no = Number(document.getElementById('self_no').value);
        self_fee = Number(document.getElementById('self_fee').value);
        self_total =self_no * self_fee;

        document.getElementById('self_total').value = self_total;

        //----------------spouse
        spouse_no = Number(document.getElementById('spouse_no').value);
        spouse_fee = Number(document.getElementById('spouse_fee').value);
        spouse_total =spouse_no * spouse_fee;

        document.getElementById('spouse_total').value = spouse_total;

        //-----------------childAbove
        childAbove_no = Number(document.getElementById('childAbove_no').value);
        childAbove_fee = Number(document.getElementById('childAbove_fee').value);
        childAbove_total =childAbove_no * childAbove_fee;

        document.getElementById('childAbove_total').value = childAbove_total;

        //-------------------childBellow
        childBellow_no = Number(document.getElementById('childBellow_no').value);
        childBellow_fee = Number(document.getElementById('childBellow_fee').value);
        childBellow_total =childBellow_no * childBellow_fee;

        document.getElementById('childBellow_total').value = childBellow_total;

        //--------------------guest
        guest_no = Number(document.getElementById('guest_no').value);
        guest_fee = Number(document.getElementById('guest_fee').value);
        guest_total =guest_no * guest_fee;

        document.getElementById('guest_total').value = guest_total;


        //--------------------driver
        driver_no = Number(document.getElementById('driver_no').value);
        driver_fee = Number(document.getElementById('driver_fee').value);
        driver_total =driver_no * driver_fee;

        document.getElementById('driver_total').value = driver_total;


        PER_TOTAL = self_no + spouse_no +childAbove_no + childBellow_no +guest_no +driver_no;
        TOTAL = self_total + spouse_total +childAbove_total + childBellow_total +guest_total +driver_total;
        
        document.getElementById('PER_TOTAL').value = PER_TOTAL;
        document.getElementById('TOTALS').value = TOTAL;

        document.getElementById('person_no').value = PER_TOTAL;
        document.getElementById('total_amount').value = TOTAL;
    }
</script>