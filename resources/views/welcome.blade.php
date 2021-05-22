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
                    <img class="mb-3" src="{{ url('assets/images/logo.png') }}" alt="logo">
                    <h1>Make your move</h1>
                    <p class="text">We’re launching in Singapore soon. Enter your email address and get 10% off your
                        move.</p>
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
                            <h4>A sneak peak into what you can expect</h4>
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
                            <h4>Be the first to know once we launch in June and get 10% off your move</h4>
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
    $(document).on('keydown','input[type="email"]',function () {
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