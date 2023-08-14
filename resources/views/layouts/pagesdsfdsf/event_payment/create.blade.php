<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card transparent-card">
                {{-- <div class="card-header d-block">
                    <h4 class="card-title">Accordion header shadow</h4>
                </div> --}}
                <div class="card-body">
                    <div id="accordion-ten" class="accordion accordion-header-shadow accordion-rounded">
                        <div class="accordion__item">
                            <div class="accordion__header accordion__header--primary" data-toggle="collapse" data-target="#header-shadow_collapseOne" aria-expanded="true">
                                <span class="accordion__header--text">Add Event Management</span>
                                <span class="accordion__header--indicator"></span>
                            </div>
                            <div id="header-shadow_collapseOne" class="accordion__body collapse" data-parent="#accordion-ten" style="">
                                <div class="accordion__body--text">
                                    @if (session()->has('success'))
                                    <strong class="text-success">{{session()->get('success')}}</strong>
                                @endif
                                <form class="form-valide" action="{{route('event_payment.store', $event_id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Choose Member
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <select class="dropdwon_select" name="user_id">
                                                        <option selected disabled>Please select</option>
                                                        @foreach ($ecommittee as $row)
                                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Receive Number
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <input type="number" class="form-control @error('pay_number') is-invalid @enderror" name="pay_number" placeholder="Payment Receive Number.." value="{{old('pay_number')}}">                                     
                                                    @error('pay_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Payment Method
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-7">
                                                    <select class="form-control default-select" name="payment_type">
                                                        <option value="0">Cash</option>
                                                        <option value="1">bkash</option>
                                                        <option value="2">Rocket</option>
                                                        <option value="3">Nagad</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-skill">Status</label>
                                                <div class="col-lg-7">
                                                    <select class="form-control default-select" name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item">
                            <div class="accordion__header accordion__header--info collapsed" data-toggle="collapse" data-target="#header-shadow_collapseTwo" aria-expanded="false">
                                <span class="accordion__header--text">Event Management List</span>
                                <span class="accordion__header--indicator"></span>
                            </div>
                            <div id="header-shadow_collapseTwo" class="accordion__body collapse show" data-parent="#accordion-ten" style="">
                                <div class="accordion__body--text">
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Member Name</th>
                                                    <th>Payment Method</th>
                                                    <th>Receive Number</th>
                                                    <th>Status</th>
                                                    <th class="text-right pr-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $row->user->name }}</td>
                                                    <td>
                                                        @if ($row->payment_type = '0') Cash
                                                        @elseif ($row->payment_type = '1') bkash
                                                        @elseif ($row->payment_type = '2') Rocket
                                                        @elseif ($row->payment_type = '3') Nagad
                                                        @endif
                                                    </td>
                                                    <td>{{ $row->pay_number}}</td>
                                                    <td>
                                                        @if($row->status==1)
                                                            <span class="badge light badge-success"><i class="fa fa-circle text-success mr-1"></i>Active</span>
                                                        @else
                                                            <span class="badge light badge-warning"><i class="fa fa-circle text-danger mr-1"></i>Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td class="d-flex justify-content-end">
                                                        {{-- @can('User edit')
                                                        <a href="{{ route('event_payment.edit', $row->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                        @endcan --}}
                                                        <a href="{{route('event_payment.destroy', $row ->id)}}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
                                                    </td>												
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
<script>
    $(function () {
        $(".dropdwon_select").select2();
    }); 
</script>