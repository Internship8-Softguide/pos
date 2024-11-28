<?php require_once ("../layout/header.php") ?>
<div class="content">
    <div class="innner-container">
        <div class="invoice-container">
            <div class="waiter-profile">
                <img src="../assets/profile/<?= $user['profile']?>" >
                <div class="waiter-profile-name">
                    <h3><?= $user['username']?></h3>
                    <p><?= $user['email']?></p>
                </div>
            </div>
            <div class="order-invoice table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th></th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Beef</td>
                            <td>3300</td>
                            <td>2</td>
                            <td class="invoice-action">
                                <button class="btn btn-secondary btn-sm">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                            <td>6600</td>
                        </tr>
                        <tr>
                            <td>Beef</td>
                            <td>3300</td>
                            <td>2</td>
                            <td class="invoice-action">
                                <button class="btn btn-secondary btn-sm">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                            <td>6600</td>
                        </tr>
                    </tbody>
                </table>   
            </div>  
            <div class="invoice-footer">
                <h3>Total</h3>
                <h3>1980 MMK</h3>
            </div>
        </div>
        <div class="main-content">
            <div class="customer-table">
                <?php $tables = get_tables($mysqli); ?>
                <?php while ($table = $tables->fetch_assoc()) { ?>  
                <a href="?tableId=<?= $table['id'] ?>" class="c-table 
                <?php if ($table['taken']) {
                    echo "taken";
                } else {
                    echo "free-table";
                } ?>
                "><?= $table['tableName'] ?></a>
                
                <?php } ?>
            </div>
            <div class="category-container">
                <?php $categories = get_category($mysqli); ?>
                <?php while ($category = $categories->fetch_assoc()) {?>
                <a class="select-category" href="?catId=1">
                    <img src="data:image/' . $type . ';base64,<?= $category['categoryImg'] ?>">
                    <p><?= $category['categoryName'] ?></p>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php require_once ("../layout/footer.php") ?>