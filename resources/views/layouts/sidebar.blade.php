<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('shef-admin.index') }}" class="brand-link">
        <img class = 'logo-image' width = '210px' src="/green-office3/public/images/admin-panel/logo.png"
             alt="{{ config('app.name') }} Logo">
        <span class = 'transparent-text'>Admin Panel </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>

<style>
    .transparent-text{
        color:transparent;
    }

    .brand-link{
        margin: 10px;
    }
</style>
