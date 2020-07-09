@extends('site.layout.base')

@section('content')


<div class="row justify-content-center">
    <div class="col-12 col-md-5">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Contact Information</div>
                @if (!empty($profile))
                <div class="mt-2 title">
                    Email : {{$profile->email}}
                </div>
                <div class="mt-2 title">
                    Phone : {{$profile->phone}}
                </div>
                <div class="mt-2 title">
                    Address : {{$profile->address}}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12 col-md-5">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title">Feedback Form</div>
                <form  method="POST" action="/feedback/add">
                    @csrf
                    <div class="form-group">
                        <label>Feedback</label>
                        <textarea name="feedback" type="text" class="form-control"> </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection