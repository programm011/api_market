<?php

namespace App\Http\Controllers\Api;

use App\Services\OdersService;

class OrderController extends BaseController
{
    public function __construct(protected OdersService $service) { }

    public function myOrders()
    {
        $orders = $this->service->myOrders();
        return $this->sendResponse($orders, 'success');
    }
}
