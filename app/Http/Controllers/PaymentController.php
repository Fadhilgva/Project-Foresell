<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
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

        $payment = Payment::where('name', 'LIKE', '%'.$keyword.'%')
                ->orWhere('noPayment', 'LIKE', '%'.$keyword.'%')
                ->orWhere('type', 'LIKE', '%'.$keyword.'%')
                ->orWhere('created_at', 'LIKE', '%'.$keyword.'%')
                ->orderby('type', 'ASC')->paginate(10);

        $payment->withPath('/admin-foresell/list/payment');
        $payment->appends($request->all());

        return view('admin.payment.index', compact('payment', 'keyword'));
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
            'noPayment' => 'required' ,
        ]);

        $logo = time().'-'.$request->logo->getClientOriginalName();
        $request->logo->move('image\admin\payment', $logo);

        Payment::create([
            'name' => $request->name,
            'logo' => $logo,
            'type' => $request->type,
            'noPayment' => $request->noPayment,
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');

        return redirect(route('payment.index'));
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
        $payment = Payment::select('id','logo', 'name', 'noPayment', 'created_at')->find($id);
        // $payment = Payment::whereId('')->first();
        return view('admin.payment.edit', compact('payment'));
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
            'noPayment' => 'required' ,

        ]);

        $data = [
            'bankName' => $request->name,
            'type' => $request->type,
            'noPayment' => $request->noPayment,
        ];

        $payment = Payment::whereId($id)->first();

        if($request->logo){

            File::delete('image/admin/payment/'. $payment->logo);

            $logo =  time().'-'.$request->logo->getClientOriginalName();
            $request->logo->move('image\admin\payment', $logo);

            $data['logo'] = $logo;
        }

        $payment->update($data);

        Alert::success('Success', 'Data berhasil diperbaharui');

        return redirect()->route('payment.index');
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
        ->showConfirmButton('<a href="/admin-foresell/list/payment/' . $id . '/delete" class="text-white" style="text-decoration: none"> Delete</a>', '#3085d6')->toHtml()
        ->showCancelButton('Cancel', '#aaa')->reverseButtons();

        return redirect('/admin-foresell/list/payment');
    }

    public function delete($id)
    {
        $payment = Payment::whereId($id)->firstOrFail();
        File::delete('image/admin/payment/'. $payment->logo);
        $payment->delete();

        Alert::success('Success', 'Data berhasil dihapus');

        return redirect('/admin-foresell/list/payment');
    }

}
