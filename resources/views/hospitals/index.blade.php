<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('qtt.hospitals') }}
        </h2>
    </x-slot>

    <div id="mytable"></div>

    <x-slot name="custom_scripts">
        {{--<script src="{{ asset('js/custom-scripts.js') }}"></script>--}}
        {{--<script src="{{ mix('js/app.js') }}"></script>--}}
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </x-slot>

</x-app-layout>
