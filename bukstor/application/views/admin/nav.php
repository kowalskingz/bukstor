        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url(); ?>index.php/administrator" class="site_title"><i class="fa fa-book"></i> <span>BUKSTOR</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
                    <a href="<?=base_url();?>index.php/administrator"><i class="fa fa-home"></i> Home </span></a>
                  </li>
                  <li>
                    <a href="<?=base_url();?>index.php/item"><i class="fa fa-book"></i> Buku </a>
                  </li>
                  <li>
                    <a href="<?=base_url();?>index.php/user"><i class="fa fa-home"></i> User </a>
                  </li>
                  <li>
                    <a href="<?=base_url();?>index.php/transaksi"><i class="fa fa-exchange"></i> Transaksi </a>
                  </li>
                  <li>
                    <a href="<?=base_url();?>index.php/transaksi/report"><i class="fa fa-sticky-note-o"></i> Laporan </a>
                  </li>     
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i> Admin
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?= base_url(); ?>index.php/administrator/edit_profil">Edit Profile</a></li>
                    <li>
                      <a href="<?= base_url(); ?>index.php/administrator/update_password">
                        <span>Ganti Password</span>
                      </a>
                    </li>
                    <li><a href="<?= base_url(); ?>index.php/login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->