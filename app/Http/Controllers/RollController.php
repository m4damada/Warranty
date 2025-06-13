<?php

namespace App\Http\Controllers;

use App\Models\M_Roll as m_roll;
use App\Models\Sub_Roll as sub_roll;
use App\Models\ProgramStudi as produk;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class RollController extends Controller
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


    // start m_roll
    public function m_roll()
    {
        $data = m_roll::all();
        $produk = produk::all();

        return view('roll.m_roll_index', compact('produk','data'));
    }

    public function getDataRoll(Request $request)
    {
        $length = $request->input('length');
        $start = $request->input('start');
        $searchValue = $request->input('search')['value'];

        // Ambil data dengan pagination
        $query = m_roll::with('produk');
        
        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('roll_name', 'like', '%' . $searchValue . '%')
                  ->orWhereHas('produk', function($q) use ($searchValue) {
                      $q->where('nama_produk', 'like', '%' . $searchValue . '%');
                  });
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

    public function simpan_m_roll(Request $request)
    {
        try {
            $cek_roll = m_roll::where('roll_name', $request->roll_name)
                                    ->where('id_produk', $request->id_produk)
                                    ->first();

            $get_produk_name = produk::where('id',$request->id_produk)->value('nama_produk');

            if ($cek_roll) {
                return redirect()->back()->with('warning', 'Master Roll di Produk '.$get_produk_name.' Telah Terdaftar!');
            }

            $data = $request->all();
            $data['create_id'] = auth()->user()->id;

            m_roll::create($data);
    
            return redirect('/data-m_roll')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            // Log::error('Error saat menyimpan user: ' . $e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Data Tidak Tersimpan, Periksa kembali inputan ada!');
        }
    }

    public function editRoll($id)
    {
        $data = m_roll::where('id',$id)->first();
        $produk = produk::all();

        return view('roll.edit_m_roll',compact('data','produk'));
    }

    public function edit_m_roll(Request $request)
    {
        try {
            $checkkategori = m_roll::where('roll_name', $request->roll_name)
                                ->where('id','!=',$request->id)
                                ->first();
            if ($checkkategori) {
                return redirect()->back()->with('warning', 'Tipe Telah Terdaftar!');
            }

            $data = $request->all();
            $data['is_aktif'] = $request->is_aktif ?? 0;
            $data['modify_id'] = auth()->user()->id;
            $data['updated_at'] = Carbon::now();

            m_roll::find($request->id)->update($data);

            return redirect('/data-m_roll')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Data Gagal Diubah, Periksa kembali inputan ada!');
        }
    }

    function generateRoll(Request $request)
    {
        $jumlah = $request->query('jumlah', 5);
        $produk = $request->query('produk');

        try {
            $count = m_roll::where('id_produk', $produk)->count();

            $kodeList = [];
            $cekCount = 0;

            while ($cekCount < $jumlah) {
                $newId = $count + 1;
                $kode = str_pad($newId, 4, '0', STR_PAD_LEFT);

                $cek_rollname = m_roll::where('roll_name', $kode)->where('id_produk', $produk)->first();
                if (!$cek_rollname) {
                    $kodeList[] = [
                        'roll_name' => $kode,
                        'id_produk' => $produk,
                        'create_id' => auth()->user()->id,
                    ];
                    $count++;
                    $cekCount++;
                } else {
                    $count++;
                }
            }

            m_roll::insert($kodeList);
            return redirect('/data-m_roll')->with('success', 'Berhasil Generate Data Roll!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Gagal Generate Data Roll!');
        }
    }

    public function hapus_m_roll($id)
    {
        //$dataUser = ProfileUsers::all();
        try {
            $data = m_roll::find($id);
            $data->delete();
            return redirect('/data-m_roll')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus!');
        }
    }
    // end m_roll

    // start sub_roll
    public function sub_roll()
    {
        $m_roll = m_roll::join('produk', 'm_rolls.id_produk', '=', 'produk.id')
                  ->select('m_rolls.id', 'm_rolls.roll_name', 'produk.nama_produk')
                  ->groupBy('produk.nama_produk', 'm_rolls.id', 'm_rolls.roll_name')
                  ->get();
        $data = sub_roll::all();

        return view('roll.sub_roll_index', compact('data','m_roll'));
    }

    public function getDataSub(Request $request)
    {
        $length = $request->input('length');
        $start = $request->input('start');
        $searchValue = $request->input('search')['value'];

        // Ambil data dengan pagination
        $query = sub_roll::with(['m_roll.produk']);
        
        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('kode_sub_roll', 'like', '%' . $searchValue . '%')
                  ->orWhereHas('m_roll', function($q) use ($searchValue) {
                      $q->where('roll_name', 'like', '%' . $searchValue . '%')
                        ->orWhereHas('produk', function($q) use ($searchValue) {
                            $q->where('nama_produk', 'like', '%' . $searchValue . '%');
                        });
                  });
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

    public function simpan_sub_roll(Request $request)
    {
        try {

            $id_m_roll  = explode('-',$request->id_m_roll);
            $id_produk  = m_roll::join('produk','m_rolls.id_produk','=','produk.id')
                                    ->select('produk.id_produk')
                                    ->where('m_rolls.id',$id_m_roll[0])
                                    ->first()->id_produk ?? '';

            $cek_abjad  = sub_roll::where('id_m_roll',$id_m_roll[0])
                                    ->first()
                                    ->kode_sub_roll ?? '';

            $char  = explode('-',$cek_abjad)[2] ?? '';

            if($char == 'Z'){
                return redirect()->back()->with('error', 'Data Sudah Mencapai Jumlah Maksimal!');
            }

            $kodeHuruf  = $this->getKodeHuruf($char);

            $kode = $id_produk.'-'.$id_m_roll[1].'-'.$kodeHuruf;

            sub_roll::create([
                'kode_sub_roll' =>$kode,
                'id_m_roll'     => $id_m_roll[0],
                'create_id'     => auth()->user()->id,
            ]);
    
            return redirect('/data-roll')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            // Log::error('Error saat menyimpan user: ' . $e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Data Tidak Tersimpan, Periksa kembali inputan ada!');
        }
    }

    function getKodeHuruf($char)
    {
        if($char == 'Z'){
            return redirect()->back()->with('error', 'Data Sudah Mencapai Jumlah Maksimal!');
        }

        if($char == ''){
            $char = chr(65 + 0);
        }else{
            $counter_char = ord(strtoupper($char)) - ord('A') + 1;

            $char = chr(65 + $counter_char);
        }

        return $char;
    }

    function generateSubRoll(Request $request)
    {
        $jumlah = $request->query('jumlah', 5);
        $produk = $request->query('produk');

        try {
            
            $id_m_roll = explode('-',$produk);

            $id_produk = m_roll::join('produk', 'm_rolls.id_produk', '=', 'produk.id')
                                ->select('produk.id_produk')
                                ->where('m_rolls.id', $id_m_roll[0])
                                ->first()->id_produk ?? '';

            $lastSubRoll = sub_roll::where('id_m_roll', $id_m_roll[0])
                                    ->orderBy('kode_sub_roll', 'desc')
                                    ->first();
            $char = $lastSubRoll ? explode('-', $lastSubRoll->kode_sub_roll)[2] : '';

            $kodeList = [];
            for ($i = 0; $i < $jumlah; $i++) {
                $char = $this->getKodeHuruf($char);
                $kode = $id_produk . '-' . $id_m_roll[1] . '-' . $char;
                $kodeList[] = [
                    'kode_sub_roll' => $kode,
                    'id_m_roll'     => $id_m_roll[0],
                    'create_id'     => auth()->user()->id,
                ];
            }

            sub_roll::insert($kodeList);
            return redirect('/data-roll')->with('success', 'Berhasil Generate Data Roll!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Gagal Generate Data Roll!');
        }
    }

    function hapus_sub_roll($id)
    {
        try {
            $data = sub_roll::find($id);
            $data->delete();
            return redirect('/data-roll')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus!');
        }
    }

    public function get_data_produk(Request $req)
    {
        $from = $req->query('from','');
        $roll_name = $req->query('roll_name','');

        if($from != 'sub_roll'){
            $produk = produk::select('id','nama_produk')->get();
            
            return response()->json($produk);
        }else{
            $data = m_roll::join('produk','m_rolls.id_produk','=','produk.id')
                        ->select('produk.nama_produk','m_rolls.id','m_rolls.roll_name')
                        ->get();

            return response()->json($data);
        }
    }
    // end sub_roll
}
