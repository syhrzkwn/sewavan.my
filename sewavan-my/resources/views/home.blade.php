@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Hi, {{ Auth::user()->fname }} {{ Auth::user()->lname }}!</h2>
        <a href="{{ route('booking') }}" class="btn btn-success">New Booking</a>
    </div>
    <h5 class="mt-4">Your Booking:</h5>
    @if($bookings->count() == 0)
        <div class="card p-3">
            <p class="text-center mb-0">Look like you don't have any booking yet. Start booking now!</p>
        </div>
    @else
        <div class="card p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th>Date</th>
                        <th>Duration</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle">
                        @foreach($bookings as $booking)
                        <th class="text-center">{{ $booking->id }}</th>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->duration }} Day</td>
                        <td class="text-center">
                            @if($booking->status == 'Pending')
                                <span class="badge text-bg-primary">Rejected</span>
                            @elseif($booking->status == 'Renting')
                                <span class="badge text-bg-warning">Renting</span>
                            @elseif($booking->status == 'Rejected')
                                <span class="badge text-bg-danger">Rejected</span>
                            @else
                                <span class="badge text-bg-success">Completed</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
