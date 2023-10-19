<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Models\Customer;
use PDF;

class CustomerController extends Controller
{

    protected CustomerService $customerService;

    /**
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
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
            'image' => 'required',
            'name' => 'required|string',
            'address' => 'required',
            'nic' => 'required',
            'email' => 'required|email',
        ]);

        $result = $this->customerService->addCustomer($request);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customer::find($id);

        $data = [
            'image' => $customers->image,
            'name' => $customers->name,
            'address' => $customers->address,
            'nic' => $customers->nic,
            'email' => $customers->email,
        ];

        $pdf = PDF::loadView('pdf', $data);

        return $pdf->download('customer.pdf');
    }
}
