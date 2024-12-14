<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h3 class="text-center text-white mb-4">Admin Panel</h3>
    <nav class="nav flex-column">
        <a href="{{route('dashboardadmin')}}" class="nav-link active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#" class="nav-link"><i class="fas fa-users"></i> Utenti</a>
        <a href="{{route('mostra_prodotti')}}" class="nav-link"><i class="fas fa-box"></i> Prodotti</a>
        <a href="{{route('mostra_categorie')}}" class="nav-link"><i class="fa-regular fa-chart-bar"></i> Categorie</a>
        <a href="#" class="nav-link"><i class="fas fa-chart-line"></i> Statistiche</a>
        <a href="#" class="nav-link"><i class="fas fa-cogs"></i> Impostazioni</a>
    </nav>
    <div class="sidebar-footer nav">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
        
    </div>
</div>

<!-- Sidebar Toggle Button -->
<button class="btn btn-primary sidebar-toggle" id="sidebarToggle">
    <i class="fas fa-bars"></i>
</button>