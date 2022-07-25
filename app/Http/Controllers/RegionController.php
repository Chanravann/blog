<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RegionController extends Controller
{
    public function index(){
        //raw query
        // $regions = DB::select("SELECT tbl_regions.name, COUNT(tbl_customers.id) as total
        //     FROM tbl_customers 
        //     INNER JOIN tbl_regions 
        //     ON tbl_customers.regions_id=tbl_regions.id 
        //     GROUP BY tbl_regions.name");
        $regions = DB::table('tbl_customers')
            ->join('tbl_regions', 'tbl_customers.regions_id', 'tbl_regions.id')
            ->select('tbl_regions.name', DB::raw("count(tbl_customers.id) as total"))//raw expression
            ->groupBy('tbl_regions.name')
            ->paginate(2);
        return view('regions.index', compact("regions"));
    }
}
