<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8"/>
<title>TimeScheduler | Sleek, Simple and On The Fly</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/select2/select2-metronic.css')}}"/>
<link href="{{asset('assets/css/style-metronic.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{asset('assets/css/pages/login.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
 <!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
</head>
<body class="login">
<div class="logo">
    <h5 style="color:#fff;">
        TIMESCHEDULER
    </h5>
</div>