<div class="list-group">
    <a href="{{ route('app.settings.general') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.general') ? 'active' : '' }}">General</a>
    <a href="{{ route('app.settings.appearence') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.appearence') ? 'active' : '' }}">Appearence</a>
    <a href="{{ route('app.settings.mail') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.mail') ? 'active' : '' }}">Mail</a>
    <a href="{{ route('app.settings.socialite') }}" class="list-group-item list-group-item-action {{ Route::is('app.settings.socialite') ? 'active' : '' }}">Socialite</a>
</div>