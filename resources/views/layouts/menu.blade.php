<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <img src="images/dashboard.jpg" class="nav-icon">
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
        <img src="images/users.png" class="nav-icon">
        <p>Users</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('clients') }}" class="nav-link {{ Request::is('clients') ? 'active' : '' }}">
        <img src="images/clients.png" class="nav-icon">
        <p>Clients</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('projects') }}" class="nav-link {{ Request::is('projects') ? 'active' : '' }}">
        <img src="images/projects.png" class="nav-icon">
        <p>Projects</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('tasks') }}" class="nav-link {{ Request::is('tasks') ? 'active' : '' }}">
        <img src="images/tasks.png" class="nav-icon">
        <p>Tasks</p>
    </a>
</li>
