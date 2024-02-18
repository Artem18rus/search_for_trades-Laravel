<?php

namespace App\Http\Controllers;

use App\Models\InfoLot;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LotController extends Controller
{

    public function index()
    {
        return view('index');
    }
    public function store(Request $request)
    {
        $numberBidding= $request->input('number_bidding');
        $numberLot= $request->input('number_lot');
        function curl_cookie($url) {
            $ch = curl_init();
    
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT'].'/cookie.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, $_SERVER['DOCUMENT_ROOT'].'/cookie.txt');
        
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        $html = curl_cookie("https://nistp.ru/?lot_description=&trade_number=$numberBidding&lot_number=$numberLot&debtor_info=&arbitr_info=&app_start_from=&app_start_to=&app_end_from=&app_end_to=&trade_type=Любой&trade_state=Любой&trade_org=&pagenum=");
        echo $html;
        echo "<script type='text/javascript' src='js/pickIdValue.js'></script>";
    }

    public function showTotalPage(Request $request)
    {
        $idLot = $request->input('id_lot');
        function curl_id_lot($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT'].'/cookie.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, $_SERVER['DOCUMENT_ROOT'].'/cookie.txt');
        
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        $htmlIdLot = curl_id_lot("https://nistp.ru/bankrot/trade_view.php?trade_nid=$idLot");
        echo $htmlIdLot;

        echo "<script type='text/javascript' src='js/showTotalPage.js'></script>";
    }
    public function lot_not_found()
    {
        return view('/lot_not_found');
    }
}
