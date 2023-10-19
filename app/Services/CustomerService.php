<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\Request;
use Prewk\Result\Ok;

class CustomerService
{
    /**
     * @param Request $request
     * @return Result
     */
    public function addCustomer(Request $request)
    {

        $extension = $request->image->getClientOriginalExtension();

        $newImageName = time() . '-' . $request->name . '.' . $extension;

        $request->image->move(storage_path('app/public/images'), $newImageName);

        $customer = new Customer();

        $customer->image = $newImageName;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->nic = $request->nic;
        $customer->email = $request->email;

        $customer->save();

        return $customer;
    }
}
