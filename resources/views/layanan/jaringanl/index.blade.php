@extends('template.index')

@section('jaringanl')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-star me-1"></i>Tambah Data Jaringan</button>

<form action="{{ route('jaringanl.store') }}" name="tambah" method="POST">
    @csrf
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-body">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Unit</label>
                  <div class="col-sm-10">
                    <input id="unit" name="unit" type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Inventaris</label>
                  <div class="col-sm-10">
                    <input id="inventaris" name="inventaris" type="text" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">User</label>
                  <div class="col-sm-10">
                    <input id="user" name="user" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Rencana</label>
                  <div class="col-sm-10">
                    <input id="tanggal_rencana" name="tanggal_rencana" type="date" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Realisasi</label>
                  <div class="col-sm-10">
                    <input id="tanggal_relasasi" name="tanggal_relasasi" type="date" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Unit</th>
                                    <th>Inventaris</th>
                                    <th>User</th>
                                    <th>Tanggal Rencana</th>
                                    <th>Tanggal Realisasi</th>
                                    <th>Input Form</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jaringan_l as $index => $jaringan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $jaringan->unit }}</td>
                                        <td>{{ $jaringan->inventaris }}</td>
                                        <td>{{ $jaringan->user }}</td>
                                        <td>{{ $jaringan->tanggal_rencana }}</td>
                                        <td>{{ $jaringan->tanggal_relasasi }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ingin Menghapus Data ?');"
                                                action="{{ route('jaringanl.destroy', $jaringan->id) }}" method="POST">
                                                <a href="{{ route('jaringanl.edit', $jaringan->id) }}"
                                                  class="btn btn-sm btn-primary ri-ball-pen-fill"></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ri-delete-bin-4-fill"></button>
                                            </form>
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="7">Data tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>      
@endsection