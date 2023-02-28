@include('change_locale')
<a href="/" style="padding:20px;margin-top:20px;line-height:30px;text-decoration:none;color:#777">{{ __('Home') }}</a>
<h1 style="text-align:center">{{ __('All elements') }}</h1>
<div style="margin:50px 50px 0 50px;display:grid;grid-template-columns:100px 150px 1fr 150px;gap:200px;text-align:center;font-size:26px;font-weight:bold">
    <div style="width:100px;">Id</div>
    <div style="width:150px;">{{ __('Author') }}</div>
    <div>{{ __('Value') }}</div>
    <div style="width:150px;">{{ __('Delete') }}</div>
</div>
<ul style="margin:40px 50px 0 10px">
    <hr>
@foreach ($jsonObjects as $jsonObject)
    <li style="margin-top:10px;display:grid;grid-template-columns:100px 150px 1fr 150px;gap:200px;text-align:center;">
        <div style="width:100px;">{{ $jsonObject->id }}</div>
        <div style="width:150px;">{{ $jsonObject->author->name }}</div>
        <div style="overflow:hidden;background-color:#eee"><a style="text-decoration:none;color:#000" href="/json/show/{{ $jsonObject->id }}">{{ $jsonObject->value }}</a></div>
        <button style="width:150px;" data-id="{{ $jsonObject->id }}">{{ __('Delete') }}</button>
    </li>
    <hr>
@endforeach
</ul>
<script>
    const Http = new XMLHttpRequest();
    const url='/api/json/delete/';
    btns = document.querySelectorAll('button');
    btns.forEach(el => {
        el.addEventListener('click', () => {
            Http.open("POST", url + el.dataset.id);
            Http.send();
            Http.onreadystatechange = function () {
                if (this.readyState == 4) {
                    if (Http.responseText == 'Json object deleted successfully') {
                        confirm('{{ __('Json object deleted successfully') }}');
                    } else if (Http.responseText == 'Json object not found') {
                        confirm('{{ __('Json object not found') }}');
                    } else {
                        confirm(Http.responseText);
                    }
                    location.reload();
                }
            }
        });
    });
</script>