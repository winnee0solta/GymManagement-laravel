@extends('dashboard.layout.base')

@section('content')


<div class="row justify-content-center">
    <div class="col-12 col-md-5">
        <div class="card mt-3">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td>
                                    @if (!empty($profile))
                                        {{$profile->email}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>
                                    @if (!empty($profile))
                                    {{$profile->address}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td>
                                    @if (!empty($profile))
                                    {{$profile->phone}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Update Profile
                </button>

            </div>
        </div>

    </div>
</div>


@endsection


@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/profile/update" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" required type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" required type="text" class="form-control" placeholder="Enter address">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" required type="text" class="form-control" placeholder="Enter phone">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
