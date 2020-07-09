@extends('site.layout.base')

@section('content')


<div class="row justify-content-center">
    <div class="col-12 col-md-5">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Nutrition Plan For {{$day}}</div>

                <div>
                    {{$todayNutritionPlan}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-5">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Workout Plan For {{$day}}</div>

                <div>
                    {{$todayWorkoutPlan}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center mt-3">
    <div class="col-12 col-md-6">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Body Status</div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Height</th>
                                <th scope="col">BMI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($bodystatus))
                            @foreach ($bodystatus as $item)

                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$item->updated_date}}</td>
                                <td>{{$item->weight}}</td>
                                <td>{{$item->height}}</td>
                                <td>{{$item->bmi}}</td>
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
