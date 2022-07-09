<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminBank;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $datas = Pegawai::all();
        // $banks = AdminBank::select('id','logo', 'bankName', 'type', 'noRekening', 'created_at')->get();

        $banks = AdminBank::where('bankName', 'LIKE', '%'.$keyword.'%')
                ->orWhere('noRekening', 'LIKE', '%'.$keyword.'%')
                ->orWhere('type', 'LIKE', '%'.$keyword.'%')
                ->orWhere('created_at', 'LIKE', '%'.$keyword.'%')->paginate(10);

        $banks->withPath('/admin-foresell/list/bank');
        $banks->appends($request->all());

        return view('admin.bank.index', compact('banks', 'keyword'));
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
            'logo' => 'required|mimes:jpg,jpeg,png',
            'type' => 'required',
            'noRekening' => 'required' ,
        ]);

        $logo = time().'-'.$request->logo->getClientOriginalName();
        $request->logo->move('image\admin\bank', $logo);

        AdminBank::create([
            'bankName' => $request->name,
            'logo' => $logo,
            'type' => $request->type,
            'noRekening' => $request->noRekening,
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect(route('bank.index'));
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
        $banks = AdminBank::select('id','logo', 'bankName', 'noRekening', 'created_at')->find($id);
        // $banks = AdminBank::whereId('')->first();
        return view('admin.bank.edit', compact('banks'));
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
            'logo' => 'mimes:jpg,jpeg,png',
            'noRekening' => 'required' ,

        ]);

        $data = [
            'bankName' => $request->name,
            'type' => $request->type,
            'noRekening' => $request->noRekening,
        ];

        $banks = AdminBank::whereId($id)->first();

        if($request->logo){

            File::delete('image/admin/bank/'. $banks->logo);

            $logo =  time().'-'.$request->logo->getClientOriginalName();
            $request->logo->move('image\admin\bank', $logo);

            $data['logo'] = $logo;
        }

        $banks->update($data);

        Alert::success('Success', 'Data berhasil diperbaharui');

        return redirect()->route('bank.index');
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
        ->showConfirmButton('<a href="/admin-foresell/list/bank/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/bank');
    }

    public function delete($id)
    {
        $bank = AdminBank::whereId($id)->firstOrFail();
        File::delete('image/admin/bank/'. $bank->logo);
        $bank->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/bank');
    }

}
