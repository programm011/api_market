<?php

namespace App\Services;

class OdersService
{

    public function myOrders()
    {
        $orders = auth()->user()->orders()->with('orderItem.product')->get();
        return $orders;
    }
}
