<style>
  .dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-toggle {
    background: none;
    border: none;
    cursor: pointer;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    list-style: none;
    padding: 0;
    margin: 0;
    z-index: 1000;
}

.dropdown-menu li {
    padding: 10px 20px;
    white-space: nowrap;
}

.dropdown-menu li a {
    color: #333;
    text-decoration: none;
}

.dropdown-menu li a:hover {
    color: #007BFF;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

</style>
<div class="container">
    <a href="#" class="logo">Fit<span>Pro</span></a>

    <nav class="nav-links">
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#catalog">Catalogo</a></li>
        <li><a href="#contact">Contatti</a></li>
      </ul>
    </nav>

    <div class="cart-container">
      <!---Se non è loggato-->
      @guest
        <a href="{{route('login')}}" class="cart dropdown-toggle">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Carrello">
        </a>
      @endguest
      <!---Se è loggato-->
      @auth
      <div class="dropdown">
        <button class="dropdown-toggle cart">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profilo">
        </button>
        <ul class="dropdown-menu">
            <li><a href=""><i class="fas fa-users"></i> Profilo {{Auth()->user()->name}}</a></li>
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>Logout
            </a></li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
      @endauth

      <a href="#cart" class="cart">
        <img src="https://cdn-icons-png.flaticon.com/512/833/833314.png" alt="Carrello">
        <span class="cart-count">0</span>
      </a>
    </div>
  </div>