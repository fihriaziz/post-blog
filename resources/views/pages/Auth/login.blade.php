@extends('layouts.app')
@section('title','Login')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center">Login Akun</h2>
            <div class="col-md-4">
                <div class="card">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="text" name="email" id="email" placeholder="Masukkan Email Anda" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn me-3 btn-primary">Login</button>
                                <button type="reset" class="btn btn-danger">Batal</button>
                            </div>
                            <div class="mb-3">
                                <a href="{{ url('/register') }}">Daftar Disini</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
