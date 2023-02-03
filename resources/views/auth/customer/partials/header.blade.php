<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a href="{{route('home', app()->getLocale()) }}" class="nav-link {{ (request()->routeIs('home')) ? 'active' : '' }}"  aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('wishlist')) ? 'active' : '' }}" href="{{route('wishlist', app()->getLocale())}}" aria-selected="false"><i class="fi-rs-heart mr-10"></i>Wishlist</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('orders.index')) ? 'active' : '' }}" href="{{route('orders.index', app()->getLocale())}}" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Ordini</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('address')) ? 'active' : '' }}" href="{{route('address', app()->getLocale())}}" aria-selected="false"><i class="fi-rs-marker mr-10"></i>I miei indirizzi</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('profile')) ? 'active' : '' }}" href="{{route('profile', app()->getLocale())}}" aria-selected="false"><i class="fi-rs-user mr-10"></i>Il mio profilo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link"
           href="{{ route('logout',app()->getLocale()) }}"
           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            <i class="fi-rs-sign-out mr-10"></i>{!!__('app.logout')!!}
        </a>
        <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}"
              method="POST"
              class="d-none">
            @csrf
        </form>
    </li>
</ul>
