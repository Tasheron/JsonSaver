<!DOCTYPE HTML>
<html>
    <body>
        @include('change_locale')
        <h1 style="text-align:center">{{ __('Welcome') }}!</h1>
        <p style="margin:100px 0 0 50px;font-size:28px;">{{ __('To store json in database, follow the link to the') }} 
            <a href="/form/store" style="text-decoration:none;color:#777;font-style:italic;">{{ __('form') }}</a>
        </p>
        <p style="margin:100px 0 0 50px;font-size:28px;">{{ __('To update json in database, follow the link to the') }} 
            <a href="/form/update" style="text-decoration:none;color:#777;font-style:italic;">{{ __('form') }}</a>
        </p>
        <p style="margin:100px 0 0 50px;font-size:28px;">{{ __('To view all entries link to the') }} 
            <a href="/json/show" style="text-decoration:none;color:#777;font-style:italic;">{{ __('list') }}</a>
        </p>
    </body>
</html>