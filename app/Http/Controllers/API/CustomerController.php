<?php

namespace App\Http\Controllers\API;

// use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Customer;
use Validator;
use App\Http\Resources\Customer as CustomerResource;

class CustomerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customers = Customer::all();
    
        return $this->sendResponse(CustomerResource::collection($customers), 'Customers retrieved successfully.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $inputData = $request->all();

        $validator = Validator::make($inputData, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'age'        => 'required',
            'dob'        => 'required',
            'email'      => 'required|email'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $customer = Customer::create($inputData);

        return $this->sendResponse(new CustomerResource($customer), 'Customer created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $customer = Customer::find($id);
  
        if (is_null($customer)) {
            return $this->sendError('Customer not found.');
        }
   
        return $this->sendResponse(new CustomerResource($customer), 'Customer retrieved successfully.');

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
    public function update(Request $request, Customer $customer)
    {
        
        $inputData = $request->all();
   
        $validator = Validator::make($inputData, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'age'        => 'required',
            'dob'        => 'required',
            'email'      => 'required|email'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $customer->first_name= $inputData['first_name'];
        $customer->last_name = $inputData['last_name'];
        $customer->age       = $inputData['age'];
        $customer->dob       = $inputData['dob'];
        $customer->email     = $inputData['email'];
        $customer->save();
   
        return $this->sendResponse(new CustomerResource($customer), 'Customer updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        
        $customer->delete();
        return $this->sendResponse([], 'Customer deleted successfully.');

    }
}
