<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
        $data['dealers'] = Dealer::where('dealer_status', 1)
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('Dealer/dealer', $data);
    }
    public function BecomeADealer()
    {

        $data['modules'] = ['Setup/addDealer.js'];
        return view('Dealer/becomeDealer', $data);
    }
}