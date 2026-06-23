@extends('layouts.app')
@section('title', 'Edit Produk — Admin')

@section('content')
<div style="background: linear-gradient(135deg, #1a3a2a, #2d6a4f); padding:50px 0; color:#fff;">
    <div class="container">
        <p style="color:#c9a84c; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem; margin-bottom:8px;">Panel Admin</p>
        <h2 style="font-family:'Playfair Display',serif; font-size:2.2rem;">Edit Produk: {{ $product->name }}</h2>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card border-0 rounded-4 shadow-sm p-4">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.products._form', ['submitLabel' => 'Update Produk'])
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
