@if (Auth::check())
    <div class="navigation">
        <ul class="nav navbar-nav navbar-left" role="navigation">
            <li><a href="{{ URL::route('admin.dashboard.index') }}">{{ Lang::get('admin.dashboard') }}</a></li>
            <li><a href="{{ URL::route('admin.users.index') }}">{{ Lang::get('users.menu') }}</a></li>
            <li><a href="{{ URL::route('admin.pages.index') }}">{{ Lang::get('pages.menu') }}</a></li>
            {{--<li><a href="{{ URL::route('admin.news.index') }}">{{ Lang::get('news.menu') }}</a></li>--}}
            {{--<li><a href="{{ URL::route('admin.catalog.index') }}">{{ Lang::get('catalog.menu') }}</a></li>--}}
            {{--<li><a href="{{ URL::route('admin.newsletter.index') }}">{{ Lang::get('newsletter.menu') }}</a></li>--}}
            {{--<li><a href="{{ URL::route('admin.subscriber.index') }}">{{ Lang::get('subscriber.menu') }}</a></li>--}}
            <li><a href="{{ URL::route('admin.settings.index') }}">{{ Lang::get('settings.menu') }}</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" role="navigation">
            <li><a>{{ Auth::user()->name }}</a></li>
            <li><a href="{{ URL::route('admin.logout') }}">{{ Lang::get('admin.action_logout') }}</a></li>
        </ul>
    </div>
@endif