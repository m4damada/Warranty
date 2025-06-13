<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistSubRoll as hist_sub;
// use App\Models\Warranty as warranty;
// use App\Models\SubRoll as sub_roll;
// use App\Models\M_Roll as m_roll;
use Carbon\Carbon;


class HistSubrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = hist_sub::join('warranty as a','hist_sub_roll.id_warranty','=','a.id')
                        ->join('sub_rolls as b','hist_sub_roll.id_sub_roll','=','b.id')
                        ->leftJoin('m_rolls as c','b.id_m_roll','=','c.id')
                        ->leftJoin('produk as d','c.id_produk','=','d.id')
                        ->leftJoin('users as e','hist_sub_roll.create_id','=','e.id')
                        ->select('hist_sub_roll.kode_sub_roll','c.roll_name','d.nama_produk','a.*',
                                'e.name as user_input','hist_sub_roll.created_at as tgl_input')
                        ->orderBy('hist_sub_roll.created_at','desc')
                        ->paginate(25);

        return view('hist.index',compact('data'));
    }
    
    public function getData(Request $request)
    {
        $length = $request->input('length');
        $start = $request->input('start');
        $searchValue = $request->input('search')['value'];

        // Ambil data dengan pagination
        $query = hist_sub::join('warranty as a','hist_sub_roll.id_warranty','=','a.id')
                        ->join('sub_rolls as b','hist_sub_roll.id_sub_roll','=','b.id')
                        ->leftJoin('m_rolls as c','b.id_m_roll','=','c.id')
                        ->leftJoin('produk as d','c.id_produk','=','d.id')
                        ->leftJoin('users as e','hist_sub_roll.create_id','=','e.id')
                        ->select('hist_sub_roll.kode_sub_roll','c.roll_name','d.nama_produk','a.*',
                                'e.name as user_input','hist_sub_roll.created_at as tgl_input');
                            
        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('kode_sub_roll', 'like', '%' . $searchValue . '%');
            });
        }
        
        $totalRecords = $query->count(); // Hitung total records tanpa filter
        $data = $query->skip($start)->take($length)->get(); // Ambil data sesuai pagination

        // Debugging: periksa data yang akan dikembalikan
        \Log::info($data);
        
        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data
        ]);
    }
}
