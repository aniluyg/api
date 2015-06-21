<div class="navplaceholder"></div>
<nav>
  <div class="row">
    <div class="col-xs-12 u-aligncenter">

      @if(Auth::check())
        @include('partials.userinfo')
      @else
          {{-- user is not logged in --}}
          <div class="u-floatright u-nowrap">
            <a href="/login" class="btn btn-quaternary u-mt20 u-mr5">GİRİŞ YAP</a>
            <a href="/register" class="btn btn-primary u-mt20">KAYİT OL</a>
          </div>
      @endif

      <a href="#top" id="nav_logo" class="u-floatleft"><img src="/images/logo.png" height="40px" alt="" /></a>

    @if(Auth::check())
      <a href="#top" id="navbutton"><i class="ion ion-navicon ion-2x"></i></a>
      <ul id="menu">
        <?php
        $pages = array(
          array(
            'name' => 'TÜMÜ',
            'uri' => '/',
            'icon' => 'ion-android-home'
          ),
          array(
            'name' => 'DESTEKLEDİKLERİM',
            'uri' => '/issues/supported',
            'icon' => 'ion-thumbsup'
          ),
          array(
            'name' => 'FİKİRLERİM',
            'uri' => '/issues/created',
            'icon' => 'ion-lightbulb'
          ),
          array(
            'name' => 'DUYURULAR',
            'uri' => '/announcements',
            'icon' => 'ion-speakerphone'
          ),
          array(
            'name' => 'MUHTARIM',
            'uri' => '/muhtar',
            'icon' => 'ion-information-circled'
          ),
        );

        foreach($pages as $page):
        ?>
        <li{{ Request::is( $page['uri'] ) ? ' class=active' : '' }}>
          <a href="{{ URL::to( $page['uri']) }}">
            <i class="ion <?php echo $page['icon'] ?> ion-15x"></i>
            <?php echo $page['name'] ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      @endif

    </div>
  </div>
</nav>

