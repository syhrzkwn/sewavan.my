@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold text-capitalize mb-0">Hi, {{ Auth::user()->fname }} {{ Auth::user()->lname }}!</h2>
        <a href="{{ route('create-booking') }}" class="btn btn-success">New Booking</a>
    </div>
    @if($bookings->count() == 0)
        <div class="card p-3 mt-4 mb-5">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    @foreach($bookings as $booking)
                    <div class="card">
                        <div class="card-header">My Booking</div>
                        <div class="card-body">
                            <p class="card-text">Look like you don't have any booking yet. Start booking now!</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-header">Profile</div>
                        <div class="card-body text-center">
                            <h1 class="card-title"><i class="bi bi-person-circle"></i></h1>
                            <p class="card-text">
                                <span>{{Auth::user()->fname}} {{Auth::user()->lname}}</span><br>
                                <span>{{Auth::user()->phone}}</span><br>
                                <span>{{Auth::user()->email}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="card p-3 mt-4 mb-5">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <div class="card">
                        <div class="card-header">My Booking</div>
                        <div class="card-body">
                            <p class="card-text">
                                <div class="card p-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Item</th>
                                                <th>Date</th>
                                                <th class="text-center">Duration</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $booking)
                                            <tr>
                                                <td>{{$booking->id}}</td>
                                                <td><span class="fw-bold">{{$booking->title}}</span><br>
                                                    <small>{{$booking->description}}</small><br>
                                                    <small>With Driver: {{$booking->with_driver}}</small>
                                                </td>
                                                <td>{{ date('d-m-Y (l)', strtotime($booking->date)) }}</td>
                                                <td class="text-center">{{$booking->duration}} day(s)</td>
                                                <td class="text-center">
                                                    @if($booking->status == 'Pending')
                                                        <span class="badge rounded-pill text-bg-warning">{{$booking->status}}</span>
                                                    @elseif($booking->status == 'Renting')
                                                        <span class="badge rounded-pill text-bg-primary">{{$booking->status}}</span>
                                                    @elseif($booking->status == 'Rejected')
                                                        <span class="badge rounded-pill text-bg-danger">{{$booking->status}}</span>
                                                    @else
                                                        <span class="badge rounded-pill text-bg-success">{{$booking->status}}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-three-dots"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <!-- Button trigger modal 1 -->
                                                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#idreceipt{{$booking->id}}">
                                                                    Receipt
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <!-- Button trigger modal 2 -->
                                                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#idremark{{$booking->id}}">
                                                                    Remark
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal 1 -->
                                            <div class="modal fade" id="idreceipt{{$booking->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$booking->id}}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel{{$booking->id}}">Receipt</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <p class="fw-bold">Item</p>
                                                                <p class="mb-0">{{$booking->title}}</p>
                                                                <small>(With Driver: {{$booking->with_driver}})</small>
                                                            </div>
                                                            <div>
                                                                <p class="fw-bold">Price</p>
                                                                @if($booking->with_driver == 'Yes')
                                                                    <p>RM{{$booking->price_with_driver}}.00</p>
                                                                @else
                                                                    <p>RM{{$booking->price_per_day}}.00</p>
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <p class="fw-bold">Duration</p>
                                                                <p>{{$booking->duration}} Day(s)</p>
                                                            </div>
                                                            <div>
                                                                <p class="fw-bold">Total Price</p>
                                                                <p>RM{{$booking->price}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <!-- Modal 2 -->
                                            <div class="modal fade" id="idremark{{$booking->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$booking->id}}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel{{$booking->id}}">Remark</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{$booking->remark}}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-header">Profile</div>
                        <div class="card-body text-center">
                            <h1 class="card-title"><i class="bi bi-person-circle"></i></h1>
                            <p class="card-text">
                                <span>{{Auth::user()->fname}} {{Auth::user()->lname}}</span><br>
                                <span>{{Auth::user()->phone}}</span><br>
                                <span>{{Auth::user()->email}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
