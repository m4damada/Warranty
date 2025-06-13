<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProgramStudi;
use App\Models\Kategori;
use App\Models\M_Warranty;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramStudiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function($request,$next){
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


    //data produk kompliit
    public function dataproduk(){
        $viewData = ProgramStudi::all();
        $kategori = Kategori::all();
        $mWarranty = M_Warranty::all();
        return view ('produk.data-studyProgram-admin',compact('viewData','kategori','mWarranty'));
    }
    
    public function getData(Request $request)
    {
        $length = $request->input('length');
        $start = $request->input('start');
        $searchValue = $request->input('search')['value'];

        // Ambil data dengan pagination
        $query = ProgramStudi::with(['kategori','warranty']);

        if (!empty($searchValue)) {
            $query->where(function($q) use ($searchValue) {
                $q->where('nama_produk', 'like', '%' . $searchValue . '%')
                  ->orWhere('id_produk', 'like', '%' . $searchValue . '%')
                  ->orWhereHas('kategori', function($q) use ($searchValue) {
                      $q->where('kategori', 'like', '%' . $searchValue .'%');
                  })
                  ->orWhereHas('warranty', function($q) use ($searchValue) {
                      $q->where('tipe', 'like', '%' . $searchValue . '%');
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

    public function simpanproduk(Request $a)
    {
        try{

            $kode=ProgramStudi::id();

            // $fileft = $a->file('foto');
            // if(file_exists($fileft)){
            //     $nama_fileft = "produk".time() . "-" . $fileft->getClientOriginalName();
            //     $namaFolderft = 'foto produk';
            //     $fileft->move($namaFolderft,$nama_fileft);
            //     $path = $namaFolderft."/".$nama_fileft;
            // } else {
            //     $path = null;
            // }

            ProgramStudi::create([
                'id_produk'         => $a->kode,//$kode,
                'nama_produk'       => $a->nama,
                'kategori_produk'   => $a->kategori,
                'tipe_warranty'     => $a->tipe_warranty,
                'is_lifetime'       => $a->is_lifetime,
                'create_id'         => $a->userid,
                'created_at'        => Carbon::now()
                // 'foto_produk'       => $path
        ]);
// dd($a);
            return redirect('/data-produk')->with('success', 'Data Tersimpan!!');
        } catch (\Exception $e){
            // dd($e);
            return redirect()->back()->with('error', 'Data Gagal Disimpan!');
        }
    }
    
    public function edit($id)
    {
        $data = ProgramStudi::where('id',$id)->first();
        $kategori = Kategori::all();
        $mWarranty = M_Warranty::all();
        
        return view('produk.edit_produk', compact('data','kategori','mWarranty'));
    }

    public function updateproduk(Request $a, $id_produk){
        //$dataUser = Pengguna::all();
        try{
            // $fileft = $a->file('foto');
            // if(file_exists($fileft)){
            //     $nama_fileft = "produk".time() . "-" . $fileft->getClientOriginalName();
            //     $namaFolderft = 'foto produk';
            //     $fileft->move($namaFolderft,$nama_fileft);
            //     $path = $namaFolderft."/".$nama_fileft;
            // } else {
            //     $path = $a->pathnya;
            // }
            ProgramStudi::where("id", $id_produk)->update([
                'nama_produk' => $a->nama,
                'kategori_produk' => $a->kategori??0,
                'tipe_warranty'     => $a->tipe_warranty,
                'is_lifetime'       => $a->is_lifetime,
                'modify_id'         => $a->userid,
                'updated_at'        => Carbon::now()
                // 'foto_produk' => $path,
            ]);
            
            return redirect('/data-produk')->with('success', 'Data Terubah!!');
        } catch (\Exception $e){
            dd($e);
            return redirect()->back()->with('error', 'Data Gagal Diubah!');
        }
    }

    public function hapusproduk($id_produk){
        //$dataUser = Pengguna::all();
        try{
            $data = ProgramStudi::find($id_produk);
            $data->delete();
            return redirect('/data-produk')->with('success', 'Data Terhapus!!');
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Gagal Dihapus!');
        }
    }
}
