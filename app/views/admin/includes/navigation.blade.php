@if (Auth::check())
    <div class="navigation">
        <ul class="navigation-top" role="navigation">
            <li>
                <a href="{{ URL::route('admin.dashboard.index') }}">{{ Lang::get('admin.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ URL::route('admin.users.index') }}">{{ Lang::get('users.menu') }}</a>
            </li>
            <li>
                <a href="{{ URL::route('admin.pages.index') }}">{{ Lang::get('pages.menu') }}</a>
            </li>
            {{--<li><a href="{{ URL::route('admin.news.index') }}">{{ Lang::get('news.menu') }}</a></li>--}}
            {{--<li><a href="{{ URL::route('admin.catalog.index') }}">{{ Lang::get('catalog.menu') }}</a></li>--}}
            {{--<li><a href="{{ URL::route('admin.newsletter.index') }}">{{ Lang::get('newsletter.menu') }}</a></li>--}}
            {{--<li><a href="{{ URL::route('admin.subscriber.index') }}">{{ Lang::get('subscriber.menu') }}</a></li>--}}
            <li>
                <a href="{{ URL::route('admin.offer.index') }}">{{ Lang::get('offer.menu') }}</a>
            </li>
            <li>
                <a href="{{ URL::route('admin.settings.index') }}">{{ Lang::get('settings.menu') }}</a>
            </li>
        </ul>
        <ul class="navigation-bottom" role="navigation">
            <li><a>{{ Auth::user()->name }}</a></li>
            <li><a href="{{ URL::route('admin.logout') }}">{{ Lang::get('admin.action_logout') }}</a></li>
        </ul>
    </div>
    <script>
       $('.navigation-top').find('li').on('click', function() {
           $('.navigation-top li').removeClass('active');
           $(this).addClass('active');
       })
    </script>
@endif