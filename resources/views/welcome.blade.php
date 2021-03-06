<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/favicon.png') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <title>Haulmate</title>

    <!-- Hotjar Tracking Code for www.haulmate.co -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1819999,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167187512-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-167187512-1');
    </script>
    
</head>
<body>
<section class="main-content">
    <div class="container">
        <div class="row d-sm-none">
            <div class="col-12 px-0">
                <div class="banner-mb" style="background-image: url({{ url('assets/images/banner-mb.png') }});"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-5 d-flex align-items-end">
                <div class="mb-4">
                     <!-- <img class="mb-3" src="assets/images/logo.png" alt="logo"> -->
                     <h1>Moving house soon?</h1>
                     <p class="text">Haulmate lets you organise all your moving services from one place, saving you hours! Launching in June, we're excited to give you a faster way to move house</p>
                </div>
            </div>
               <div class="col-md-6 col-xl-5 offset-xl-1">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="{{url('store')}}" method="post">
                            @csrf
                            <h4>Sign up today and get exclusive access</h4>
                            <div class="media align-items-center mb-3">
                                <img src="{{ url('assets/images/icon-1.png') }}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <p class="mb-0">Select from Singapore most trusted moving services</p>
                                </div>
                            </div>
                            <div class="media align-items-center">
                                <img src="{{ url('assets/images/icon-2.png') }}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <p class="mb-0">Services include movers, end of lease cleaning, moving boxes and
                                        more</p>
                                </div>
                            </div>

                            <hr/>
                           <h4>Be the first to know once we launch in June</h4>
                            <div class="form-group">
                                <label>Enter your email to get notified when we lanuch</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email here">
                            </div>
                            <button type="submit" class="btn btn-secondary float-right mt-1" disabled="">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- Javascript -->
<script src="{{ url('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script>
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    $(document).on('keyup','input[type="email"]',function () {
        var checkEmail = isEmail($(this).val());
        if(checkEmail){
            $(this).parents('form').find('button').removeAttr('disabled').removeClass('btn-secondary').addClass('btn-primary');
        }
        else{
            $(this).parents('form').find('button').attr('disabled',true).removeClass('btn-primary').addClass('btn-secondary');
        }
    });
</script>
</body>
</html>