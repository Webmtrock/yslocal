<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\ResponseBuilder;
use App\Helper\Helper;
use App\Models\Category;
use Lang;

// use Laravel\Socialite\Facades\Socialite;

class CategoriesController extends Controller
{
    /**
     * User Register Function
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   protected $badRequest = 400;
   protected $success = 200;

    public function categoriesList(Request $request)
    {
        try {
            //  $pagination = isset($request->pagination) ? $request->pagination : 12;
            $perPage = $request->perPage;
            $currentPage = $request->currentPage;
            $data = Category::where('status', 1)->paginate($perPage, ['*'], 'page', $currentPage);

            // $data = Category::where('status', 1)->paginate($pagination);
            if ($data->isEmpty()) {
                return ResponseBuilder::successWithPagination([], [], trans('global.no_categories'), $this->success);
            }
            $this->response = new CategoryCollection($data);
            return ResponseBuilder::successWithPagination($data, $this->response, trans('global.all_categories'), $this->success);
        } catch (\Exception $e) {
            return ResponseBuilder::error(trans('global.SOMETHING_WENT'), $this->badRequest);
        }
        
    }
}
