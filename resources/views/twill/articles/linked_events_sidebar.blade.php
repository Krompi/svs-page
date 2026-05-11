@if(isset($item) && $item->events->isNotEmpty())
    <div class="form-group">
        <p><strong>Verknüpfte Events:</strong></p>
        <ul>
            @foreach($item->events as $event)
                <li>
                    <a href="{{ route('twill.events.edit', [$event->id]) }}" style="text-decoration: underline;">
                        {{ $event->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
