<?php

namespace App\Http\Controllers;

use App\Order;
use App\getRestaurant;
use Illuminate\Http\Request;

use Braintree\Gateway;
use App\Models\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getRestaurant(Request $request)
    {
        $restaurant = $request->all();
        return view('guests.checkout.create', compact('restaurant'));
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
        $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_surname' => 'required|string|max:100',
            'customer_address' => 'required|string|max:100',
            'customer_phone_number' => 'required|regex:/^([0-9\-\+\(\)]*)$/|min:10',
            'customer_email' => 'required|string|email|max:255',
            'total' => 'required|numeric',
            'restaurant_id' => 'exists:restaurants,id',
          ]);

          $data = $request->all();

          $order = new Order();
          $order->fill($data);

          $order->save();

          if (array_key_exists('restaurant_ids', $data)) {
            $order->restaurants()->attach($data['restaurant_ids']);
          }

          return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    // Braintree
        public function generate(Request $request,Gateway $gateway){
            $token = $gateway->clientToken()->generate();

            $data = [
                'success' => true,
                'token' => $token
            ];

            return response()->json($data,200);
        }

        public function makePayment(OrderRequest $request,Gateway $gateway){

            // $product = Product::find($request->product);

            $result = $gateway->transaction()->sale([
                'amount' => $request->amount,
                'paymentMethodNonce' => $request->token,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);

            if($result->success){
                $data = [
                    'success' => true,
                    'message' => "Transazione eseguita con Successo!"
                ];
                return response()->json($data,200);
            }else{
                $data = [
                    'success' => false,
                    'message' => "Transazione Fallita!!"
                ];
                return response()->json($data,401);
            }
        }
}
