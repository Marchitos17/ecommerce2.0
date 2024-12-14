<!-- Main Content -->
<div class="content">
    <div class="row">
        <!-- Profile Card -->
        <div class="mb-4">
            <div class="profile-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEytaU1okXcPwqLgAzwfDimvvYST7la-GGYw&s" alt="Profile Image">
                <h3>{{Auth()->user()->name}}</h3>
                <p class="text-muted">Benvenuto Admin</p>
                <button class="btn btn-primary">Modifica Profilo</button>
            </div>
        </div>

        <!-- Stat Cards -->
        <div class="col-md-12 col-12">
            <div class="row">
                <!-- Card 1: Users -->
                <div class="col-md-4 col-12 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5><i class="fas fa-users"></i> Utenti Totali</h5>
                            <h3>1,245</h3>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Sales -->
                <div class="col-md-4 col-12 mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5><i class="fas fa-dollar-sign"></i> Fatturato</h5>
                            <h3>€35,678</h3>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Orders -->
                <div class="col-md-4 col-12 mb-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5><i class="fas fa-box-open"></i> Ordini Totali</h5>
                            <h3>768</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Example -->
    <div class="row">
        <div class="col-md-8 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5><i class="fas fa-chart-line"></i> Performance Vendite</h5>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="col-md-4 col-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5><i class="fas fa-clipboard-list"></i> Ultimi Ordini</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Data</th>
                                <th>Totale</th>
                                <th>Stato</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Mario Rossi</td>
                                <td>2024-12-08</td>
                                <td>€120</td>
                                <td><span class="badge bg-success">Completato</span></td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>Lucia Bianchi</td>
                                <td>2024-12-07</td>
                                <td>€75</td>
                                <td><span class="badge bg-warning">In attesa</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>