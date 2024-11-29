<?php

namespace App\Http\Controllers;

use App\Http\Enums\StatusEnum;
use App\Models\House;
use App\Models\HousesOnOrder;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServicesOnOrder;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return \view('admin.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(House $house):View
    {
        $services = Service::all();
        return view('booking',compact('house','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'house_id'=>'required',
            'size'=>'required',
            'date_start'=>'required',
            'date_end'=>'required',
        ]);
        $house = House::query()->firstWhere('id',$request->house_id);
        $date_start = Carbon::create($request->date_start);
        $date_end = Carbon::create($request->date_end);

        switch ($date_end->dayOfWeek){
            case Carbon::TUESDAY:
            case Carbon::MONDAY:
            case Carbon::WEDNESDAY:
            case Carbon::THURSDAY:
            case Carbon::FRIDAY:
                $price = 0;
                $days = ($date_end->dayOfYear)-($date_start->dayOfYear);
                if($days < 0) {
                    return redirect()->back();
                }
                if ($days == 0)
                {
                    $price = $house->price_weekdays_day;
                    $summ = $price*$request->size;
                }
                else {
                    if($house->price_weekdays_night) {
                        $price = $house->price_weekdays_night;
                        $summ = $price * $request->size * $days;
                    }
                    else {
                        return redirect()->back();
                    }
                }
                break;
            case Carbon::SATURDAY:
            case Carbon::SUNDAY:
                $price = 0;
                $days = ($date_end->dayOfYear)-($date_start->dayOfYear);
            if($days < 0) {
                return redirect()->back();
            }
                if ($days == 0)
                {
                    $price = $house->price_weekend_day;
                    $summ = $price*$request->size;
                }
                else {
                    if($house->price_weekend_night) {
                        $price = $house->price_weekend_night;
                        $summ = $price * $request->size * $days;
                    }
                    else {
                        return redirect()->back();
                    }
                }
                break;
            default;
        }

        $services = Service::all();
        foreach($services as $service) {
            $count = 'count'.$service->id;
            if ($request->$count != 0) {
                $summ = $summ + ((int)($service->price) * (int)($request->$count));
            }
        }

        /** @var Order $order */

        $order = Order::query()->create([
            'user_id'=>$request->user()->id,
            'status' =>StatusEnum::ACCEPT->value,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'price' => $summ,
        ]);
        $order->houses()->attach($house,['count'=>$request->size]);

        foreach ($services as $service){
            $count = 'count'.$service->id;
            if ($request->$count != 0) {
                $order->services()->attach($service,['count'=>$request->$count]);
            }
        }
        return redirect()->route('booking.message',$order);
//
//        $order = Order::query()->create()
//        foreach ($services)
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order):RedirectResponse
    {
        $order->delete();
        return redirect()->route('index');
    }

    public function message(Order $order):View
    {
        return \view('message',compact('order'));
    }
}
