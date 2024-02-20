@extends('auth.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Member</div>

                <div class="card-body">
                    <form action="{{ route('members.update', $member->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="FirstName">First Name:</label>
                            <input type="text" class="form-control" id="FirstName" name="FirstName" value="{{ $member->FirstName }}" required>
                        </div>
                        <div class="form-group">
                            <label for="LastName">Last Name:</label>
                            <input type="text" class="form-control" id="LastName" name="LastName" value="{{ $member->LastName }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
