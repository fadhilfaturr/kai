@extends('template.index')
@section('hardwaret')
<section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Hardware</h5>
                        <p></p>
                        <form action="{{ route('hardwaret.update', $hardware_t->id) }}" name="edit" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Notifikasi menggunakan flash session data -->
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Unit</label>
                                <div class="col-sm-10">
                                    <input id="unit" name="unit" type="text" class="form-control"
                                        value="{{ old('unit', $hardware_t->unit) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Inventaris</label>
                                <div class="col-sm-10">
                                    <input id="inventaris" name="inventaris" type="text" class="form-control" value="{{ old('inventaris', $hardware_t->inventaris) }}" required></input>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                    <input id="user" name="user" type="text"
                                        value="{{ old('user', $hardware_t->user) }}" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tanggal Rencana</label>
                                <div class="col-sm-10">
                                    <input id="tanggal_rencana_edit" name="tanggal_rencana" type="date" class="form-control"
                                        value="{{ old('tanggal_rencana', $hardware_t->tanggal_rencana) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tanggal Relasasi</label>
                                <div class="col-sm-10">
                                    <input id="tanggal_relasasi" name="tanggal_relasasi" type="date" class="form-control"
                                        value="{{ old('tanggal_relasasi', $hardware_t->tanggal_relasasi) }}" required>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        </div>
    </section>
@endsection