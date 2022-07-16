<?php

namespace App\Http\Controllers\Api;

use App\Services\ProductService;

class ProductController extends BaseController
{
    public function __construct(protected ProductService $service) { }

    public function index()
    {
        $products = $this->service->list();
        return $this->sendResponse($products, 'success');
    }
}
