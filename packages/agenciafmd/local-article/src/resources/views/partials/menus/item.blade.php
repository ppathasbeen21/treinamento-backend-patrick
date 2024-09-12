@can('view', \Agenciafmd\Article\Models\Article::class)
    <li class="nav-item">
        <a class="nav-link {{ (Str::startsWith(request()->route()->getName(), 'admix.article')) ? 'active' : '' }}"
           href="{{ route('admix.article.index') }}"
           aria-expanded="{{ (Str::startsWith(request()->route()->getName(), 'admix.article')) ? 'true' : 'false' }}">
        <span class="nav-icon">
            <i class="icon {{ config('local-article.icon') }}"></i>
        </span>
            <span class="nav-text">
            {{ config('local-article.name') }}
        </span>
        </a>
    </li>
@endcan
