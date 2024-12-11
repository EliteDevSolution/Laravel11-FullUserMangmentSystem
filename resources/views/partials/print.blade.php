<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ __('global.app_name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        *{box-sizing:border-box}body,html{margin:0;padding:0;font-family:'lato',sans-serif;font-weight:400;background:#fff;line-height:1}@page{margin:0}body.page-size-letter{margin:.7in .6in .6in}body.page-size-half-letter{margin:.35in .3in .3in}body.page-size-legal{margin:.7in .6in .6in}body.page-size-a4{margin:3cm}body.page-size-a5{margin:15mm}body.page-size-custom{margin:10mm}

    </style>
    <style type="text/css">
        @page {
            size: A4;
            margin: 0;
            padding: 0;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0.5cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            margin:1cm !important;
        }

        .header {
            top: 0.5cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            margin:1cm !important;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 3.5cm;
            left: 1cm;
            right: 1cm;
            height: 4cm;
        }
        .footer {
            margin:1cm !important;
        }
    </style>
    @stack('css')
</head>
<body>
    <div id="print_content">
        @yield('content')
    </div>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    @stack('js')
    <script type="text/javascript">
        window.onload = function () {
        };

        var beforePrint = function() {
        };
        var afterPrint = function() {
            window.close();
        };

        var launchedFromMenu = true;
        if (window.matchMedia) {
            var mediaQueryList = window.matchMedia('print');
            mediaQueryList.addListener(function(mql) {
                if (mql.matches) {
                    if(launchedFromMenu) {
                        console.log("There is a bug in Chrome/Opera and printing via the main menu does not work properly. Please use the 'print' icon on the page.");
                    }
                    beforePrint();
                } else {
                    afterPrint();
                }
            });
        }
        // These are for Firefox
        window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;

        function printPage() {
            window["beforePrint"]();
            launchedFromMenu = false;
            window.print();

        }
    </script>

</body>
</html>

