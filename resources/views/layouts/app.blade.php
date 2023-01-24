
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Competency Management Tool</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- CSS only -->

        <script src="/js/jquery-3.6.0.min.js"></script>
        <!--<script src="/js/bootstrap.min.js"></script>-->

        <script src="/js/spinner.js"></script>
        <script src="/js/quill.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="/css/quill.snow.css" rel="stylesheet">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
                
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.9.0/jsoneditor.min.css" integrity="sha512-8ca3Rhl1VGRZ72Vjj35LcQasrUEZZLknd2qJF/RDQocmA/4q/v5gD3H7NZtZ2ssfkN6VqDuzKqYdeaT0YUubZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.9.0/jsoneditor.min.js" integrity="sha512-WuimD+3eJ3qkskeMQiQZesaYjwyBiTN2Xg2tI60IDp5jx402/u8lLZAqCgAei92NInz0Jn+xYqJKYCbxic4hIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://kit.fontawesome.com/4e7ebd4088.js" crossorigin="anonymous"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>
        <script data-n-head="1" data-hid="intersect" src="/js/intersect-1.0.0.js"></script>

        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">-->
    </head>
    <body>
    
        <div class="container">
        @include('layouts.navbar')
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
            <!-- Bootstrap 5 JS Bundle -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <!-- Custom scripts -->
        </div>
    </body>
</html>
<script>
jQuery(document).ready(function($){
	$('.link1').click(function(){
		$('.hm9.x-anchor').click();
	});
});
</script>
<style>
    .user-info {
        margin-top: 5px;
        position: fixed;
        right: 0;
        width: auto;
    }

    .user-info .user-name {
        margin-left: 5px;
    }

    #deletealert, #updatealert {
        visibility: hidden;
        min-width: 350px;
        height: 150px;
        margin-left: -125px;
        background-color: #E8FEE4;
        font-weight: bold;
        color: black;
        font-size: 20px;
        text-align: center;
        border-radius: 2px;
        padding: 65px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
    }

    #deletealert.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 1.5s 2.5s;
        animation: fadein 0.5s, fadeout 1.5s 2.5s;
    }

    .btn-light.active {
        color: white;
        background-color: blue;
    }
</style>
