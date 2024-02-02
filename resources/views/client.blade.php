@extends('layout')

@section('content')
    <div class="d-flex justify-content-between">
        <h1>Daftar Klien</h1>
        <div class="my-auto">
            <a href="/export-client" type="button" class="btn btn-success">Export Excell</a>
            <a href="/create-client" type="button" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Klien</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->nama }}</td>
                        <td>{{ $client->perusahaan }}</td>
                        <td>{{ $client->alamat }}</td>
                        <td>{{ $client->no_hp }}</td>
                        <td>{{ $client->email }}</td>
                        <td>
                            <a href="/transaction?client_id={{ $client->id }}" class="btn btn-primary">Lihat Transaksi</a>
                        </td>
                        <td>
                            <a href="/edit-client/{{ $client->id }}" class="btn btn-warning">Edit</a>
                            <a href="/hapus-client/{{ $client->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
