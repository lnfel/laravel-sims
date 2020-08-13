<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth:account');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $user = Auth::user();

    return view('dashboard', compact('user'));
  }

  public function employee()
  {
    // moved to Employee.php
  }

  public function getProvinces($region_code)
  {
    $provinces = DB::table('philippine_provinces')->where('region_code', $region_code)->pluck('province_description', 'province_code');
    return json_encode($provinces);
  }

  public function getCities($province_code)
  {
    $cities = DB::table('philippine_cities')->where('province_code', $province_code)->pluck('city_municipality_description', 'city_municipality_code');
    return json_encode($cities);
  }

  public function getBarangays($city_municipality_code)
  {
    $barangays = DB::table('philippine_barangays')->where('city_municipality_code', $city_municipality_code)->pluck('barangay_description', 'barangay_code');
    //$barangays = DB::table('philippine_barangays')->get();
    return json_encode($barangays);
  }
}
