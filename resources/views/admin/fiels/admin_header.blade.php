<div class="container portfolio_title">
    <div class="section-title">
        <h2>{{ $title }}</h2>
    </div>
</div>

<div>
    <div id="filters">
        <ul style="padding: 0px">
            <li>
                <a class="{{ request()->routeIs('pages') ? 'active' : '' }}" href="{{ route('pages') }}">
                    <h5>Страницы</h5>
                </a>
            </li>
            
            <li>
                <a class="{{ request()->routeIs('portfolios') ? 'active' : '' }}" href="{{ route('portfolios') }}">
                    <h5>Портфолио</h5>
                </a>
            </li>
            
            <li>
                <a class="{{ request()->routeIs('teams') ? 'active' : '' }}" href="{{ route('teams') }}">
                    <h5>Команды</h5>
                </a>
            </li>
        </ul>
    </div>
</div>