@extends('auth.layouts')

@section('content')
    <h1>Payment</h1>
    <p>Total amount to pay: ${{ $totalAmount }}</p>
    <form method="POST" action="{{ route('orders.checkMember') }}">
        @csrf
        <div class="form-group">
            <label for="email">Enter your email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Check Membership</button>
        <button type="submit" class="btn btn-primary">Proceed to Payment With Out Membership</button>
    </form>
@endsection
