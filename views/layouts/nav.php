<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
        <a class="navbar-brand d-sm-inline-block d-none" href="?page=home">Voting System</a>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php
            if (isset($_SESSION['loggedIn'])) {
            ?>
                    <li class="nav-item <?= $_GET['page'] == 'candidates' ? 'active' : '' ?>">
                        <a href="?page=candidates" class="nav-link">Candidates</a>
                    </li>
                    <li class="nav-item <?= $_GET['page'] == 'vote' ? 'active' : '' ?>">
                        <a href="?page=vote" class="nav-link">Vote</a>
                    </li>
                    <li class="nav-link" <?= $_GET['page'] == 'results' ? 'active' : '' ?>>
                        <nav href="?page=results" class="nav-item">Results</nav>
                    </li>
                    <li class="nav-item">
                        <a href="?page=logout" class="nav-link">Logout</a>
                    </li>
                <!-- </ul> -->
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a href="?page=login" class="nav-link <?= $page == 'login' ? 'active' : '' ?>">Login</a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>