@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-0">Choose a van to rent</h2>
        <a href="{{ route('booking') }}" class="btn btn-danger">Cancel</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3 mb-5">
        @foreach($vans as $van)
        <div class="col">
            <div class="card bg-transparent border-success h-100">
                <img src="/img/{{$van->image}}" class="mx-auto img-fluid" alt="{{ $van->title }}">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $van->title }}</h5>
                    <p class="card-text mb-0">{{ $van->description }}</p>
                    <p class="card-text mb-0"><i class="bi bi-truck-front me-2"></i>{{ $van->brand }}</p>
                    <p class="card-text mb-0"><i class="bi bi-people me-2"></i>{{ $van->seater }} Seater</p>
                    <p class="card-text"><i class="bi bi-gear me-2"></i>{{ $van->transmission }}</p>
                    <p class="card-text text-orange">RM{{ $van->price_per_day }} - RM{{ $van->price_with_driver }}</p>
                    <a href="{{ route('show-booking', $van->id) }}" class="btn btn-success w-100">Select</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection