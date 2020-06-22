<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../images/male2.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><!--?php echo $admin['firstname'].' '.$admin['lastname']; ?--></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="messages.php"><i class="fa fa-envelope"></i> <span>Messages</span></a>
      </li>
      <li class="header">MANAGE</li>
      <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
      <li><a href="ListPlaces.php"><i class="fa fa-home"></i> <span>Places</span></a></li>
      <li><a href="Add_New_Place.php"><i class="fa fa-dashboard"></i> <span>Add Place</span></a></li>
      <li><a href="../Logout.php"><i class="fa fa-users"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>