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
    public function index()
    {
        $banks = AdminBank::select('id','logo', 'bankName', 'noRekening', 'created_at')->get();
        return view('admin.bank.index', compact('banks'));
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
            'email' => 'required',
            'noRekening' => 'required|numeric' ,
            'phoneNumber' => ''
        ]);

        $logo = time().'-'.$request->logo->getClientOriginalName();
        $request->logo->move('image\admin\bank', $logo);

        AdminBank::create([
            'bankName' => $request->name,
            'logo' => $request->logo,
            'email' => $request->email,
            'noRekening' => $request->noRekening,
            'phoneNumber' => $request->phoneNumber
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
        $banks = AdminBank::select('id','logo', 'email','phoneNumber', 'bankName', 'noRekening', 'created_at')->find($id);
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
            'email' => 'required',
            'noRekening' => 'required|numeric' ,
            'phoneNumber' => ''
        ]);

        $data = [
            'bankName' => $request->name,
            'email' => $request->email,
            'noRekening' => $request->noRekening,
            'phoneNumber' => $request->phoneNumber
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
        ->showConfirmButton('<a href="/admin/list/bank/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin/list/bank');
    }

    public function delete($id)
    {
        $bank = AdminBank::whereId($id)->firstOrFail();
        File::delete('image/admin/bank/'. $bank->logo);
        $bank->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin/list/bank');
    }

}
