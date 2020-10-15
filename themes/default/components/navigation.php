<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Car Inventory</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/info">Auction Info</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/gallery">Photo Gallery</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="mailto:georgia@ftlauderdaleauction.com">Contact Auction</a>
                    </li>
                    
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Car Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                
                <ul class="navbar-nav ml-2">
                    <li class="nav-item">
                    <?php if(!$userInfo): ?>
                        <a href="/login.php" class="btn btn-outline-primary my-2 my-sm-0">Login</a>
                    <?php else: ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $userInfo['nickname']; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/logout.php">Log Out</a>
                                
                            </div>
                        </div>
                    <?php endif ?>
                    
                        
                    </li>
                </ul>
            </div>
        </nav>
