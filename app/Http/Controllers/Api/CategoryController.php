<?php

namespace App\Http\Controllers\Api;

use App\Services\CategoryService;

class CategoryController extends BaseController
{
    public function __invoke(CategoryService $service)
    {
        $categories = $service->list();
        return $this->sendResponse($categories, 'success');
    }
}
