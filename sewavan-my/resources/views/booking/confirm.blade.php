@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-4 my-5">
        @foreach($vans as $van)
        <form action="{{ route('confirm-booking', $van->id) }}" method="GET">
            @csrf
            <div class="row row-cols-sm-1 row-cols-md-2 mb-2">
                <div class="col">
                    <p class="mb-2">Your choosen van :</p>
                    <div class="card border-primary mb-3">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="/img/{{$van->image}}" class="mx-auto img-fluid rounded-start" alt="{{ $van->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{$van->title}}</h5>
                                    <p class="card-text">{{$van->description}}</p>
                                    <p class="card-text mb-0"><i class="bi bi-truck-front me-2"></i>{{$van->brand}}</p>
                                    <p class="card-text mb-0"><i class="bi bi-people me-2"></i>{{$van->seater}}</p>
                                    <p class="card-text"><i class="bi bi-gear me-2"></i>{{$van->transmission}}</p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="van" value="{{$van->id}}">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">How many day(s) ?</label>
                        <input type="number" name="duration" class="form-control bg-light @error('duration') is-invalid @enderror" id="exampleFormControlInput1" placeholder="1">
                        @if ($errors->any('duration'))
                            <span class="text-danger" role="alert">
                                {{ $errors->first('duration') }}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Date</label>
                        <input type="date" min="{{ date('Y-m-d') }}" name="date" class="form-control bg-light @error('date') is-invalid @enderror" id="exampleFormControlInput2" placeholder="1">
                        @if ($errors->any('date'))
                            <span class="text-danger" role="alert">
                                {{ $errors->first('date') }}
                            </span>
                        @endif
                    </div>
                    <div>
                        <p class="mb-0">With driver ?</p>
                        <small>10 hours for 1 day</small>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="radio" name="with_driver" value="Yes" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Yes (RM {{$van->price_with_driver}} / Hari)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="with_driver" value="No" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                No (RM {{$van->price_per_day}} / Hari)
                            </label>
                        </div>
                    </div>
                    <div class="my-3">
                        <label for="exampleFormControlInput1" class="form-label">Remark for us</label>
                        <textarea name="remark" class="form-control bg-light @error('remark') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @if ($errors->any('remark'))
                            <span class="text-danger" role="alert">
                                {{ $errors->first('remark') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-end">
                <a href="{{ route('create-booking') }}" class="btn btn-link link-secondary">Back</a>
                <button type="submit" name="submit" class="ms-3 btn btn-primary">Confirm</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection