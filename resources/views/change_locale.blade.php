<div style="float:right;margin-right:26px;font-size:26px;padding:5px;border:2px solid #eee;border-radius:5px">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span>{{ $locale_name }}</span>
        @else
            <a style="text-decoration:none;color:#aaa" href="/setLang/{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
</div>