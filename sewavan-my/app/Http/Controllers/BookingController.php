<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $bookings = DB::table('bookings')
        ->join('vans', 'vans.id', '=', 'bookings.van_id')
        ->select('vans.*', 'bookings.*')
        ->where('bookings.user_id', $id)
        ->get();
        return view('booking/index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vans = DB::table('vans')->get();
        return view('booking/create', compact('vans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Booking::create([
                'duration' => $request->duration,
                'date' => $request->date,
                'with_driver' => $request->with_driver,
                'remark' => $request->remark,
                'user_id' => $request->user_id,
                'van_id' => $request->van_id,
                'price' => $request->price,
            ]);

            return redirect()->route('booking')->with('success', 'Booking created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vans = DB::table('vans')->where('id', $id)->get();
        return view('booking/confirm', compact('vans'));
    }

    public function confirm(Request $request, string $id)
    {
        $van = DB::table('vans')->where('id', $id)->first();
        $request->validate([
            'duration' => 'required|numeric',
            'date' => 'required',
            'with_driver' => ['required','in:Yes,No'],
            'remark' => 'required|max:255'
        ]);

        try {
            if($request->with_driver == 'Yes') {
                $total_price = $van->price_with_driver * $request->duration;
            } else {
                $total_price = $van->price_per_day * $request->duration;
            }
    
            $request->session()->put('duration', $request->duration);
            $request->session()->put('date', $request->date);
            $request->session()->put('with_driver', $request->with_driver);
            $request->session()->put('remark', $request->remark);
            $request->session()->put('total_price', $total_price);
    
            return redirect()->route('checkout-booking',$id);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    public function showCheckout(string $id) {
        $vans = DB::table('vans')->where('id', $id)->get();
        return view('booking/checkout', compact('vans'));
    }

}
