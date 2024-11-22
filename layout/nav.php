<nav  class="nav">
          <div id="search-wapper">
            <form method="post">
              <div class="search-wapper">
                <div class="d-flex search">
                    <input type="text" name="search" placeholder="Search" />
                </div>
                <button class="search-icon">
                    <i class="fa fa-search"></i>
                </button>
              </div>
            </form>
          </div>
          <div class="profile-wapper">
            <div>
                <?= $user['username'] ?>
            </div>
            <div class="dropdown">
              <div
                type="button"
                data-bs-toggle="dropdown"
              >
                <img class="profile" src="../assets/profile/<?= $user['profile'] ?>">
              </div>
              <form method="post">
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><button name="logout" class="dropdown-item">Logout</button></li>
                </ul>
              </form>
            </div>
          </div>
    </nav>