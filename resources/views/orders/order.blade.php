@extends('auth.layouts')

@section('content')
    <h1>Add Sale Line Item</h1>
    <form class="mb-4" method="POST" action="{{ route('orders.addItem') }}">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label for="item_id" class="sr-only">Select Item:</label>
                <select name="item_id" id="item_id" class="form-control">
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('item_id')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="col-auto">
                <label for="quantity" class="sr-only">Quantity:</label>
                <input class="form-control" type="number" name="quantity" id="quantity" min="1" value="{{ old('quantity') }}" required>
                @error('quantity')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="col-auto pt-2">
                <button type="submit" class="btn btn-primary">Add Line Item</button>
            </div>
        </div>
    </form>

    <!-- Display sale details, member information, total price, etc. -->

    @if ($sale && $sale->items->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0;
                @endphp
                @foreach($sale->items as $item)
                    @php
                        $itemAmount = $item->price * $item->pivot->quantity;
                        $totalAmount += $itemAmount;
                    @endphp
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->pivot->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $itemAmount }}</td>
                        <td>
                    </form>
                    <form method="POST" action="{{ route('orders.removeItem', $item->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Total:</td>
                <td>${{ $totalAmount }}</td>
            </tr>
        </tbody>
    </table>
    <form method="POST" action="{{ route('orders.pay') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
    </form>

@else
    <p>No sale line items added yet.</p>
@endif

@endsection
