 <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-border navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo"  alt="modern admin logo" src="{{ asset('img/logo.png') }}">
              <h3 class="brand-text">GES-ECOLE</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            

            <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
              <div class="search-input">
                <input class="input" type="text" placeholder="Explore Modern...">
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="nav-item mr-2" id="activeAnne">

            </li>

            <li class="dropdown dropdown-user nav-item">

              <a class="btn btn-info round dropdown-toggle  mt-1" href="#" data-toggle="dropdown">
                <i class="ft-settings icon-left"></i> Settings
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="{{ route('anne.index') }}"><i class="ft-mail"></i> Anne Scolaire</a>
                <a class="dropdown-item" href="{{ route('classe.index') }}"><i class="ft-message-square"></i>Classe</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Matiers</a>
                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Proffesseurs</a>
                 <div class="dropdown-divider"></div>
                              <a href="#" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                            </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
