<ul class="sidebar navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="/home">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('banks.index') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>All Backs</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('banks.index') }}">

        <i class="fa fa-credit-card" aria-hidden="true"></i>
        <span> Request Loan</span></a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{ route('loans.index') }}">

              <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
              <span>Loan History</span></a>
          </li>

    <li class="nav-item">
            <a class="nav-link" href="{{ route('mail.show') }}">
              <i class="fa fa-telegram" aria-hidden="true"></i>
              <span> Email Adminstrator</span></a>
    </li>

    <li class="nav-item">
            <a class="nav-link" href="tables.html">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              <span> Terms And Conditions</span></a>
    </li>
        <li class="nav-item">

            <a  class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out" aria-hidden="true"></i>
        <span> Sign Out</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
                <span> Visit Welcome </span></a>
        </li>

  </ul>



        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

