<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowServiceController extends Controller
{
    public function showService($id)
    {
        // Get the service
        $service = DB::table('service')->where('id', $id)->first();

        if (!$service) {
            return abort(404);
        }

        // Get service icons with heading and sub heading
        $serviceIcons = DB::table('service_icon')
            ->where('service_id', $service->id)
            ->get();

        return view(
            'Service.serviceShow',
            [
                'service' => $service,
                'serviceIcons' => $serviceIcons,
                'title' => "$service->service_name Service Details"
            ]
        );
    }
    public function serviceOrder(Request $request, $service_id)
    {
        return view('Service/serviceOrder', ['service_id' => $service_id]);
    }
}