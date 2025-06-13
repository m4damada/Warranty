<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Tipe;
use App\Models\Pendaftaran;
use App\Models\ProfileUsers;
use App\Models\ProgramStudi;
use App\Models\Warranty;
use App\Models\Sub_Roll as sub_roll;
use App\Models\HistSubRoll as hist_sub;
use App\Models\Timeline;
use App\Models\User;
use App\Models\WindowFilms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class PendaftaranController extends Controller
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
        
        $data = Warranty::with('tipe_mobil.merek')
                            ->leftJoin('sub_rolls as v','warranty.panoramic','=','v.id')
                            ->leftJoin('sub_rolls as w','warranty.ppf','=','w.id')
                            ->leftJoin('sub_rolls as x','warranty.side_window','=','x.id')
                            ->leftJoin('sub_rolls as y','warranty.front_window','=','y.id')
                            ->leftJoin('sub_rolls as z','warranty.back_window','=','z.id')
                            ->select('warranty.*',
                                    'v.kode_sub_roll as pano',
                                    'w.kode_sub_roll as ppf_name',
                                    'x.kode_sub_roll as side',
                                    'y.kode_sub_roll as front',
                                    'z.kode_sub_roll as back')
                            ->get();
        // dd($data);
        $kode = ProfileUsers::id();
        $mereks = Merek::all();
        $tipes = Tipe::all();
        $res_window = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                                ->join('produk','m_rolls.id_produk','=','produk.id')
                                ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','sub_rolls.is_pakai','produk.nama_produk')
                                ->where('produk.kategori_produk',1)
                                ->get();
        $res_ppf = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                            ->join('produk','m_rolls.id_produk','=','produk.id')
                            ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','sub_rolls.is_pakai','produk.nama_produk')
                            ->where('produk.kategori_produk',3)
                            ->get();
        $res_panoramic = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                            ->join('produk','m_rolls.id_produk','=','produk.id')
                            ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','sub_rolls.is_pakai','produk.nama_produk')
                            ->where('produk.kategori_produk',5)
                            ->get();
        
        return view('pendaftaran.index', compact('data','kode','mereks','tipes','res_window','res_ppf','res_panoramic'));
    }
    
    public function getData(Request $request)
    {
        $length = $request->input('length');
        $start = $request->input('start');
        $searchValue = $request->input('search')['value'];

        // Ambil data dengan pagination
        $query = Warranty::leftJoin('mereks as a','warranty.merek','=','a.id')
                            ->leftJoin('tipes as b','warranty.tipe','=','b.id')
                            ->select('a.name as merek','b.name as tipe','warranty.id','warranty.code','warranty.status','warranty.nama','warranty.nomor_rangka','warranty.nomor_plat');
                            
        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('code', 'like', '%' . $searchValue . '%')
                    ->orWhere('nama', 'like', '%' . $searchValue . '%');
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
            $checkpendaftaran = Pendaftaran::where('name', $request->name)->first();
            if ($checkpendaftaran) {
                return redirect()->back()->with('warning', 'Garansi Telah Terdaftar!');
            }
            Pendaftaran::create([
                'name' => $request->name,
            ]);

            return redirect('/data-pendaftaran')->with('success', 'Data Tersimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Tersimpan, Periksa kembali inputan ada!');
        }
    }

    public function edit($id)
    {
        $data = Warranty::where('id',$id)->first();
        $mereks = Merek::all();
        $tipes = Tipe::all();
        $res_window = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                                ->join('produk','m_rolls.id_produk','=','produk.id')
                                ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','sub_rolls.is_pakai','produk.nama_produk')
                                ->where('produk.kategori_produk',1)
                                ->get();
        $res_ppf = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                            ->join('produk','m_rolls.id_produk','=','produk.id')
                            ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','sub_rolls.is_pakai','produk.nama_produk')
                            ->where('produk.kategori_produk',3)
                            ->get();
        $res_panoramic = sub_roll::join('m_rolls','sub_rolls.id_m_roll','=','m_rolls.id')
                            ->join('produk','m_rolls.id_produk','=','produk.id')
                            ->select('produk.id','produk.id_produk','sub_rolls.id as id_sub_roll','sub_rolls.kode_sub_roll','sub_rolls.is_pakai','produk.nama_produk')
                            ->where('produk.kategori_produk',5)
                            ->get();
                            
        return view('pendaftaran.edit', compact('data','res_window','res_ppf','res_panoramic','mereks','tipes'));
    }
    
    public function detail($id)
    {
        $data = Warranty::with('tipe_mobil.merek')
                            ->leftJoin('sub_rolls as v','warranty.panoramic','=','v.id')
                            ->leftJoin('sub_rolls as w','warranty.ppf','=','w.id')
                            ->leftJoin('sub_rolls as x','warranty.side_window','=','x.id')
                            ->leftJoin('sub_rolls as y','warranty.front_window','=','y.id')
                            ->leftJoin('sub_rolls as z','warranty.back_window','=','z.id')
                            ->select('warranty.*',
                                    'v.kode_sub_roll as pano',
                                    'w.kode_sub_roll as ppf_name',
                                    'x.kode_sub_roll as side',
                                    'y.kode_sub_roll as front',
                                    'z.kode_sub_roll as back')
                            ->where('warranty.id',$id)
                            ->first();
        $mereks = Merek::all();
        $tipes = Tipe::all();
                            
        return view('pendaftaran.detail', compact('data','mereks','tipes'));
    }

    public function update(Request $request)
    {
        try {
            $checkpendaftaran = Pendaftaran::where('nama', $request->nama)->where('id','!=',$request->id)->first();
            if ($checkpendaftaran) {
                return redirect()->back()->with('warning', 'Garansi Telah Terdaftar!');
            }
            // dd($request->all());
            // kalo pengen liat datanya

            $data_sub = [];
            if($request->ppf) $data_sub[] = $request->ppf;
            if($request->front_window) $data_sub[] = $request->front_window;
            if($request->side_window) $data_sub[] = $request->side_window;
            if($request->back_window) $data_sub[] = $request->back_window;
            if($request->panoramic) $data_sub[] = $request->panoramic;
            
            $count_sub = count($data_sub);
            for($i = 0; $i < $count_sub; $i++){
                $cek_ppf = Warranty::where('ppf',$data_sub[$i])
                                    ->where('id','!=',$request->id)->first();
                $cek_front = Warranty::where('front_window',$data_sub[$i])->first();
                $cek_side = Warranty::where('side_window',$data_sub[$i])->first();
                $cek_back = Warranty::where('back_window',$data_sub[$i])->first();
                $cek_panoramic = Warranty::where('panoramic',$data_sub[$i])
                                            ->where('id','!=',$request->id)->first();
                $data_warranty = Warranty::where('id',$request->id)->first();

                if($cek_ppf){
                    return redirect()->back()->with('warning', 'Data PPF sudah digunakan!');
                }else{
                    if($data_warranty->ppf != $request->ppf){
                        sub_roll::where('id',$data_warranty->ppf)->update(['is_pakai'=>0]);
                        hist_sub::where('id_sub_roll',$data_warranty->ppf)->delete();
                    }
                }

                if($cek_panoramic){
                    return redirect()->back()->with('warning', 'Data PPF sudah digunakan!');
                }else{
                    if($data_warranty->panoramic != $request->panoramic){
                        sub_roll::where('id',$data_warranty->panoramic)->update(['is_pakai'=>0]);
                        hist_sub::where('id_sub_roll',$data_warranty->panoramic)->delete();
                    }
                }

                if($cek_front && ($cek_front->front_window == $request->side_window || $cek_front->front_window == $request->back_window)){
                    return redirect()->back()->with('warning', 'Data Front Window sudah digunakan!');
                }else{
                    if($data_warranty->front_window != $request->front_window){
                        sub_roll::where('id',$data_warranty->front_window)->update(['is_pakai'=>0]);
                        hist_sub::where('id_sub_roll',$data_warranty->front_window)->delete();
                    }
                }

                if($cek_side && ($cek_side->side_window == $request->front_window || $cek_side->side_window == $request->back_window)){
                    return redirect()->back()->with('warning', 'Data Side Window sudah digunakan!');
                }else{
                    if($data_warranty->side_window != $request->side_window){
                        sub_roll::where('id',$data_warranty->side_window)->update(['is_pakai'=>0]);
                        hist_sub::where('id_sub_roll',$data_warranty->side_window)->delete();
                    }
                }

                if($cek_back && ($cek_back->back_window == $request->front_window || $cek_back->back_window == $request->side_window)){
                    return redirect()->back()->with('warning', 'Data Back Window sudah digunakan!');
                }else{
                    if($data_warranty->back_widow != $request->back_window){
                        sub_roll::where('id',$data_warranty->back_widow)->update(['is_pakai'=>0]);
                        hist_sub::where('id_sub_roll',$data_warranty->back_widow)->delete();
                    }
                }

                sub_roll::where('id',$data_sub[$i])->update(['is_pakai'=>1]);
            
                $kode_sub = sub_roll::select('sub_rolls.kode_sub_roll')
                                    ->where('id',$data_sub[$i])
                                    ->first()->kode_sub_roll;

                $id_warranty = $request->id;
                hist_sub::create([
                    'id_sub_roll'   => $data_sub[$i],
                    'kode_sub_roll' => $kode_sub,
                    'id_warranty'   => $id_warranty,
                    'create_id'     => auth()->user()->id
                ]);
            }

            $data = $request->all();
            unset($data['code']); // hapus object code dari array karna kode gabakal digenerate ulang kalo proses edit
            Pendaftaran::find($request->id)->update($data);

            return redirect('/data-pendaftaran')->with('success', 'Data Berhasil Diubah!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Data Tidak Berhasil Diubah, Periksa kembali inputan ada!');
        }
    }

    public function destroy($id)
    {
        //$dataUser = ProfileUsers::all();
        try {
            $dataPendaftaran = Pendaftaran::find($id);
            $dataPendaftaran->delete();
            return redirect('/data-pendaftaran')->with("success", 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Tidak Berhasil Dihapus!');
        }
    }

    public function verifikasistatuspendaftaran($id){
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id", "$id")->update([
            'status' => "claimed",
            'verify_id' => auth()->user()->id,
            'tgl_verif' => Carbon::now()
        ]);
        return redirect('/data-pendaftaran');
    }

    public function notverifikasistatuspendaftaran($id){
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id", "$id")->update([
            'status' => "pending"
        ]);
        return redirect('/data-pendaftaran');
    }

    public function invalidstatuspendaftaran($id){
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id", "$id")->update([
            'status' => "Tidak Sah"
        ]);
        return redirect('/data-pendaftaran');
    }

    public function selesaistatuspendaftaran($id){
        //$dataUser = ProfileUsers::all();
        Pendaftaran::where("id", "$id")->update([
            'status' => "claimed",
            'verify_id' => auth()->user()->id,
            'tgl_verif' => Carbon::now()
        ]);
        return redirect('/data-pendaftaran');
    }

    public function generateKode(Request $request)
    {
        $data = $request->query('jumlah',5);
        $tanggal = $request->query('tanggal');

        // Validate the inputs
        if (!is_numeric($data) || !$this->validateDate($tanggal)) {
            return redirect()->back()->withErrors(['error' => 'Invalid input data']);
        }

        $formattedDate = \DateTime::createFromFormat('Y-m-d', $tanggal)->format('ymd');
        
        $kode = [];
        for($i=0; $i<$data; $i++) {
            do {
                $random_str = strtolower(Str::random(6 * 2));
        
                $random_str = preg_replace('/[0-9]+/', '', $random_str);
        
            } while (strlen($random_str) < 6);
        
            $random_str = substr($random_str, 0, 6);
            $rand_code = $formattedDate.'-'.$random_str;
            $kode[] = ['code' => $rand_code];
        }

        Pendaftaran::insert($kode);

        return redirect('/data-pendaftaran')->with('success', 'Berhasil Generate Kode Garansi!');
    }

    private function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}
