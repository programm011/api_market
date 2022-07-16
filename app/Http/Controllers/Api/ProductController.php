<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Traits\Response;

class ProductController extends Controller
{
    use Response;
    public function __construct(protected ProductService $service) { }

    public function index()
    {
        $products = $this->service->list();
        return $this->sendResponse($products, 'success');
    }
}
