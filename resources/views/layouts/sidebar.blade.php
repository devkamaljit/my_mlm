<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
       
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Account</li>
      <li class="nav-item">       
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item nav-category">Team Section</li>
      <li class="nav-item">       
        <a class="nav-link" href="{{ route('team.directs') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Directs</span>
        </a>
      </li>
      <li class="nav-item">       
        <a class="nav-link" href="{{ route('team.generation') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Generation</span>
        </a>
      </li>
      <li class="nav-item nav-category">Membership</li>
      <li class="nav-item">       
        <a class="nav-link" href="{{ route('investment.topup') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Topup</span>
        </a>
      </li>
      <li class="nav-item">       
        <a class="nav-link" href="{{ route('investment.investments') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Investments</span>
        </a>
      </li>
      <li class="nav-item nav-category">Withdrawal</li>
      <li class="nav-item">       
        <a class="nav-link" href="{{ route('withdrawal.withdraw') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Withdraw</span>
        </a>
      </li>
      <li class="nav-item nav-category">History</li>
      <li class="nav-item">       
        <a class="nav-link" href="{{ route('transactions.all') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Transactions</span>
        </a>
      </li>
      
      
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
              {{ __('Log Out') }}
          </x-dropdown-link>
      </form>       
        
      </li>
      
    </ul>
  </nav>