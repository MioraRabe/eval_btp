<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CONSTRUCTION - BTP - Login</title>
  <!-- Custom fonts for this template-->
  <link href="https://evalbtp-production.up.railway.app/admin_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="https://evalbtp-production.up.railway.app/admin_assets/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-T5ZHDVNX');</script>
                <!-- End Google Tag Manager -->

                <!-- Google tag (gtag.js) -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=G-65KF96TJSN"></script>
                <script>
                    window.dataLayer = window.dataLayer || [];
                    function gtag(){dataLayer.push(arguments);}
                    gtag('js', new Date());

                    gtag('config', 'G-65KF96TJSN');
                </script>
</head>
<body class="bg-gradient-primary">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5ZHDVNX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="https://evalbtp-production.up.railway.app/img/logo.png" alt="" width="450px"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenue!</h1>
                  </div>
                  <form action="{{ route('client.login') }}" method="POST" class="user">
                    @csrf
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                    @endif
                    <div class="form-group">
                      <input name="tel" type="text" class="form-control form-control-user" id="exampleInputEmail" value="0340590098" placeholder="Votre numéro de téléphone">
                    </div>
                    <div class="form-group">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-user">Login</button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="https://evalbtp-production.up.railway.app/admin_assets/vendor/jquery/jquery.min.js"></script>
  <script src="https://evalbtp-production.up.railway.app/admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://evalbtp-production.up.railway.app/admin_assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="https://evalbtp-production.up.railway.app/admin_assets/js/sb-admin-2.min.js"></script>
</body>
</html>
