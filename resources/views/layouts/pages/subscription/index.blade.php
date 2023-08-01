<x-app-layout>
    <div class="row">

        <div class="col-xl-12">
            <div class="card transparent-card">
                <div class="card-header">
                    <h4 class="card-title">
                        @if ($total_due > 0)
                            Total Due <span class="btn btn-sm btn-danger rounded px-1 text-xs py-0.5">৳ {{$total_due}}</span>
                        @else
                            Advance <span class="btn btn-sm btn-primary rounded px-1 text-xs py-0.5">৳ {{-$total_due}}</span>
                        @endif
                    </h4>
                    <a href="{{ route('subscription.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Payment</a>
                </div>
                <div class="card-body">
                    <div id="accordion-ten" class="accordion accordion-header-shadow accordion-rounded">
                        <div class="accordion__item">
                            <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse" data-target="#header-shadow_collapseOne" aria-expanded="true">
                                <span class="accordion__header--text">Payment Details</span>
                                <span class="accordion__header--indicator"></span>
                            </div>
                            <div id="header-shadow_collapseOne" class="accordion__body collapse" data-parent="#accordion-ten" style="">
                                <div class="accordion__body--text">
                                    @if (session()->has('success'))
                                        <strong class="text-success">{{session()->get('success')}}</strong>
                                    @endif
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Payment Number</th>
                                                    <th>Transaction No</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th class="text-right pr-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payment_details as $key=> $row)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{ $row->payment_number}}</td>
                                                    <td>{{ $row->transaction_no}}</td>
                                                    <td>{{ $row->duo_amount}}</td>
                                                    <td>{{ $row->start_date}}</td>
                                                    <td class="d-flex justify-content-end">
                                                        @if ($row->status == '1')
                                                        <span class="badge light badge-success">Done.</span>
                                                        @elseif ($row->status == '2')
                                                        <span class="badge light badge-danger">Cancel</span>
                                                        @else
                                                        <span class="badge light badge-warning">Pending</span>
                                                        @endif
                                                    </td>											
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item">
                            <div class="accordion__header accordion__header--info collapsed" data-toggle="collapse" data-target="#header-shadow_collapseTwo" aria-expanded="false">
                                <span class="accordion__header--text">Subscription Fees</span>
                                <span class="accordion__header--indicator"></span>
                            </div>
                            <div id="header-shadow_collapseTwo" class="accordion__body collapse" data-parent="#accordion-ten" style="">
                                <div class="accordion__body--text">
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>Due Date</th>
                                                    <th>Paid Date</th>
                                                    <th>Paid Amount</th>
                                                    <th class="text-right pr-4">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key=> $row)
                                                <tr>
                                                    <td>{{ ++$key}}</td>
                                                    <td>{{date("j F, Y", strtotime($row->sub_month))}}</td>
                                                    <td>{{date('d-m-Y', strtotime($row->pay_date))}}</td>									
                                                    <td>{{ $row->amount}}</td>
                                                    <td class="d-flex justify-content-end">
                                                        <div class="flex items-center">
                                                            @if($row->status == '1')
                                                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Paid
                                                            @else
                                                                <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> Unpaid
                                                            @endif
                                                        </div>
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
