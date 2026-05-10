<div class="contact-form-block py-8">
    @if($block->translatedInput('title'))
        <h2 class="text-2xl font-bold mb-4">{{ $block->translatedInput('title') }}</h2>
    @endif

    @if($block->translatedInput('text'))
        <div class="prose mb-6">
            {!! $block->translatedInput('text') !!}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4" id="contact-form">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name *</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary p-2">
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-Mail *</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary p-2">
            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-gray-700">Nachricht *</label>
            <textarea name="message" id="message" rows="4" required
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary p-2">{{ old('message') }}</textarea>
            @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input type="hidden" name="whatsapp" value="0">
                <input id="whatsapp" name="whatsapp" type="checkbox" value="1"
                    class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded" {{ old('whatsapp') ? 'checked' : '' }}>
            </div>
            <div class="ml-3 text-sm">
                <label for="whatsapp" class="font-medium text-gray-700">Aufnahme in die WhatsApp-Gruppe</label>
                <p class="text-gray-500">Ich stimme zu, dass meine Nummer für die WhatsApp-Gruppe verwendet wird.</p>
            </div>
        </div>

        <div id="phone-field" class="{{ old('whatsapp') ? '' : 'hidden' }}">
            <label for="phone" class="block text-sm font-medium text-gray-700">Smartphone-Nummer *</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary p-2">
            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="privacy" name="privacy" type="checkbox" value="1" required
                    class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded" {{ old('privacy') ? 'checked' : '' }}>
            </div>
            <div class="ml-3 text-sm">
                <label for="privacy" class="font-medium text-gray-700">Datenschutz *</label>
                <p class="text-gray-500">Ich habe die Datenschutzerklärung gelesen und akzeptiere diese.</p>
                @error('privacy') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="pt-2">
            <button type="submit" class="px-6 py-3 rounded-lg font-medium inline-block transition-colors hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary bg-primary text-white hover:bg-opacity-90">
                Nachricht senden
            </button>
        </div>
    </form>
</div>

<script>
    (function() {
        const whatsappCheckbox = document.getElementById('whatsapp');
        const phoneField = document.getElementById('phone-field');
        const phoneInput = document.getElementById('phone');

        function bindContactForm() {
            if (!whatsappCheckbox || !phoneField || !phoneInput) {
                return;
            }

            whatsappCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    phoneField.classList.remove('hidden');
                    phoneInput.setAttribute('required', 'required');
                } else {
                    phoneField.classList.add('hidden');
                    phoneInput.removeAttribute('required');
                }
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bindContactForm);
        } else {
            bindContactForm();
        }
    })();
</script>
