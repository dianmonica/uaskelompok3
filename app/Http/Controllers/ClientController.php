<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

use App\Exports\ClientExport;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{

    public function index()
    {
        $data['clients'] = Client::get();

        return view('client', $data);
    }

    public function halamanTambah()
    {
        return view('tambah_client');
    }

    public function tambah(Request $request)
    {
        $credentials = $request->validate([
            'nama' => ['required'],
            'perusahaan' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required', 'email'],

        ]);

        $data = $request->except('_token');

        if (Client::create($data)) {
            return redirect('/client');
        }
        return back()->withErrors(['message' => 'Terjadi kesalahan']);
    }

    public function halamanEdit($id)
    {
        $data['client'] = Client::find($id);

        return view('edit_client', $data);
    }

    public function edit(Request $request, $id)
    {
        $credentials = $request->validate([
            'nama' => ['required'],
            'perusahaan' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required', 'email'],
        ]);

        $client = Client::find($id);
        $data = $request->except('_token');

        if ($client->update($data)) {
            return redirect('/client');
        }
        return back()->withErrors(['message' => 'Terjadi kesalahan']);
    }

    public function hapus($id)
    {
        if (Client::find($id)->delete()) {
            return redirect('/client');
        }
        return back()->withErrors(['message' => 'Terjadi kesalahan']);
    }

    public function export()
    {
        return Excel::download(new ClientExport, 'Klien.xlsx');
    }
}
