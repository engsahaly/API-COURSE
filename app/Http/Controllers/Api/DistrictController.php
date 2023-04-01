<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $ditricts = District::where('city_id', $request->input('city'))->get();
        if (count($ditricts) > 0) {
            return ApiResponse::sendResponse(200, 'Districts retrieved successfully', DistrictResource::collection($ditricts));
        }
        return ApiResponse::sendResponse(200, 'districts for this city is empty', []);
    }
}
