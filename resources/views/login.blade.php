<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v5.0.0
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2024 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sistem informasi data kepegawaian">
    <meta name="author" content="Deni Febriansyah">
    <meta name="keyword"
        content="Sistem informasi data kepegawaian, pegawai, kepegawaian, data pegawai, data kepegawaian">
    <title>Login</title>
    <link href="{{ asset('css/coreui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <form action="" method="post">
                                    @csrf
                                    <h1>Login</h1>
                                    <p class="text-body-secondary">Masuk menggunakan akun anda</p>
                                    <div class="input-group mb-3"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                                            </svg></span>
                                        <input class="form-control @error('nip') is-invalid @enderror" name="nip"
                                            maxlength="18" type="text" placeholder="NIP"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            value="{{ old('nip') }}">
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}">
                                                </use>
                                            </svg></span>
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="row" style="justify-self: end;">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card col-md-5 text-white bg-primary py-5">
                            <div class="card-body text-center" style="align-content: center;">
                                <div>
                                    <h2>Selamat Datang</h2>
                                    <p>Selamat datang disistem informasi kepegawaian.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script>
        const header = document.querySelector('header.header');

        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>
    <script></script>

</body>

</html>
