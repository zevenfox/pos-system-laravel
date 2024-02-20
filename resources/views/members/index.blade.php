@extends('auth.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Members</div>

                <div class="card-body">
                    <a href="{{ route('members.create') }}" class="btn btn-success mb-3">Create Member</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->FirstName }}</td>
                                <td>{{ $member->LastName }}</td>
                                <td>{{ $member->email }}</td>
                                <td>
                                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                                    </form>
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
@endsection
