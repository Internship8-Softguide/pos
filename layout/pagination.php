<nav >
            <ul class="pagination pagination-sm"> 
              <?php for ($i = 0;$i < $pagTotal;$i++) { ?>
                <?php if ($currentPage == $i * 5) { ?>
                <li class="page-item active">
                  <a class="page-link"><?= $i + 1 ?></a>
                </li>
                <?php } else { ?>
                  <li class="page-item">
                  <a class="page-link" href="?pageNo=<?= $i * 5 ?>"><?= $i + 1 ?></a>
                </li>
              <?php }
                } ?>
            </ul>
          </nav>