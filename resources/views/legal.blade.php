<x-layouts.site :title="$page->title">
    <article class="legal">
        <h1>{{ $page->title }}</h1>

        {{ \Filament\Forms\Components\RichEditor\RichContentRenderer::make($page->content['body'] ?? '') }}
    </article>
</x-layouts.site>
