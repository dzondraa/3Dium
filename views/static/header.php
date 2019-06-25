<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navb">
        <div class="container">

            <a class="navbar-brand" href="index.php?page=users">ARTICLES</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link porti" href="index.php?page=addNew">add new <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link about"  href="index.php?page=update">update/delete</a>
                </li>
                <?php
                if(isset($_SESSION['user'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link about'  href='models/users/logout.php'>log out</a>
                </li>";
                }
                ?>

        
            </ul>
         </div>
     </div>
    </nav>

</div>