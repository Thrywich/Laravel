<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div>
        @if (Route::has('newPassWord'))
            <a href="{{ route('newPassWord') }}">Add new password : click here</a>
        @endif
    </div>
    <div>
        @if (Route::has('passwdList'))
            <a href="{{ route('passwdList') }}">See all my password : click here</a>
        @endif
    </div>
    <div style="margin-top:50px;">
        @if (Route::has('addTeam'))
            <a href="{{ route('addTeam') }}">Create a new team : click here</a>
        @endif
    </div>
    <div>
        @if (Route::has('teamList'))
            <a href="{{ route('teamList') }}">See all my team : click here</a>
        @endif
    </div>
</x-app-layout>
