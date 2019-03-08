<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Kamel') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Find something</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        People's Items
    </div>

    <!-- Avaliable Listing -->
    <li class="nav-item">
        <a class="nav-link" href="/listings">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>find</span></a>
    </li>

    <!-- Made rent request -->
    <li class="nav-item">
        <a class="nav-link" href="/rentRequests">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Rent Requests</span></a>
    </li>

    <!-- Approved request -->
    <li class="nav-item">
        <a class="nav-link" href="/bookings">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Approved</span></a>
    </li>

    <!-- current rent -->
    <li class="nav-item">
        <a class="nav-link" href="/bookings">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>current rent</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Your Items
    </div>

    <!-- Lend you Items -->
    <li class="nav-item">
        <a class="nav-link" href="/listings/create">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Lend you item</span></a>
    </li>

    <!-- Recevied Requests -->
    <li class="nav-item">
        <a class="nav-link" href="/rentRequests/received">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Requests</span></a>
    </li>

    <!-- Approved Requests  -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Approved Items</span></a>
    </li>

    <!-- Current Lending  -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Current Lending</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>