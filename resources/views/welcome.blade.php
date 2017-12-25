<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        
        <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
        </script>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CalcX</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Calc X
                </div>

                <div class="links">
                    <a href="https://www.cryptocompare.com">Crypto compare Site</a>
                    <b>Site em construcao. bebe.. nois fii..</b>

                </div>
                
                <table class="table table-bordered">
                    <tr><th>BTC</th><th>ETH</th><th>LTC</th><th>XRP</th><th>DASH</th><th>ZEC</th></tr>
                    <tr><td><div id="BTC"> 1 </div></td><td><div id="ETH"> 1 </div></td><td><div id="LTC"> 1 </div></td><td><div id="XRP"> 1 </div></td><td><div id="DASH"> 1 </div></td><td><div id="ZEC"> 1 </div></td></tr>
                    <script source="">
                    
                    $.getJSON( "https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,LTC,XRP,DASH,ZEC&tsyms=USD", function( data ) {
                    var items = [];
                        $.each( data, function( key, val ) {
                            $.each( val, function( key2, val2 ) {
                                $("#"+key).html(val2);
                            });
                        });
                    
                    
                    });
                    
                    </script>
                </table>
                
            </div>
        </div>
        
        
        
    </body>
</html>
