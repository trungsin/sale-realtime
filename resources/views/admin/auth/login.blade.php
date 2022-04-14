<!DOCTYPE html>

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Khai Tin Group">
    <meta name="author" content="Khai Tin Group">
    <meta name="keyword" content="Khai Tin Group">
    <title>Khai Tin Group</title>

    <link href="{{ asset('admin/style.css') }}" rel="stylesheet">
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script> -->
    <!-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-118965717-1');

    </script> -->
</head>

<body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form class="kt-form" method="POST" action="{{ route('authenticate') }}">
                                @csrf
                                <h1>Đăng Nhập</h1>
                                <p class="text-muted">Đăng nhập tài khoản</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg></span></div>
                                    <input class="form-control" name="email" type="text" placeholder="Username">
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                                    </div>
                                    <!-- <div class="col-6 text-right">
                                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js') }}"></script>
    <!--[if IE]><!-->
    <script src="{{ asset('admin/vendors/@coreui/icons/js/svgxuse.min.js') }}"></script>
    <!--<![endif]-->
</body>

</html>
