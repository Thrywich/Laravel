<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('trad.dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-4 ml-4">
        <div class="flex">
            @if (Route::has('addPasswd'))
                <p>{{ __('trad.password.add_passwd') }} :&nbsp;</p><a href={{ route('addPasswd') }}>{{ __('trad.click_here') }}</a>
            @endif
        </div>
        <div class="flex">
            @if (Route::has('passwdList'))
                <p>{{ __('trad.password.see_passwd') }} :&nbsp;</p><a href={{ route('passwdList') }}>{{ __('trad.click_here') }}</a>
            @endif
        </div>
        <div class="flex mt-4">
            @if (Route::has('addTeam'))
                <p>{{ __('trad.team.create_team') }} :&nbsp;</p><a href={{ route('addTeam') }}>{{ __('trad.click_here') }}</a>
            @endif
        </div>
        <div class="flex">
            @if (Route::has('teamList'))
                <p>{{ __('trad.team.see_teams') }} :&nbsp;</p><a href={{ route('teamList') }}>{{ __('trad.click_here') }}</a>
            @endif
        </div>
    </div>
</x-app-layout>
