<script src="{{ URL::asset('js/jsonview.js') }}"></script>
@include('change_locale')
<a href="/" style="padding:20px;margin-top:20px;line-height:30px;text-decoration:none;color:#777">{{ __('Home') }}</a>
<h1 style="text-align:center">{{ __('Element with id ') . $id}}</h1>
<div class="tree" style="margin:100px 300px" data-value="{{ $value }}"></div>
<script>
    el = document.querySelector('.tree');
    jsonview.render(jsonview.create(el.dataset.value), el);
</script>