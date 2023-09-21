<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use Mail;
use PDF;
use Illuminate\Support\Facades\Hash;

class AlgoritmaController extends Controller
{
    public function index(){
    // $findKasus = DB::table('pasien as p')
    //                     ->join('kasus as k','p.kode_kasus','=','k.Kode_kasus')
    //                     ->join('detail_gejala as dg','dg.kode_kasus','=','k.Kode_kasus')
    //                     ->join('gejala as g','g.kode_gejala','=','dg.Kode_gejala')
    //                     ->select('p.Usia', 'p.Jenis_kelamin', 'p.Kondisi', 'p.Kesadaran', 'p.nyeri_kepala', 'p.TS', 'p.TD', 'p.Suhu', 'p.Nafas', 
    //                     'p.Denyut_nadi', 'k.Kode_kasus', 'k.kode_penyakit', 'g.kode_gejala')
    //                     ->where('dg.nilai',1)
    //                     ->orderBy('k.kode_kasus', 'desc')
    //                     ->orderBy('g.kode_gejala', 'desc')
    //                     ->get();

    $findKasus = DB::table('pasien as p')
                        ->join('kasus as k','p.kode_kasus','=','k.Kode_kasus')
                        ->join('detail_gejala as dg','dg.kode_kasus','=','k.Kode_kasus')
                        ->join('gejala as g','g.kode_gejala','=','dg.Kode_gejala')
                        ->select('k.Kode_kasus', 'k.kode_penyakit', 'g.kode_gejala')
                        ->where('dg.nilai',1)
                        ->orderBy('k.kode_kasus', 'desc')
                        ->orderBy('g.kode_gejala', 'desc')
                        ->get();
        
        //generate gejala 1 sampai 43
        $arr_data2 = array();
        $tmp_kode_kasus = '';
        $count = 0;
        $obj = json_decode($findKasus);
        
        foreach ($obj as $key => $value) {
            if($tmp_kode_kasus != $value->Kode_kasus){
                $tmp_kode_kasus =  $value->Kode_kasus;
                // $arr_data2[] = array(
                //     "Kode_kasus" => $value->Kode_kasus,
                //     "kode_penyakit" => $value->kode_penyakit,
                //     "G1" => 0,
                //     "G2" => 0,
                //     "G3" => 0,
                //     "G4" => 0,
                //     "G5" => 0,
                //     "G6" => 0,
                //     "G7" => 0,
                //     "G8" => 0,
                //     "G9" => 0,
                //     "G10" => 0,
                //     "G11" => 0,
                //     "G12" => 0,
                //     "G13" => 0,
                //     "G14" => 0,
                //     "G15" => 0,
                //     "G16" => 0,
                //     "G17" => 0,
                //     "G18" => 0,
                //     "G19" => 0,
                //     "G20" => 0,
                //     "G21" => 0,
                //     "G22" => 0,
                //     "G23" => 0,
                //     "G24" => 0,
                //     "G25" => 0,
                //     "G26" => 0,
                //     "G27" => 0,
                //     "G28" => 0,
                //     "G29" => 0,
                //     "G30" => 0,
                //     "G31" => 0,
                //     "G32" => 0,
                //     "G33" => 0,
                //     "G34" => 0,
                //     "G35" => 0,
                //     "G36" => 0,
                //     "G37" => 0,
                //     "G38" => 0,
                //     "G39" => 0,
                //     "G40" => 0,
                //     "G41" => 0,
                //     "G42" => 0,
                //     "G43" => 0,
                // );
                $arr_data2[] = array(
                    "Kode_kasus" => $value->Kode_kasus,
                    "kode_penyakit" => $value->kode_penyakit,
                    "G1" => "False",
                    "G2" => "False",
                    "G3" => "False",
                    "G4" => "False",
                    "G5" => "False",
                    "G6" => "False",
                    "G7" => "False",
                    "G8" => "False",
                    "G9" => "False",
                    "G10" => "False",
                    "G11" => "False",
                    "G12" => "False",
                    "G13" => "False",
                    "G14" => "False",
                    "G15" => "False",
                    "G16" => "False",
                    "G17" => "False",
                    "G18" => "False",
                    "G19" => "False",
                    "G20" => "False",
                    "G21" => "False",
                    "G22" => "False",
                    "G23" => "False",
                    "G24" => "False",
                    "G25" => "False",
                    "G26" => "False",
                    "G27" => "False",
                    "G28" => "False",
                    "G29" => "False",
                    "G30" => "False",
                    "G31" => "False",
                    "G32" => "False",
                    "G33" => "False",
                    "G34" => "False",
                    "G35" => "False",
                    "G36" => "False",
                    "G37" => "False",
                    "G38" => "False",
                    "G39" => "False",
                    "G40" => "False",
                    "G41" => "False",
                    "G42" => "False",
                    "G43" => "False",
                );
                $arr_data2[$count][$value->kode_gejala] = "True";
                $count++;
            }else{
                $arr_data2[$count-1][$value->kode_gejala] = "True";
            }
        }

        $tmp1 = json_encode($arr_data2);
        $tmp2 = json_decode($tmp1);
        
        $data['kasus'] = $tmp2;
        
    	return view('generaterule')->with($data);
    }
}
