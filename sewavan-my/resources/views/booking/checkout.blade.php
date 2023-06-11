@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-4 my-5">
        @foreach($vans as $van)
        <form action="{{ route('store-booking') }}" method="POST" >
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
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">How many day(s) ?</label>
                        <input type="number" class="form-control bg-light border-primary" id="exampleFormControlInput1" value="{{Session::get('duration')}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Date</label>
                        <input type="date" class="form-control bg-light border-primary" id="exampleFormControlInput2" value="{{Session::get('date')}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">With Driver?</label>
                        <input type="text" class="form-control bg-light border-primary" id="exampleFormControlInput3" value="{{Session::get('with_driver')}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Remark for us</label>
                        <textarea class="form-control bg-light border-primary" id="exampleFormControlTextarea1" rows="3" disabled>{{Session::get('remark')}}</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="fw-bold text-center mb-4">Checkout Detail</h5>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Item</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Duration</th>
                        <th class="text-end">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$van->id}}</td>
                        <td>{{$van->title}}<br>
                            <small>{{$van->description}}</small><br>
                            <small>Date: {{ date('d-m-Y (l)', strtotime(Session::get('date'))) }}</small><br>
                            <small>With Driver: {{Session::get('with_driver')}}</small>
                        </td>
                        @if(Session::get('with_driver') == 'Yes')
                            <td class="text-center">RM {{$van->price_with_driver}}.00</td>
                        @else
                            <td class="text-center">RM {{$van->price_per_day}}.00</td>
                        @endif
                        <td class="text-center">{{Session::get('duration')}} day(s)</td>
                        <td class="text-end">RM {{Session::get('total_price')}}.00</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end">
                <input type="hidden" name="duration" value="{{Session::get('duration')}}">
                <input type="hidden" name="date" value="{{Session::get('date')}}">
                <input type="hidden" name="remark" value="{{Session::get('remark')}}">
                <input type="hidden" name="with_driver" value="{{Session::get('with_driver')}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="van_id" value="{{$van->id}}">
                <input type="hidden" name="price" value="{{Session::get('total_price')}}">
                <a href="{{route('booking')}}" class="btn btn-link link-danger">Cancel</a>
                <button type="submit" class="ms-3 btn btn-primary">Proceed to Checkout</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection