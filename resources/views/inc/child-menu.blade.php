<ul class="dropdown-menu">
    @foreach($children as $child)
    <li class="{{ count($child->children) ? 'dropdown-submenu' : '' }}">

        <a class="dropdown-item {{ count($child->children) ? 'dropdown-toggle' : '' }}" href="{{ $child->path() }}">

            {!! $child->icon !!}
            {{ __($child->title) }}

        </a>

        @if(count($child->children) > 0)
        @include('inc.child-menu', ['children' => $child->children])
        @endif
    </li>
    @endforeach
</ul>
