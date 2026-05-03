<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Stadtverein</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#007AC0',
                        accent: '#FEDB0F'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- NAVIGATION -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="font-bold text-xl text-primary">
                Stadtverein
            </div>

            <nav class="space-x-6 text-sm">
                <a href="#" class="hover:text-primary">Start</a>
                <a href="#">Aktuelles</a>
                <a href="#">Veranstaltungen</a>
                <a href="#">Themen</a>
                <a href="#">Über uns</a>
                <a href="#">Kontakt</a>
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section class="relative bg-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-10 items-center">

            <div class="bg-white p-8 rounded-xl shadow">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">
                    Wir gestalten die Zukunft unserer Stadt
                </h1>
                <p class="mb-6 text-gray-600">
                    Gemeinsam setzen wir uns für eine lebenswerte, nachhaltige Stadt ein.
                </p>

                <div class="flex gap-4">
                    <a href="#" class="bg-primary text-white px-5 py-3 rounded-lg">
                        Veranstaltungen ansehen
                    </a>
                    <a href="#" class="bg-accent px-5 py-3 rounded-lg font-medium">
                        Mehr über uns
                    </a>
                </div>
            </div>

            <div class="h-64 md:h-96 bg-gray-300 rounded-xl"></div>
        </div>
    </section>

    <!-- EVENTS -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Nächste Veranstaltungen</h2>
            <a href="#" class="text-primary text-sm">Alle ansehen →</a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">

            <!-- CARD -->
            @foreach ($events as $event)
                <div class="bg-white rounded-xl shadow p-5">
                    <div class="bg-accent text-center py-2 rounded mb-3 font-bold">
                        {{ $event->start_date->format('d.m.Y') }}
                    </div>
                    <h3 class="font-semibold mb-2">{{ $event->title }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $event->start_time->format('H:i') }} Uhr ·
                        {{ $event->location }}</p>
                    <p class="text-sm mb-4">{{ $event->teaser }}</p>
                    <a href="{{ route('events.show', ['slug' => $event->slug]) }}" class="text-primary text-sm">Details
                        →</a>
                </div>
            @endforeach

        </div>
    </section>

    <!-- NEWS -->
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10">

            <div>
                <h2 class="text-2xl font-semibold mb-6">Aktuelles</h2>

                <div class="space-y-6">
                    <div>
                        <h3 class="font-semibold">Positionspapier Innenstadt</h3>
                        <p class="text-sm text-gray-500">12. Mai 2025</p>
                    </div>

                    <div>
                        <h3 class="font-semibold">Rückblick Vortrag Mobilität</h3>
                        <p class="text-sm text-gray-500">28. April 2025</p>
                    </div>

                    <div>
                        <h3 class="font-semibold">Mehr Grünflächen</h3>
                        <p class="text-sm text-gray-500">14. April 2025</p>
                    </div>
                </div>
            </div>

            <!-- TOPICS -->
            <div>
                <h2 class="text-2xl font-semibold mb-6">Themen</h2>

                <div class="grid grid-cols-2 gap-4">
                    <div class="border p-4 rounded-lg">Barrierefreiheit</div>
                    <div class="border p-4 rounded-lg">Stadtbegrünung</div>
                    <div class="border p-4 rounded-lg">Mobilität</div>
                    <div class="border p-4 rounded-lg">Stadtentwicklung</div>
                </div>
            </div>

        </div>
    </section>

    <!-- DOWNLOADS -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex justify-between mb-6">
            <h2 class="text-2xl font-semibold">Downloads</h2>
            <a href="#" class="text-primary text-sm">Alle →</a>
        </div>

        <div class="space-y-4">
            <div class="bg-white p-4 rounded shadow flex justify-between">
                <span>Konzept Innenstadt</span>
                <span class="text-primary">PDF</span>
            </div>

            <div class="bg-white p-4 rounded shadow flex justify-between">
                <span>Leitfaden Barrierefreiheit</span>
                <span class="text-primary">PDF</span>
            </div>

            <div class="bg-white p-4 rounded shadow flex justify-between">
                <span>Mehr Grünflächen</span>
                <span class="text-primary">PDF</span>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-accent py-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <h2 class="text-xl font-semibold">
                Mitmachen und unsere Stadt gestalten
            </h2>
            <a href="#" class="bg-black text-white px-6 py-3 rounded-lg">
                Kontakt aufnehmen
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-primary text-white py-10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8 text-sm">
            <div>
                <h3 class="font-semibold mb-2">Stadtverein</h3>
                <p>Für eine lebenswerte Zukunft unserer Stadt.</p>
            </div>

            <div>
                <h3 class="font-semibold mb-2">Navigation</h3>
                <ul class="space-y-1">
                    <li><a href="#">Start</a></li>
                    <li><a href="#">Aktuelles</a></li>
                    <li><a href="#">Veranstaltungen</a></li>
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

</body>

</html>
