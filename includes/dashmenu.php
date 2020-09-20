<div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <!-- <div class="logo">
                    <a hef="index.html"><img src="images/logo.jpg" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div> -->
                <div class="navi">
                    <ul>
                        <li <?php if($active=='dashboard') echo "class='active'"; ?>><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Login & Security</span></a></li>
                        <li <?php if($active=='orders') echo "class='active'"; ?>><a href="orders.php" ><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Your Orders</span></a></li>
                        <li <?php if($active=='address') echo "class='active'"; ?>><a href="address.php"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Your Addresses</span></a></li>
                    </ul>
                </div>
            </div>