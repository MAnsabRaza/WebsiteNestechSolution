<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\inward;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApiDealerController extends Controller
{
    public function saveDealer(Request $request)
    {
        if ($request->voucher_type == 'edit' && $request->has('id')) {
            $dealer = Dealer::find($request->id);
            if ($dealer) {
                $this->inputDealerField($dealer, $request);
                $dealer->save();
                return response()->json(['success' => true, 'message' => 'Dealer updated successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Dealer not found'], 404);
            }
        } else {
            $dealer = new Dealer();
            $this->inputDealerField($dealer, $request);
            $dealer->save();
            return response()->json(['success' => true, 'message' => 'Dealer saved successfully']);
        }
    }

    private function inputDealerField($dealer, Request $request)
    {
        $dealer->voucher_type = $request->voucher_type;
        $dealer->current_date = $request->current_date;
        $dealer->dealer_name = $request->dealer_name;
        $dealer->dealer_email = $request->dealer_email;
        $dealer->dealer_phone = $request->dealer_phone;
        $dealer->dealer_city = $request->dealer_city;
        $dealer->dealer_country = $request->dealer_country;
        $dealer->dealer_area = $request->dealer_area;
        $dealer->dealer_office_address = $request->dealer_office_address;
        $dealer->dealer_status = $request->dealer_status ?? 0;
        if ($request->hasFile('dealer_image')) {
            $file = $request->file('dealer_image');
            $imageType = $file->getClientOriginalExtension();
            $imageData = 'data:image/' . $imageType . ';base64,' . base64_encode(file_get_contents($file));
            $dealer->dealer_image = $imageData;
        }
    }
    public function updateDealerStatus(Request $request, $id)
    {
        $dealer = Dealer::find($id);
        if ($dealer) {
            // Change to match the JavaScript payload
            $dealer->dealer_status = $request->input('status');
            $dealer->save();
            return response()->json(['success' => true, 'message' => 'Dealer status updated successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Dealer not found'], 404);
    }
    public function deleteDealer($id)
    {
        $dealer = Dealer::find($id);
        if ($dealer) {
            $dealer->delete();
            return response()->json(['success' => true, 'message' => 'Dealer  deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Dealer  not found'], 404);
        }
    }
    public function fetchDealerStatusActive()
    {
        $dealer = inward::fetchDealerStatusActive();
        return DataTables::of($dealer)->make(true);
    }
    public function fetchDealerStatusInActive()
    {
        $dealer = inward::fetchDealerStatusInActive();
        return DataTables::of($dealer)->make(true);
    }
}