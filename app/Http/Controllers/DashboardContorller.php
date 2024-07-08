<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\log;
use Carbon\Carbon;
use PHPUnit\TextUI\XmlConfiguration\Group;

class DashboardContorller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function webhook(Request $request)
	{
		log::debug('event_type'.$request->input('event_type'));
		return $request->input('event_type');
	}
    public function index()
    {
        $today =Carbon::now();
        // dd($carbon);
        $amt = DB::table('partners_aianalytics')->sum('amount');
		 $amount =round($amt,2);
        $transactions = DB::table('partners_aianalytics')->count();
         $date=date_format($today,'Y-m-d');
        $report = DB::table('partners_aidailystats') 
         ->where('date',$date)
         ->select(DB::raw('sum(sales) as sales, 
          sum(alerts) as alerts,sum(transactions) as transactions'))->get()->toArray();       
        // dd($report);
        
        return view('admin.dashboard',compact('report','amount','transactions'));
    }
    public function Client_Sales()
    {
        $from =   date('Y-m-d', strtotime('-30 days'));
		$to   =     date('Y-m-d', strtotime('+1 day'));
       
    $users = DB::table('partners_aianalytics')
    ->Join('av_usermeta', 'partners_aianalytics.mid', '=', 'av_usermeta.user_id')
    ->select(DB::raw('count(*) as transactions,round(sum(amount),2) as value, mid,user_meta as name'))
    //->where('mid','0')
    ->whereBetween('createdate',[$from,$to])
    ->where('user_key', '=', 'av_company')
    ->groupBy('user_meta','mid')
	->orderBy('transactions','desc')
    ->get();
        return response()->json($users);
    }
	 public function statEarnings()
    {
        $from =   date('Y-m-d', strtotime('-30 days'));
        $to   =     date('Y-m-d', strtotime('+1 day'));
      // 2022-06-15-----2022-07-16
        $data = DB::table('partners_aianalytics')
            ->select(DB::raw('count(*) as transactions, (count(*)*0.01) as earningestimate, 
			DATE_FORMAT(createdate, "%M %d %Y") as formatdate'))
            ->whereBetween('createdate',[$from,$to])
            ->groupBy('formatdate')
			->orderBy('createdate','asc')
            ->get();
        return $data;
    }
	   public function salesLocation()
    {
        $from =   date('Y-m-d', strtotime('-30 days'));
        $to   =     date('Y-m-d', strtotime('+1 day'));
        $data = DB::table('partners_aianalytics')
            ->selectRaw('location, city, region, country, count(orderid) as ordercount')
            ->where('location', '<>', '')
            ->whereBetween('createdate',[$from,$to])
            ->groupBy('location', 'city', 'region', 'country')
            ->orderBy('createdate', 'DESC')
            ->get();
        // return $result;
        $newarr = array();
        $finalarr = array();
        for ($i = 0; $i < count($data); $i++) {
            $latlng[] = explode(",", $data[$i]->location);
            $newarr['city'] =  $data[$i]->city;
            $newarr['country'] =  $data[$i]->country;
            $newarr['region'] =  $data[$i]->region;
           
            if ($latlng != "") {
                $newarr['latitude'] = floatval($latlng[$i][0]);
                if (!isset($latlng[$i][1])) {
                    $newarr['longitude'] = '0';
                } else {
                    $newarr['longitude'] = floatval($latlng[$i][1]);
                }
                 $newarr['color'] =  '#'.dechex(rand(0x000000, 0xFFFFFF));
            }

            $finalarr[] = $newarr;
        }
        return $finalarr;

    }
}
