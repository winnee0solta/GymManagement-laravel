@extends('site.layout.base')

@section('content')


<div class="row justify-content-center">
    <div class="col-12 col-md-5">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Profile Information</div>

                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                username
                            </td>
                            <td>
                                {{$user->username}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                Fullname
                            </td>
                            <td>
                                {{$member->fullname}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                DOB
                            </td>
                            <td>
                                {{$member->dob}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                phone
                            </td>
                            <td>
                                {{$member->phone}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                address
                            </td>
                            <td>
                                {{$member->address}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                Emergency Contact
                            </td>
                            <td>
                                {{$member->e_phone}}
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                shift
                            </td>
                            <td>
                                {{$member->shift}}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                user joined at
                            </td>

                            <td>{{  date( "m/d/Y", strtotime($user['created_at']))  }}</td>

                        </tr>
                        <tr>
                            <td class="font-weight-bold text-uppercase">
                                membership deadline
                            </td>

                            <td>
                                <span class="mr-4">{{$deadline}}</span>
                            </td>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>


<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-warning text-white collapsed" aria-expanded="false" type="button"
                    data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseTwo">
                    View Account Transaction
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-5">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="card-title">Account Transaction Record</div>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Transaction Date</th>
                                                <th scope="col">Amount Paid</th>
                                                <th scope="col">Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $totalamount_paid = 0;
                                            @endphp
                                            @if (!empty($accounts))
                                            @foreach ($accounts as $item)

                                            <tr>
                                                <th scope="row">{{$loop->index + 1}}</th>
                                                <td>{{$item->created_at}}</td>
                                                <td>Rs {{$item->amount_paid}}</td>
                                                <td>{{$item->note}}</td>
                                            </tr>
                                            @php
                                            $totalamount_paid = $totalamount_paid + $item->amount_paid;
                                            @endphp
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="card mt-1">
                            <div class="card-body text-right">
                                <span class="h6 font-weight-bold">Total : RS {{$totalamount_paid}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-warning text-white" aria-expanded="false" type="button" data-toggle="collapse"
                    data-target="#collapseOne" aria-controls="collapseOne">
                    View Attendances
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">#Date</th>
                                                <th scope="col">Attendance Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($attendances))
                                            @foreach ($attendances as $item)
                                            <tr>
                                                <td>{{$item['created_at']}}</td>
                                                <td>
                                                    @if ($item['status'])
                                                    <span class="badge badge-pill badge-success">PRESENT</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">ABSENT</span>

                                                    @endif
                                                </td>
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
            </div>
        </div>
    </div>

</div>



{{-- <div class="row justify-content-center">
    <div class="col-12 col-md-5">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Account Transaction Record</div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Transaction Date</th>
                                <th scope="col">Amount Paid</th>
                                <th scope="col">Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalamount_paid = 0;
                            @endphp
                            @if (!empty($accounts))
                            @foreach ($accounts as $item)

                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
<td>{{$item->created_at}}</td>
<td>Rs {{$item->amount_paid}}</td>
<td>{{$item->note}}</td>
</tr>
@php
$totalamount_paid = $totalamount_paid + $item->amount_paid;
@endphp
@endforeach
@endif
</tbody>
</table>
</div>

</div>
</div>
<div class="card mt-1">
    <div class="card-body text-right">
        <span class="h6 font-weight-bold">Total : RS {{$totalamount_paid}}</span>
    </div>
</div>
</div>
</div> --}}



@endsection
