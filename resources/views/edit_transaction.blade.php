@extends('layout')

@section('content')
    <h1>Edit Transaksi</h1>
    <form action="/edit-transaction/{{ $transaction->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="id_client" class="form-label">Klien</label>
            <select class="form-select" name="id_client" id="id_client" aria-label="Pilih Klien" required>
                <option value="">Pilih Klient</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $transaction->client->id ? 'selected' : '' }}>
                        {{ $client->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal"
                value="{{ $transaction->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Transaksi</label>
            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis"
                value="{{ $transaction->jenis }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"
                value="{{ $transaction->keterangan }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah"
                value="{{ $transaction->jumlah }}" required>
        </div>
        <div class="mb-3">
            <label for="metode" class="form-label">Metode Pembayaran</label>
            <input type="text" class="form-control" id="metode" name="metode" placeholder="Metode"
                value=" {{ $transaction->metode }}" required>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
