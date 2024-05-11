
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url(route_to('admindashboard')); ?>">
                    <i class="ti-shield menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
    
            <?php
            if (in_array('super-admin',session()->get('permissions')) || in_array('view-events',session()->get('permissions')))
            {
            ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-events" aria-expanded="false" aria-controls="ui-events">
                        <i class="ti-palette menu-icon"></i>
                        <span class="menu-title">Events</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-events">
                        <ul class="nav flex-column sub-menu">

                            <?php
                            if (in_array('super-admin',session()->get('permissions')) || in_array('add-events',session()->get('permissions'))) {
                                //echo "<li class='nav-item'> <a class='nav-link' href='".base_url(route_to('addevent'))."'>Add Event</a></li>";
                            }
                            ?>

                            <?php
                            if (in_array('super-admin',session()->get('permissions')) || in_array('view-events',session()->get('permissions'))) {
                                echo "<li class='nav-item'> <a class='nav-link' href='".base_url(route_to('viewevents'))."'>View Events</a></li>";
                            }
                            ?>

                            <?php
                            if (in_array('super-admin',session()->get('permissions')) || in_array('add-category',session()->get('permissions'))) {
                                // echo "<li class='nav-item'> <a class='nav-link' href='".base_url(route_to('addcategory'))."'>Add Category</a></li>";
                            }
                            ?>

                            <?php
                            if (in_array('super-admin',session()->get('permissions')) || in_array('view-categories',session()->get('permissions'))) {
                                echo "<li class='nav-item'> <a class='nav-link' href='".base_url(route_to('viewcategories'))."'>View Categories</a></li>";
                            }
                            ?>

                        </ul>
                    </div>
                </li>
            <?php
            }
            ?>
    </nav>
