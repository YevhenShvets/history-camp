<header class="">
  <div class="container">
    <div class="row">
      <div class="col-7 col-md-4 col-lg-4 position-relative">
        <a href="{{ route('home-page') }}" alt="logo" class="logo">
          <img src="/history-camp.png" class="img-fluid">
        </a>
      </div>
      <div class="col-5 col-md-8 col-lg-8">
        <!-- <div class="socials">
          <div class="custom d-flex align-items-center w-100">
            <a href="tel:+" class="header__phone d-inline-block">+38</a>
            <a href="" target="_blank">
              <img src="" class="img-fluid">
            </a>
            <a href="" target="_blank">
              <img src="" class="img-fluid">
            </a>
          </div>
        </div> -->
        <div class="nav_">
          <nav class="top-menu menu d-flex justify-content-end align-items-center">
            <ul class="nav menu justify-content-end align-items-center mod-list">
              <li><a href="{{ route('home-page') }}" class="nav-link">Головна</a></li>
              <li><a href="{{ route('news-page') }}" class="nav-link">Новини</a></li>
              <li><a href="{{ route('tours-page') }}" class="nav-link">Тури</a></li>
              <li><a href="{{ route('contact-page') }}" class="nav-link">Контакти</a></li>
              @auth('web')
              <li><a href="{{ route('user-home') }}" class="nav-link2" style="text-decoration:underline; background-color:rgba(23,255,244, 0.1); padding:0 10px;">{{auth()->user()->name}}</a></li>
              @else
              @auth('admin')
              <li><a href="{{ route('admin-index') }}" class="nav-link2" style="color:rgb(0,40,233);">Адміністратор</a></li>
              @else
              <li><a href="{{ route('login') }}" class="nav-link2">Авторизація</a></li>
              @endauth
              @endauth
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>