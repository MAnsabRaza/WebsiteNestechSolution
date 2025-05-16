<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\inward;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiServicOrderController extends Controller
{
    public function saveServiceOrder(Request $request)
    {
        try {
            $data = $request->all();

            $serviceOrder = new ServiceOrder();
            $serviceOrder->service_id = $data['service_id'];
            $serviceOrder->current_date = $data['current_date'];
            $serviceOrder->email = $data['email'];
            $serviceOrder->first_name = $data['first_name'];
            $serviceOrder->last_name = $data['last_name'];
            $serviceOrder->phone = $data['phone'];
            $serviceOrder->address = $data['address'];
            $serviceOrder->city = $data['city'];
            $serviceOrder->postal_code = $data['postal_code'];
            $serviceOrder->country = $data['country'];
            $serviceOrder->status = 0;
            $serviceOrder->save();
            return response()->json([
                'success' => true,
                'message' => 'Service order saved successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving the order. Please try again.',
                'error' => $e->getMessage(),
            ]);
        }
    }
    public function fetchServiceOrderStatusActive()
    {
        $serviceOrder = inward::fetchServiceOrderStatusActive();
        return DataTables::of($serviceOrder)->make(true);
    }
    public function fetchServiceOrderStatusInActive()
    {
        $serviceOrder = inward::fetchServiceOrderStatusInActive();
        return DataTables::of($serviceOrder)->make(true);
    }
    public function deleteServiceOrderStatus($id)
    {
        $serviceOrder = ServiceOrder::find($id);
        if ($serviceOrder) {
            $serviceOrder->delete();
            return response()->json(['success' => true, 'message' => 'Service Order deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Service Order not found!']);
        }
    }
    public function updateServiceOrderStatus(Request $request, $id)
    {
        $serviceOrder = ServiceOrder::find($id);
        if ($serviceOrder) {
            $serviceOrder->status = $request->status;
            $serviceOrder->save();
            return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Service Order not found!']);
    }
}
