<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\sale_client_leads;
use Illuminate\Support\Facades\DB;
class ContractController extends Controller
{
    public function getsale()
    {
      
    $client = DB::table('aa_sale_client_leads')
    ->join('aa_contract_signed', 'aa_contract_signed.sale_client_leadsID', '=','aa_sale_client_leads.id')
    ->join('aa_client_contract_info','aa_client_contract_info.consClient','=','aa_contract_signed.id')
    ->get();

    return view('test',compact('client'));
       dd($client);
    }
}
