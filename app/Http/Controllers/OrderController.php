<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10);
        $page  = $request->query('page', 1);

        $orders = Order::paginate($limit, ['*'], 'page', $page);
        return $this->sendResponse('Get Data Success!', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'           => 'required',
            'schedule_id'       => 'required',
            'total_passengers'  => 'required',
            'total_price'       => 'required',
            'payment_method'    => 'required',
            'payment_receipt'   => 'nullable',
            'passengers'        => 'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        try {
            $input = $request->all();
            $order = Order::create($input);
            $orderId = $order->id;
    
            // Create tickets
            if ($request->has('passengers')) {
                foreach ($request->input('passengers') as $passengerData) {
                    Ticket::create([
                        'order_id' => $orderId, 
                        'passenger_name' => $passengerData['passenger_name'],
                        'passenger_age'  => $passengerData['passenger_age'],
                    ]);
                }
            }    
            return $this->sendResponse('Success create new data!', $order);
            
        } catch (\Throwable $e) {
            return $this->sendError('Failed! ', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
