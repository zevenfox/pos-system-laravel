@extends('auth.layouts')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Sales Management</div>
                <div class="card-body">
                    <h5 class="card-title">Welcome to the Sales Management Dashboard</h5>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                            <a href="{{ route('orders.order') }}" class="btn btn-primary">Open Sale</a>
                        </div>
                    @else
                        <div class="alert alert-info">
                        <a href="{{ route('orders.order') }}" class="btn btn-primary">Open Sale</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
