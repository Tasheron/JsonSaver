<h1 style="text-align:center;padding:20px;">{{ __($status) }}</h1>
<p style="margin:50px 0 0 50px;font-size:28px;">{{ __($message) }}</p>
@if ($id ?? false)
<p style="margin:50px 0 0 50px;font-size:28px;">{{ __('Id in database') . ": $id" }}</p>
<p style="margin:50px 0 0 50px;font-size:28px;">{{ __('Time per request') . ": $time " . __('ms') }}</p>
<p style="margin:50px 0 0 50px;font-size:28px;">{{ __('Method') . ": $method" }}</p>
<p style="margin:50px 0 0 50px;font-size:28px;">{{ __('Author') . ": $author" }}</p>
@endif
<button onclick="location.href='/'" style="display:block;margin:auto;margin-top:100px;padding:10px;font-size:24px;">{{ __('Home') }}</button>