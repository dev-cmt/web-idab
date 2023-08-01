<x-app-layout>
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
            width: 95px;
            height: 95px;
            transition: 500ms all;
            margin-bottom: 10px;
        }
    
        input[type=radio]:checked + label>img {
            /* transform: rotateZ(-45deg) rotateX(10deg); */
            transform: scale(0.8);
        }
    
        .box{
            display: none;
        }
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

    <div class="row">
        <div class="col-xl-5 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Details</h4>
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
                                <h5 class="f-w-500">Batch <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-sm-6 col-7"><span>{{Auth::user()->batch}}</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-5">
                                <h5 class="f-w-500">Location <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-sm-6 col-7"><span>{{$info->infoPersonal->address}}, {{$info->infoPersonal->city}}</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-5">
                                <h5 class="f-w-500">Joining Date <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-sm-6 col-7"><span>{{date("j F, Y", strtotime(Auth::user()->created_at))}}</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-5">
                                <h5 class="f-w-500">Member Ledger <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-sm-6 col-7">
                                @if ($total_due > 0)
                                    <span class="text-danger">৳ {{$total_due}}</span>
                                @else
                                    <span class="text-primary">৳ {{-$total_due}} ( Advance ) </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payment</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        <form action="{{route('subscription.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center" style="border-bottom: 1px dashed #34AD54;">
                                <div>
                                    <input type="radio" name="payment_type" id="cash" class="input-hidden" value="0"/>
                                    <label for="cash"><img src="{{asset('public/images')}}/cash.png" alt="Payment Chash" style="transform: scale(1);"/></label>
                                
                                    <input type="radio" name="payment_type" id="bKash" class="input-hidden" value="1"/>
                                    <label for="bKash"><img src="{{asset('public/images')}}/bKash.png" alt="Payment bKash" /></label>
                                
                                    <input type="radio" name="payment_type" id="nagad" class="input-hidden" value="2"/>
                                    <label for="nagad"><img src="{{asset('public/images')}}/nagad.png" alt="Payment nagad" /></label>
                                
                                    <input type="radio" name="payment_type" id="roket" class="input-hidden" value="3"/>
                                    <label for="roket"><img src="{{asset('public/images')}}/roket.png" alt="Payment roket" /></label>
                                    
                                    @error('payment_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mt-2">

                                <div class="form-group col-md-6">
                                    <label class="form-label">Payment Number</label>
                                    <div class="0 box" style="display: block">
                                        <input type="text" class="form-control @error('payment_number') is-invalid @enderror" name="payment_number" value="{{old('payment_number')}}" placeholder="Cash Payment" @disabled(true)>
                                    </div>
                                    <div class="1 2 3 box">
                                        <select name="payment_number" class="form-control default-select  @error('payment_number') is-invalid @enderror" style="height: 40px;">
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
                                <div class="form-group col-md-6">
                                    <label>Transaction Number</label>
                                    <input type="text" name="transaction_no" class="form-control" value="{{old('transaction_no')}}" placeholder="xxxxxxxxxxxx">
                                    @error('transaction_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Paid Date</label>
                                    <input type="date" name="start_date" class="form-control" value="{{old('start_date')}}">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Number Of Month</label>
                                    <input type="number" id="month_no" onKeyUp="multiply()" class="form-control" value="1">
                                    @error('duo_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <div class=" d-flex justify-content-center">
                                        <div class="col-10 text-center">
                                            <label><strong>Due Amount</strong></label>
                                            <div class="input-group input-primary">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="hidden" name="duo_amount" id="duo_amount" value="{{ old('duo_amount') ?? 500 }}">
                                                <input type="text" id="TOTAL" class="form-control" value="500" disabled>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="2" id="comment"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function multiply(){
        month_no = Number(document.getElementById('month_no').value);
        month_fee = 500;
        duo_amount =month_no * month_fee;

        document.getElementById('TOTAL').value = duo_amount;
        document.getElementById('duo_amount').value = duo_amount;
    }
</script>