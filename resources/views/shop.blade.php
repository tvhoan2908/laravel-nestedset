<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <link rel="stylesheet" href="{{ asset('nestable/jquery.nestable.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{asset('nestable/jquery.nestable.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        $(function () {
            var updateOutput = function(e)
            {
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            $('#nestable3').nestable().on('change', updateOutput);;
            updateOutput($('#nestable3').data('output', $('#nestable3-output')));
        })
    </script>
</head>
<body>
    <div id="app">
    <main class="py-4">
        <div class="container">
            <div class="dd" id="nestable3">
                <?php
                    $html = '';
                    $traverse = function ($categories) use (&$traverse, &$html) {
                        $html .= '<ol class="dd-list">';
                        foreach ($categories as $category) {
                            $html .= '<li class="dd-item dd3-item" data-id="'. $category->id .'" data-category_name="'. $category->category_name .'">';
                            $html .= '<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">'. $category->category_name .'</div>';
                                $traverse($category->children);
                            $html .= '</li>';
                            // echo '<div>'. PHP_EOL. $prefix . ' ' . $category->category_name . '</div>';
                        }
                        $html .= '</ol>';
                    };

                    $traverse($shops);
                    echo $html;
                ?>
            </div>
            <textarea id="nestable3-output"></textarea>
        </div>
    </main>
    </div>
</body>
</html>