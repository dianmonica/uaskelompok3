<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Exports\TransactionExport;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        $transaction = Transaction::with(['client']);
        if ($request->client_id) {
            $transaction = $transaction->where('id_client', $request->client_id);
            $data['client_name'] = Client::find($request->client_id)->nama;
        }
        $data['transaction'] = $transaction->get();
        return view('transaksi', $data);
    }

    public function halamanTambah()
    {
        $data['clients'] = Client::get();
        return view('tambah_transaction', $data);
    }

    public function tambah(Request $request)
    {
        $credentials = $request->validate([
            'tanggal' => ['required'],
            'jenis' => ['required'],
            'keterangan' => ['required'],
            'jumlah' => ['required'],
            'metode' => ['required'],

        ]);

        $data = $request->except('_token');

        if (Transaction::create($data)) {
            return redirect('/transaction');
        }
        return back()->withErrors(['message' => 'Terjadi kesalahan']);
    }

    public function halamanEdit($id)
    {
        $data['clients'] = Client::get();
        $data['transaction'] = Transaction::find($id);

        return view('edit_transaction', $data);
    }

    public function edit(Request $request, $id)
    {
        $credentials = $request->validate([
            'tanggal' => ['required'],
            'jenis' => ['required'],
            'keterangan' => ['required'],
            'jumlah' => ['required'],
            'metode' => ['required'],

        ]);

        $transaction = Transaction::find($id);
        $data = $request->except('_token');

        if ($transaction->update($data)) {
            return redirect('/transaction');
        }
        return back()->withErrors(['message' => 'Terjadi kesalahan']);
    }

    public function hapus($id)
    {
        if (Transaction::find($id)->delete()) {
            return redirect('/transaction');
        }
        return back()->withErrors(['message' => 'Terjadi kesalahan']);
    }

    public function export(Request $request)
    {
        return Excel::download(new TransactionExport($request->client_id), 'Transaksi.xlsx');
    }
}
