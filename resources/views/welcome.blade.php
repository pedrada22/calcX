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
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
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

            input[type=number] {
                 background-color: #fff;
                 color: #636b6f;
                 font-family: 'Raleway', sans-serif;
                 font-weight: 100;
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
                margin-top: 30px;
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

                </div>

                               <div class="container">
                <div class="row">
                <div class="col-2 align-self-center">
                <div class="table-responsive" >
                <table class="table table-hover table-striped table-bordered" >
                    <tr><th scope="col">...</th><th scope="col">BTC</th><th scope="col">ETH</th><th scope="col">LTC</th><th scope="col">XRP</th><th scope="col">DASH</th><th scope="col">ZEC</th></tr>
                    <tr><td scope="row"><div id="USD"><b>USD</b></div></td><td scope="row"><div id="BTC"> 0 </div></td><td scope="row"><div id="ETH"> 0 </div></td><td scope="row"><div id="LTC"> 0 </div></td><td scope="row"><div id="XRP"> 0 </div></td><td scope="row"><div id="DASH"> 0 </div></td><td scope="row"><div id="ZEC"> 0 </div></td></tr>
                    <tr><td scope="row"><div id="Coins"><b>Coins</b></div></td><td scope="row"><input style="max-width:64px" type="number" id="coin-BTC" value="0"></td><td scope="row"><input style="max-width:64px" type="number"  id="coin-ETH" value="0">  </td><td scope="row"><input style="max-width:64px" type="number"  id="coin-LTC" value="0">  </td><td scope="row"><input style="max-width:64px" type="number"  id="coin-XRP" value="0">  </td><td scope="row"><input style="max-width:64px" type="number"  id="coin-DASH" value="0"> </td><td scope="row"><input style="max-width:64px" type="number"  id="coin-ZEC" value="0"> </td></tr>
                    <tr><td scope="row"><div id="Total"><b>Total</b></div></td><td scope="row"><div id="total-BTC">0</div></td><td scope="row"><div id="total-ETH"> 0 </div></td><td scope="row"><div id="total-LTC"> 0 </div></td><td scope="row"><div id="total-XRP"> 0 </div></td><td scope="row"><div id="total-DASH"> 0 </div></td><td scope="row"><div id="total-ZEC"> 0 </div></td></tr>
                    <tr><td scope="row"><div id="Total_USD_desc" style="max-width:64px"><b>Total USD</b></div></td><td scope="row"><div id="total_USD_value">0</div></td><td scope="row"><div id="desc_brl_usd" style="max-width:64px"><b>U$D to BRL</b></div></td><td scope="row"><div id="BRL_USD">0</div></td><td scope="row"><div id="Total_BRL_desc" style="max-width:64px"><b>Total est. BRL</b></div></td><td scope="row"><div id="total_BRL_value">0</div></td>
                    <script source="">

                    var brl_usd_conv = 0;
                    $.getJSON( "http://api.promasters.net.br/cotacao/v1/valores?moedas=USD", function( data ) {
                        brl_usd_conv = parseFloat(data["valores"]["USD"]["valor"]);
                        $("#BRL_USD").html(brl_usd_conv.toFixed(2));
                    });
                    var items = {};
                    $.getJSON( "https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,LTC,XRP,DASH,ZEC&tsyms=USD", function( data ) {

                        $.each( data, function( key, val ) {
                            $.each( val, function( key2, val2 ) {
                                $("#"+key).html(val2);
                                items[key]=val2;
                            });
                        });


                    });


                    $( "[id^='coin-']").keyup(function()
                    {
                        if ($(this).val()=="")
                        {
                            $(this).val("0");
                        }
                        var x;
                        for (x in items)
                        {
                            $("#total-"+x).html((parseFloat(items[x])*parseFloat($("#coin-"+x).val())).toFixed(2));
                        }
                        var total_usd=0;
                        $("[id^='total-']").each(function( index )
                        {
                            total_usd += parseFloat($(this).text());
                        });
                        $("#total_USD_value").html(total_usd.toFixed(2));
                        $("#total_BRL_value").html((total_usd*brl_usd_conv).toFixed(2));
                    });



                    </script>

                </table>
                </div>
                </div>
                </div>
                </div>

            </div>
        </div>



    </body>
</html>
