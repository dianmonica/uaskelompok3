@extends('layout')

@section('content')
    <h1>Edit Klien</h1>
    <form action="/edit-client/{{ $client->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Klien</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                value="{{ $client->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="perusahaan"
                value="{{ $client->perusahaan }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" placeholder="alamat" rows="3" required>{{ $client->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. HP"
                value="{{ $client->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                value="{{ $client->email }}" required>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
