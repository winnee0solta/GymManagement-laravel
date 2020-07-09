@extends('dashboard.layout.base')

@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
    </ol>
</nav>

 

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-uppercase">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Emergence Contact</th> 
                        <th scope="col">Shift</th>  
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($feedbacks))
                    @foreach ($feedbacks as $item)
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item['feedback']}}</td>
                        <td>{{$item['username']}}</td>
                        <td>{{$item['fullname']}}</td>
                        <td>{{$item['dob']}}</td>
                        <td>{{$item['phone']}}</td>
                        <td>{{$item['address']}}</td>
                        <td>{{$item['e_phone']}}</td> 
                        <td>{{$item['shift']}}</td> 
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection
 