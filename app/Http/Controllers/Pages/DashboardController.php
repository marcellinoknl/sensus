<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\head_of_family;
use Illuminate\Http\Request;
use App\Models\village;
use App\Models\member_of_family;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $villages = Village::all();
        $totalMembers = member_of_family::count();
        $totalHeadFamily = head_of_family::where('status_sensus', 1)->count();
        $totalHeadFamilyAll = head_of_family::count();
    
        $data = [];
        foreach ($villages as $village) {
            $count = DB::table('member_of_families')
            ->join('head_of_families', 'head_of_families.id', '=', 'member_of_families.head_of_family_id')
            ->join('villages', 'villages.id', '=', 'head_of_families.village_id')
            ->where('villages.id', $village->id)
            ->count();
            $income = head_of_family::where('village_id', $village->id)
                ->where('status_sensus', 1)
                ->sum('pendapatan');
    
            $expense = head_of_family::where('village_id', $village->id)
                ->where('status_sensus', 1)
                ->sum('pengeluaran');
    
            $data[] = [
                'village' => $village->village_name,
                'pendapatan' => $income,
                'pengeluaran' => $expense,
                'count' => $count
            ];
        }
    
        return view('pages.main', ['data' => $data, 'totalMembers' => $totalMembers, 'totalHeadFamily' => $totalHeadFamily, 'totalHeadFamilyAll' => $totalHeadFamilyAll]);
    }
}
