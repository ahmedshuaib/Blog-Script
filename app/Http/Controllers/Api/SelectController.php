<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Select\CategoryCollection;
use App\Http\Resources\Admin\Select\TagsCollection;
use App\Tag;

class SelectController extends Controller
{


    public function category_selector(Request $request) {

        $term = $request->input('search');

        $query = Category::orderby('created_at', 'desc');

        if($request->has('search') && isset($request->search)) {
            $query->where('title', 'LIKE', '%' . $term . '%');
        }

        $query = $query->paginate(100);

        return CategoryCollection::collection($query);
    }

    public function tags_selector(Request $request) {

        $term = $request->input('search');

        $query = Tag::orderby('created_at', 'desc');

        if ($request->has('search') && isset($request->search)) {
            $query->where('title', 'LIKE', '%' . $term . '%');
        }

        $query = $query->paginate(100);

        return TagsCollection::collection($query);
    }
}
