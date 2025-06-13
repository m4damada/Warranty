<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\ProfileUsers;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MerekController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('warning')) {
                Alert::warning(session('warning'));
            }
            return $next($request);
        });
    }

    public function index()
    {
        $data = Merek::all();
        $kode = ProfileUsers::id();
        // dd($data);

        return view('merek.index', compact('data','kode'));
    }
    
    public function getData(Request $request)
    {
        $length = $request->input('length');
        $start = $request->input('start');
        $searchValue = $request->input('search')['value'];

        // Ambil data dengan pagination
        $query = Merek::query();
        
        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('name', 'like', '%' . $searchValue . '%');
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

    public function store(Request $request)
    {
        try {
            $checkmerek = Merek::where('name', $request->name)->first();
            if ($checkmerek) {
                return redirect()->back()->with('warning', 'Merek Telah Terdaftar!');
            }
            Merek::create([
                'name' => $request->name,
            ]);

            return redirect('/data-merek')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Tersimpan, Periksa kembali inputan ada!');
        }
    }

    public function edit($id)
    {
        $data = Merek::where('id',$id)->first();
        
        return view('merek.edit', compact('data'));
    }

    public function update(Request $request)
    {
        try {
            $checkmerek = Merek::where('name', $request->name)->where('id','!=',$request->id)->first();
            if ($checkmerek) {
                return redirect()->back()->with('warning', 'Merek Telah Terdaftar!');
            }
            Merek::find($request->id)->update([
                'name' => $request->name,
            ]);

            return redirect('/data-merek')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah, Periksa kembali inputan ada!');
        }
    }

    public function destroy($id)
    {
        //$dataUser = ProfileUsers::all();
        try {
            $dataMerek = Merek::find($id);
            $dataMerek->delete();
            return redirect('/data-merek')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
        
    }
}
