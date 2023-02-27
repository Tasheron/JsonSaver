@include('change_locale')
<a href="/" style="padding:20px;margin-top:20px;line-height:30px;text-decoration:none;color:#777">{{ __('Home') }}</a>
<h1>{{ __('Fill out the form to update the data in the database') }}</h1>

<form action="/api/form/update/submit" method="get" id="form">
    @csrf
    <input type="hidden" name="locale" value="{{ App::getLocale() }}">
    <div style="margin:20px;">
        <label for="method">{{ __('Choose a request method') }}:</label>
        <select name="method" id="method">
            <option value="GET">GET</option>
            <option value="POST">POST</option>
        </select>
    </div>
    <div style="margin:20px;">
        <label for="api_token">{{ __('Api-token') }}:</label>
        <input type="text" style="margin-top:10px;width:500px;" name="api_token">
    </div>
    <div style="margin:20px;">
        <label for="id">{{ __('Id in database') }}:</label>
        <input type="text" style="margin-top:10px;width:150px;" name="id">
    </div>
    <div style="margin:20px;">
        <label for="code">{{ __('Code') }}:</label><br>
        <textarea placeholder="$data->" style="margin-top:10px;width:1700px;height:400px;resize:none;max-width:90vw;max-height:50vh;" name="code">$data-></textarea>
    </div>
    <button type="submit" style="margin-left:20px;padding:10px;font-size:22px;">{{ __('Submit') }}</button>
</form>
<script>
    selector = document.querySelector('#method');
    form = document.querySelector('#form');
    selector.addEventListener('change', () => {
        form.method = selector.value === 'GET' ? 'GET' : 'POST';
    })
</script>