<div class="form-group">
    @if(isset($item) && $item->id)
        <form action="{{ route('twill.events.createArticle', [$item->id]) }}" method="POST" class="pt-6">
            @csrf
            <a17-button variant="primary" type="submit">Artikel erstellen-</a17-button>
        </form>
    @endif
</div>
