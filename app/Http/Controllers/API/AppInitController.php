<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Type;
use Illuminate\Http\Request;

class AppInitController extends Controller
{
    public function __invoke(Request $request)
    {
        $subscriberId = $request->user()->subscriber_id ?? auth()->user()->subscriber_id;

        if($request->has('category')) {
            return $this->categories($subscriberId);
        }

        if($request->has('supplier')) {
            return $this->suppliers($subscriberId);
        }

        if($request->has('type')) {
            return $this->types($subscriberId);
        }

        return [
            'typeLists' => $this->types($subscriberId),
            'supplierLists' => $this->suppliers($subscriberId),
            'mainCategoryLists' => $this->categories($subscriberId),
            'unitLists' => units(),
        ];
    }

    public function types($subscriberId) {
        return Type::ofSubscriber($subscriberId)->orderBy('name', 'asc')->get(['id', 'name']);
    }

    public function suppliers($subscriberId) {
        return Supplier::ofSubscriber($subscriberId)->orderBy('name', 'asc')->get(['id', 'name']);
    }

    public function categories($subscriberId) {
        return Category::ofSubscriber($subscriberId)->select('id', 'name', 'code', 'uom')->whereNull('parent_id')->orWhere('parent_id', '')->get();
    }

}
