  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="{{route('user.dashboard')}}" class="list-group-item list-group-item-action py-2 ripple @if (Request::is('user/dashboard')) active @endif">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>Dashboard</span>
        </a>
        <a href="{{route('user.profile')}}" class="list-group-item list-group-item-action py-2 ripple  @if (Request::is('user/profile')) active @endif"
          ><i class="fas fa-lock fa-fw me-3"></i><span>Profile</span></a
        >
        <a href="#" class="list-group-item list-group-item-action py-2 ripple  @if (Request::is('user/chat')) active @endif"
          ><i class="fas fa-chart-line fa-fw me-3"></i><span>Chats</span></a
        >
        <a href="#" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-chart-pie fa-fw me-3"></i><span>Friends</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a
        >
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-globe fa-fw me-3"></i><span>International</span></a
        >
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-building fa-fw me-3"></i><span>Partners</span></a
        >
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a
        >
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a
        >
        <a href="#" class="list-group-item list-group-item-action py-2 ripple"
          ><i class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span></a
        >
      </div>
    </div>
  </nav>
  <!-- Sidebar -->
