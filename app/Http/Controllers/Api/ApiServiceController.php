<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\inward;
use App\Models\Service;
use App\Models\service_icon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class ApiServiceController extends Controller
{
    public function saveService(Request $request)
    {
        try {
            if ($request->voucher_type == 'edit' && $request->has('id')) {
                $service = Service::find($request->id);
                if ($service) {
                    $this->inputServiceField($service, $request);
                    $service->save();

                    // Delete existing icons to replace with new ones
                    $service->serviceIcons()->delete();

                    // Save new icons
                    $this->saveServiceIcons($service, $request);

                    return response()->json(['success' => true, 'message' => 'Service updated successfully!']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Service not found!']);
                }
            } else {
                $service = new Service();
                $this->inputServiceField($service, $request);
                $service->save();

                // Save icons
                $this->saveServiceIcons($service, $request);

                return response()->json(['success' => true, 'message' => 'Service saved successfully!']);
            }
        } catch (\Exception $e) {
            Log::error('Error saving service: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error saving service: ' . $e->getMessage()], 500);
        }
    }

    private function inputServiceField($service, Request $request)
    {
        $service->current_date = $request->current_date;
        $service->voucher_type = $request->voucher_type;
        $service->service_name = $request->service_name;
        $service->status = $request->status;
        $service->service_title = $request->service_title;
        $service->service_description = $request->service_description;
        $service->service_icon = $request->service_icon;

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $imageType = $file->getClientOriginalExtension();
            $imageData = 'data:image/' . $imageType . ';base64,' . base64_encode(file_get_contents($file));
            $service->service_image = $imageData;
        }
    }

    private function saveServiceIcons($service, Request $request)
    {
        // Check if we have icon data
        if ($request->has('icon') && is_array($request->icon)) {
            $count = count($request->icon);

            for ($i = 0; $i < $count; $i++) {
                if (!empty($request->icon[$i])) {
                    $serviceIcon = new service_icon();
                    $serviceIcon->icon = $request->icon[$i];
                    $serviceIcon->icon_heading = $request->has('icon_heading') && isset($request->icon_heading[$i]) ? $request->icon_heading[$i] : '';
                    $serviceIcon->icon_sub_heading = $request->has('icon_sub_heading') && isset($request->icon_sub_heading[$i]) ? $request->icon_sub_heading[$i] : '';
                    $serviceIcon->service_id = $service->id;
                    $serviceIcon->save();
                }
            }
        }
    }

    public function fetchServiceSearchData()
    {
        $service = inward::fetchServiceSearchData();
        return DataTables::of($service)->make(true);
    }

    public function deleteService($id)
    {
        try {
            $service = Service::find($id);
            if ($service) {
                // Delete associated icons first
                $service->serviceIcons()->delete();
                // Then delete the service
                $service->delete();
                return response()->json(['success' => true, 'message' => 'Service deleted successfully!']);
            } else {
                return response()->json(['success' => false, 'message' => 'Service not found!']);
            }
        } catch (\Exception $e) {
            Log::error('Error deleting service: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error deleting service: ' . $e->getMessage()], 500);
        }
    }

    public function getMaxServiceId()
    {
        $id = Service::max('id') + 1;
        return response()->json(['id' => $id]);
    }

    public function fetchService($id)
    {
        try {
            $service = Service::with('serviceIcons')->find($id);

            if ($service) {
                if ($service->service_image) {
                    $service->base64_image = $service->service_image;
                }
                return response()->json(['success' => true, 'data' => $service]);
            } else {
                return response()->json(['success' => false, 'message' => 'Service not found!'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error fetching service: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error fetching service: ' . $e->getMessage()], 500);
        }
    }
}
