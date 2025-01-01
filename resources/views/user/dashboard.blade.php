{{-- resources/views/user/dashboard.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard użytkownika') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-medium text-lg">Witaj, {{ Auth::user()->name }}!</h3>
                    <p>Tutaj możesz zarządzać swoimi aktywnościami w naszym serwisie:</p>

                    <ul class="list-disc ml-4">
                        <li><a href="{{ route('books.index') }}">Przeglądaj dostępne książki</a></li>
                        <li><a href="{{ route('orders.index') }}">Zarządzaj swoimi zamówieniami</a></li>
                        <li><a href="#">Dodaj opinię o książce</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
