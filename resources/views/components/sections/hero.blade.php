<section class="relative bg-gray-200">
    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-10 items-center">

        <div class="bg-white p-8 rounded-xl shadow z-40">
            <h1 class="text-2xl md:text-3xl font-bold mb-4">
                Wir gestalten die Zukunft unserer Stadt
            </h1>
            <p class="mb-6 text-gray-600">
                Gemeinsam setzen wir uns für eine lebenswerte, nachhaltige Stadt ein.
            </p>

            <div class="flex gap-4">
                <x-ui.button href="{{ route('events.index') }}" variant="primary">
                    Veranstaltungen ansehen
                </x-ui.button>
                <x-ui.button href="#" variant="accent">
                    Mehr über uns
                </x-ui.button>
            </div>
        </div>  

    </div>
    <img src="{{ asset('images/hero.jpg') }}" alt="Decorative Shape" class="absolute top-0 left-0 w-full h-full object-cover z-0 ">
</section>
