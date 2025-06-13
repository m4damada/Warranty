<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Warranty;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Models\WindowFilms;
use App\Models\Reseller;
use App\Models\Tipe;
use App\Models\Sub_Roll as sub_roll;
use App\Models\HistSubRoll as hist_sub;
use Carbon\Carbon;
use App\Mail\ClaimSubmitted;
use Illuminate\Support\Facades\Mail;


class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function claim(Request $request)
    {
        $check = Warranty::with('tipe_mobil.merek')
                ->leftJoin('sub_rolls as b', 'warranty.ppf', '=', 'b.id')
                ->leftJoin('sub_rolls as c', 'warranty.front_window', '=', 'c.id')
                ->leftJoin('sub_rolls as d', 'warranty.side_window', '=', 'd.id')
                ->leftJoin('sub_rolls as e', 'warranty.back_window', '=', 'e.id')
                ->leftJoin('sub_rolls as f', 'warranty.panoramic', '=', 'f.id')
                ->leftJoin('m_rolls as g', 'b.id_m_roll', '=', 'g.id')
                ->leftJoin('m_rolls as h', 'c.id_m_roll', '=', 'h.id')
                ->leftJoin('m_rolls as i', 'd.id_m_roll', '=', 'i.id')
                ->leftJoin('m_rolls as j', 'e.id_m_roll', '=', 'j.id')
                ->leftJoin('m_rolls as k', 'f.id_m_roll', '=', 'k.id')
                ->leftJoin('produk as l', 'g.id_produk', '=', 'l.id')
                ->leftJoin('produk as m', 'h.id_produk', '=', 'm.id')
                ->leftJoin('produk as n', 'i.id_produk', '=', 'n.id')
                ->leftJoin('produk as o', 'j.id_produk', '=', 'o.id')
                ->leftJoin('produk as p', 'k.id_produk', '=', 'p.id')
                ->select(
                    'warranty.*',
                    'l.nama_produk as ppf_name',
                    'm.nama_produk as front',
                    'n.nama_produk as side',
                    'o.nama_produk as back',
                    'p.nama_produk as panoramic'
                )
                ->where('warranty.code', $request->code)
                ->first();

        $mereks = Merek::all();
        $windowfilms = WindowFilms::all();
        // $produk_ppf = ProgramStudi::where('kategori_produk','=','3')->get();
        $produk_ppf = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                            ->join('produk','m_rolls.id_produk','=','produk.id')
                            ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','produk.nama_produk','m_rolls.roll_name')
                            ->where('produk.kategori_produk',3)
                            ->where('is_pakai','!=',1)
                            ->get();
                            
        $produk_window = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                            ->join('produk','m_rolls.id_produk','=','produk.id')
                            ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','produk.nama_produk','m_rolls.roll_name')
                            ->where('produk.kategori_produk',1)
                            ->where('is_pakai','!=',1)
                            ->get();

        $produk_panoramic = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                            ->join('produk','m_rolls.id_produk','=','produk.id')
                            ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','produk.nama_produk','m_rolls.roll_name')
                            ->where('produk.kategori_produk',5)
                            ->where('is_pakai','!=',1)
                            ->get();
        // $produk_window = ProgramStudi::where('kategori_produk','=','1')->get();
        $reseller = Reseller::all();
        $tipe = Tipe::all();

        if ($check == null) {
            return redirect('e-warranty')->withErrors(['code' => 'Kode Garansi tidak ditemukan, silakan dicek kembali!']);
        }
    
        if ($check->status == 'pending') {
            Mail::to($check->email)->send(new ClaimSubmitted($check));
            return view('tunggu', compact('check'));
        } elseif ($check->status == 'claimed') {
            return view('udah', compact('check'));
        } else {
            // Kirim email setelah klaim berhasil
    
            return view('klaim', compact(
                'check', 'mereks', 'windowfilms', 
                'produk_ppf', 'produk_window', 
                'reseller', 'tipe', 'produk_panoramic'
            ));
        }
    }

    public function warrantyCountdown($code,$parts)
    {
        switch ($parts) {
            case 'front':
                $windowParts = 'front_window';
                break;
            case 'side':
                $windowParts = 'side_window';
                break;
            case 'back':
                $windowParts = 'back_window';
                break;
            case 'ppf':
                $windowParts = 'ppf';
                break;
            case 'panoramic':
                $windowParts = 'panoramic';
                break;
            default:
                // Jika nilai $parts tidak valid, kembalikan pesan kesalahan
                return "Nilai $parts tidak valid";
        }

        // $data = Warranty::where('code', $code)
        // ->leftJoin('produk as a',"warranty.$windowParts",'=','a.id')
        // ->leftJoin('m_warranties as b','a.tipe_warranty','=','b.id')
        // ->select('warranty.tgl_verif','a.is_lifetime','b.tahun_berlaku','a.nama_produk','a.tipe_warranty')
        // ->first();

        $data = Warranty::where('code',$code)
                        ->leftJoin('sub_rolls as a',"warranty.$windowParts",'=','a.id')
                        ->leftJoin('m_rolls as b','a.id_m_roll','=','b.id')
                        ->leftJoin('produk as c','b.id_produk','=','c.id')
                        ->leftJoin('m_warranties as d','c.tipe_warranty','=','d.id')
                        ->select('warranty.tgl_verif','c.is_lifetime','d.tahun_berlaku','c.nama_produk','c.tipe_warranty')
                        ->first();

        if($data->is_lifetime == true) {
            $remaining = 'Garansi Seumur Hidup';
        } elseif ($data->tipe_warranty != null) {
            $verifikasi = Carbon::parse($data->tgl_verif);
            $endDate = $verifikasi->copy()->addYears($data->tahun_berlaku);
            
            if (Carbon::now()->greaterThan($endDate)) {
                $remaining = "Garansi telah berakhir";
            }
            // Hitung sisa masa garansi dengan metode diff
            $diff = Carbon::now()->diff($endDate);
            $years = $diff->y;
            $months = $diff->m;
            $days = $diff->d;

            $remaining = "$years tahun, $months bulan, $days hari";
        } else {
            $remaining = "-";
        }

        return $remaining;
    }

    public function mauklaim($code)
    {
        $check = Warranty::where('code', $code)->first();
        return view('klaim', compact('check'));
    }

    public function tunggu($code)
    {
        $data = Warranty::where('code', $code)->first();
        return view('tunggu', compact('data'));
    }

    public function udah($code)
    {
        $data = Warranty::where('code', $code)->first();
        return view('udah', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warranty  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Warranty $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warranty  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Warranty $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warranty  $resource
     * @return \Illuminate\Http\Response
     */
    public function claimadmin($code)
    {
        Warranty::where('code', $code)->update([
            'status' => 'claimed'
        ]);
        $check = Warranty::where('code', $code)->first();
        return view('udah', compact('check'));
    }
    public function update(Request $request, $code)
    {
        Warranty::where('code', $code)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'email' => $request->email,
            'handphone' => $request->handphone,
            'alamat' => $request->alamat,
            'alamat_reseller' => $request->alamat_reseller,
            'handphone_reseller' => $request->handphone_reseller,
            'tipe' => $request->tipe,
            'nomor_rangka' => $request->nomor_rangka,
            'nomor_plat' => $request->nomor_plat,
            'ppf' => $request->ppf,
            'front_window' => $request->front_window,
            'side_window' => $request->side_window,
            'back_window' => $request->back_window,
            'panoramic' => $request->panoramic,
            'tgl_pemasangan' => Carbon::createFromFormat('d-m-Y', $request->tgl_pasang)->format('Y-m-d'),
            'status' => 'pending'
        ]);

        $data_sub = [];
        if($request->ppf != null)$data_sub[] = $request->ppf;
        if($request->front_window != null)$data_sub[] = $request->front_window;
        if($request->side_window != null)$data_sub[] = $request->side_window;
        if($request->back_window != null)$data_sub[] = $request->back_window;
        if($request->panoramic != null)$data_sub[] = $request->panoramic;

        $count_sub = count($data_sub);
        for($i = 0; $i < $count_sub; $i++){
            
            sub_roll::where('id',$data_sub[$i])->update(['is_pakai'=>1]);
            
            $kode_sub = sub_roll::select('sub_rolls.kode_sub_roll')
                                ->where('id',$data_sub[$i])
                                ->first()->kode_sub_roll;

            $id_warranty = Warranty::where('code',$code)->first()->id;
            hist_sub::create([
                'id_sub_roll'   => $data_sub[$i],
                'kode_sub_roll' => $kode_sub,
                'id_warranty'   => $id_warranty,
                'create_id'     => auth()->user()->id
            ]);
        }

        return view('tunggu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warranty  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warranty $resource)
    {
        //
    }
}
