@extends('dashboard.layout.base')

@section('content')


<div class="row justify-content-center">
    <div class="col-12 col-md-10">
        <div class="card mt-1">
            <div class="card-body ">
                <span class="h6 font-weight-bold">Total : RS {{$totalamount}}</span>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Transaction Date</th>
                                <th scope="col">Amount Paid</th>
                                <th scope="col">Note</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (!empty($accounts))
                            @foreach ($accounts as $item)

                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$item['created_at']}}</td>
                                <td>Rs {{$item['amount_paid']}}</td>
                                <td>{{$item['note']}}</td>
                                <td>{{$item['fullname']}}</td>
                                <td>{{$item['phone']}}</td>
                                <td>{{$item['address']}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>


@endsection
