<?php

namespace App\Http\Controllers;

use App\Models\InfoLot;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoLotController extends Controller
{
    public function store(Request $request)
    {
        $linkPage = $request->input('linkPage');
        $informationPropertyRes = $request->input('informationPropertyRes');
        $initialPrice = $request->input('initialPrice');
        $eMail = $request->input('eMail');
        $phone = $request->input('phone');
        $inn = $request->input('inn');
        $numberBankruptcyCase = $request->input('numberBankruptcyCase');
        $tradingDate = $request->input('tradingDate');

        $allLot = DB::table('info_lots')->get();
        foreach ($allLot as $key => $value) {
            if($value->link_page == $linkPage && $value->information_property == $informationPropertyRes && $value->initial_price == $initialPrice && $value->e_mail == $eMail && $value->phone == $phone && $value->inn == $inn && $value->number_bankruptcy_case == $numberBankruptcyCase && $value->trading_date == $tradingDate) {
                DB::table('info_lots')->where('id', '=', $value->id)->delete();
            }
        }
        $lot = new InfoLot;
        $lot->link_page = $linkPage;
        $lot->information_property = $informationPropertyRes;
        $lot->initial_price = $initialPrice;
        $lot->e_mail = $eMail;
        $lot->phone = $phone;
        $lot->inn = $inn;
        $lot->number_bankruptcy_case = $numberBankruptcyCase;
        $lot->trading_date = $tradingDate;
        $lot->save();

        return redirect()->action([LotController::class, 'index']);
    }
}
