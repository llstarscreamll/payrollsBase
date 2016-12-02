<li class="@if($active)active @endif @if($item->hasItems()) @endif">
    <a href="{{ $item->getUrl() }}" @if(count($appends) > 0)class="hasAppend"@endif>
        <i class="{{ $item->getIcon() }}"></i>
        
        <span class="nav-label">
            {{ $item->getName() }}
        </span>

        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

        @if($item->hasItems())<span class="{{ $item->getToggleIcon() }} pull-right"></span>@endif
    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    @if(count($items) > 0)
        <ul class="nav nav-second-level">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
