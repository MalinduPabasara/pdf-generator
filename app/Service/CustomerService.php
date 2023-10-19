<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\Request;
use Prewk\Result;
use Prewk\Result\Ok;

class CustomerService
{
    /**
     * @param Request $request
     * @return Result
     */
    public function addCustomer(Request $request)
    {

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(storage_path('app/public/images'), $newImageName);

        $customer = new Customer();

        $customer->image = $request->newImageName;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->nic = $request->nic;
        $customer->email = $request->email;

        $customer->save();

        return new Ok($customer);

    }


}