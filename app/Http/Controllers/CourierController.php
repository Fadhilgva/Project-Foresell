<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\AdminCourier;

use App\Models\AdminRegency;
use Illuminate\Http\Request;
use App\Models\AdminDistrict;
use App\Models\AdminProvince;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provinces = AdminProvince::distinct('id', 'name')->get();

        // $couriers = AdminCourier::select('id', 'name', 'image', 'created_at')->get();

        $keyword = $request->keyword;
        // $datas = Pegawai::all();
        // $banks = AdminBank::select('id','logo', 'bankName', 'type', 'noRekening', 'created_at')->get();

        $couriers = AdminCourier::where('name', 'LIKE', '%'.$keyword.'%')
                ->orWhere('created_at', 'LIKE', '%'.$keyword.'%')->paginate(10);

        $couriers->withPath('/admin-foresell/list/couriers');
        $couriers->appends($request->all());

        return view("admin.couriers.index", compact('provinces', 'couriers', 'keyword'));
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

        return view("admin.couriers.create", compact('provinces'));
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
        $request->validate([
            'name' => 'required|max:50',
            'logo' => 'required|mimes:jpg,jpeg,png,svg',
        ]);

        $logo = time().'-'.$request->logo->getClientOriginalName();
        $request->logo->move('image\admin\couriers', $logo);

        AdminCourier::create([
            'name' => $request->name,
            'image' => $logo,
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect(route('couriers.index'));
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
        $couriers = AdminCourier::select('id', 'name', 'image', 'created_at')->whereId($id)->first();

        return view('admin.couriers.edit', compact('couriers'));
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
        $request->validate([
            'name' => 'required|max:50',
            'logo' => 'mimes:jpg,jpeg,png,svg',
        ]);

        $data = [
            'name' => $request->name,
        ];

        $courier = AdminCourier::whereId($id)->first();

        if($request->logo){

            File::delete('image/admin/couriers/'. $courier->image);

            $logo =  time().'-'.$request->logo->getClientOriginalName();
            $request->logo->move('image\admin\couriers', $logo);

            $data['image'] = $logo;
        }
        $courier->update($data);

        Alert::success('Success', 'Data berhasil diperbaharui');

        return redirect()->route('couriers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        alert()->question('Perhatian!','Apa kamu yakin ingin menghapus?')
        ->showConfirmButton('<a href="/admin-foresell/list/couriers/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect()->route('couriers.index');
    }

    public function delete($id)
    {
        $couriers = AdminCourier::whereId($id)->firstOrFail();
        File::delete('image/admin/couriers/'. $couriers->image);
        $couriers->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/couriers');
    }

}
