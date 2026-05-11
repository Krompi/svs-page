<footer class="bg-primary text-white py-10">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-sm">
        <div>
            <h3 class="font-semibold mb-2">Stadtverein</h3>
            <p>Für eine lebenswerte Zukunft unserer Stadt.</p>
        </div>

        <div>
            <h3 class="font-semibold mb-2">Navigation</h3>
            <ul class="space-y-1">
                <li><a href="/">Start</a></li>
                <li><a href="{{ route('articles.index') }}">Aktuelles</a></li>
                <li><a href="{{ route('events.index') }}">Veranstaltungen</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-semibold mb-2">Rechtliches</h3>
            <ul class="space-y-1">
                <li><a href="#">Impressum</a></li>
                <li><a href="#">Datenschutz</a></li>
            </ul>
        </div>
    </div>
</footer>
