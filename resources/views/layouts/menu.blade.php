<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('kelurahans.index') }}" class="nav-link {{ Request::is('kelurahans*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Kelurahans</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pasiens.index') }}" class="nav-link {{ Request::is('pasiens*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Pasiens</p>
    </a>
</li>
