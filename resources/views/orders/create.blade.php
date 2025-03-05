@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Create an order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Products</label>
            <select name="product_id" id="product-select" class="form-control" required>
                <option value="">Select a product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}">
                        {{ $product->name }} (Stock: {{ $product->stock }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Stock</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>
        <div class="form-group">
            <label for="total_price">Total price</label>
            <input type="text" id="total-price" class="form-control" readonly>
         
            <input type="hidden" name="total_price" id="total-price-hidden">
        </div>
        <button type="submit" class="btn btn-success">Order</button>
    </form>
</div>


@section('scripts')
<script>
    $(document).ready(function() {
        
        $('#product-select').change(function() {
            var price = $(this).find(':selected').data('price');
            var stock = $(this).find(':selected').data('stock'); 
            $('#quantity').attr('max', stock); 
            $('#quantity').val(1); 
            $('#total-price').val(price.toFixed(2)); 
            $('#total-price-hidden').val(price.toFixed(2)); 
        });

        
        $('#quantity').on('input', function() {
            var price = $('#product-select').find(':selected').data('price'); 
            var quantity = $(this).val(); 
            var totalPrice = price * quantity; 
            $('#total-price').val(totalPrice.toFixed(2)); 
            $('#total-price-hidden').val(totalPrice.toFixed(2)); 
        });

      
        $('form').on('submit', function(e) {
            var totalPrice = $('#total-price-hidden').val();
            if (!totalPrice || totalPrice <= 0) {
                e.preventDefault(); 
                alert('Please select a product and quantity!');
            }
        });
    });
</script>
@endsection
@endsection