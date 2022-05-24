@extends('layouts.admin')
@section('title','Create New Blog')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                            <div class="mb-3 input-group input-group-outline">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan Judul">
                            </div>
                            <div class="mb-3 input-group input-group-outline">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn me-3 btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
