@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Yangi mahsulot qo'shish</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nomi</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Narxi</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock">Qoldiq</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Saqlash</button>
    </form>
</div>
@endsection