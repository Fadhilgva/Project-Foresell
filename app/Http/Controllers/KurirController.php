<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\AdminProvince;
use App\Models\AdminRegency;
use App\Models\AdminDistrict;
use App\Models\Village;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = AdminProvince::distinct('id', 'name')->get();
        return view("admin.kurir.index", compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = AdminProvince::distinct('id', 'name')->get();
        // $regencies = Regency::orderBy('name')->get();
        // $districts = District::orderBy('name')->get();

        return view("admin.kurir.create", compact('provinces'));
    }

    public function getKabupaten(Request $request)
    {
        $id_province = $request->id_province;

        $kabupaten = AdminRegency::where('province_id', $id_province)->get();

        $option = "<option >Pilih Kabupaten..</option>";
        foreach ($kabupaten as $kab) {
            $option.="<option value='$kab->id'>$kab->name</option>";
        }
        echo $option;

    }

    public function getKecamatan(Request $request)
    {
        $id_regency = $request->id_regency;

        $kecamatan = AdminDistrict::where('regency_id', $id_regency)->get();

        $option = "<option >Pilih Kecamatan..</option>";
        foreach ($kecamatan as $kec) {
            $option.="<option value='$kec->id'>$kec->name</option>";
        }
        echo $option;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
