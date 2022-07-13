@extends('customer.main')

@section('container')
<div class="container my-5 p-1">
    <h1 class="h3 title text-center mb-3">Browse our Categories</h1>
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4 mb-2">
            <a href="/categories?category={{ $category->slug }}">
                <div class="card categories text-white border-0 m-3">
                    @if($category->image)
                    <img src="" class="card-img" alt="" width="800" height="200">
                    @else
                    <img src="https://source.unsplash.com/1519x400?{{ $category->name }}" class="card-img" alt="" width="800" height="200">
                    @endif
                    <div class="card-img-overlay d-flex align-items-center p-0" style="background: linear-gradient(90deg, rgba(0,0,0,1) 5%, rgba(0,17,53,0) 50%); border: none">
                        <h5 class="card-title text-start ps-4 fs-4">{{ $category->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection