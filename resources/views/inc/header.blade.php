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
              <li><a href="{{ route('tariff-page') }}" class="nav-link">Тарифи</a></li>
              <li><a href="{{ route('contact-page') }}" class="nav-link">Контакти</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>