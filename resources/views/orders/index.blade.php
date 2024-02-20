@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Sales Management</h1>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <a href="{{ route('orders.order') }}" class="btn btn-primary">Open Sale</a>
    </div>
    <h2>Membership get 10% discount</h2>
</div>
@endsection
