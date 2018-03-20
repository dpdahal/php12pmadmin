<div class="nav">
    <div class="nav-top">
        <img src="<?=BASE_URL.'public/images/userimages/'.$_SESSION['user_image']?>">
        <h4><?=$_SESSION['user_name']?></h4>
        <p><?=$_SESSION['user_email']?></p>
    </div>

    <div class="navlinks">
        <div class="search-box">
            <form>
                <input type="text" class="search" placeholder="Search">
            </form>
        </div>
        <div class="menu">
            <ul>
                <li><a href="http://www.php12pm.com/admin/"><i class="glyphicon glyphicon-cloud"> </i> Dashboard</a></li>

                <li class="drop-down"><a href=""><i class="glyphicon glyphicon-user"> </i>  Users</a>
                    <ul>
                        <li><a href="http://www.php12pm.com/admin/add_user"><i class="fa fa-plus"></i> Add User</a></li>
                        <li><a href="http://www.php12pm.com/admin/users"><i class="fa fa-user"></i> Users</a></li>
                    </ul>
                </li>

                <li class="drop-down"><a href=""><i class="fa fa-image"> </i>  Gallery</a>
                    <ul>
                        <li><a href="http://www.php12pm.com/admin/add_category"><i class="fa fa-plus"></i> Add Category</a></li>
                        <li><a href="http://www.php12pm.com/admin/add_gallery"><i class="fa fa-user"></i> Add Gallery</a></li>
                        <li><a href="http://www.php12pm.com/admin/show_gallery"><i class="fa fa-image"></i> Show Gallery</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href=""><i class="fa fa-newspaper-o"> </i>  News</a>
                    <ul>

                        <li><a href="http://www.php12pm.com/admin/add_news"><i class="fa fa-newspaper-o"></i> Add News</a></li>
                        <li><a href="http://www.php12pm.com/admin/news"><i class="fa fa-newspaper-o"></i>  News</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div><!--end of navigation-->
