@extends('layouts.app')
@section('title','Register')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center mb-3">Register Akun</h2>
            <div class="col-md-4">
                <div class="card">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="text" name="name" id="name" placeholder="Masukkan Nama Anda" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" id="password" placeholder="Masukkan Password Anda" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirm_password" id="password" placeholder="Masukkan Ulang Password Anda" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn me-3 btn-primary">Register</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                            <div class="mb-3">
                                <a href="{{ url('/login') }}">Sudah Punya Akun?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
