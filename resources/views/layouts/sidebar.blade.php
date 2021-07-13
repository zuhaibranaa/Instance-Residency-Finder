@if (auth()->user()['role_id'] != 3)
        <div>
            @if (auth()->user()['role_id'] == 1 or auth()->user()['role_id'] == 2)
                @include('layouts.dashboard_sidebar')
            @endif
        </div>
@endif
