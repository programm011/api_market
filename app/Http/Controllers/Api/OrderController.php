<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OdersService;
use App\Traits\Response;

class OrderController extends Controller
{
    use Response;
    public function __construct(protected OdersService $service) { }

    public function myOrders()
    {
        $orders = $this->service->myOrders();
        return $this->sendResponse($orders, 'success');
    }
}
