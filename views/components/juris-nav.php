<nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/processos.php">Processos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/pessoas.php">Pessoas</a>
                    </li>
                    <li class="nav-item">
                        <?php 
                        require 'components/logout.php';
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>