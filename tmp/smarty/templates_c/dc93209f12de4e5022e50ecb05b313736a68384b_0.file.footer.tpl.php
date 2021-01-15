<?php
/* Smarty version 3.1.36, created on 2021-01-10 20:02:40
  from '/home/abdykili/www/views/admin/inc/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ffb5d60c54893_15666373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc93209f12de4e5022e50ecb05b313736a68384b' => 
    array (
      0 => '/home/abdykili/www/views/admin/inc/footer.tpl',
      1 => 1610308959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ffb5d60c54893_15666373 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="images/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="images/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="images/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="images/sidebar-4.jpg" alt="">
          </a>
        </li>
        
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="scripts/core/popper.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="scripts/core/bootstrap-material-design.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://unpkg.com/default-passive-events"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="scripts/plugins/perfect-scrollbar.jquery.min.js"><?php echo '</script'; ?>
>
  <!-- Place this tag in your head or just before your close body tag. -->
  <?php echo '<script'; ?>
 async defer src="https://buttons.github.io/buttons.js"><?php echo '</script'; ?>
>
  <!--  Google Maps Plugin    -->
  <?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"><?php echo '</script'; ?>
>
  <!-- Chartist JS -->
  <?php echo '<script'; ?>
 src="scripts/plugins/chartist.min.js"><?php echo '</script'; ?>
>
  <!--  Notifications Plugin    -->
  <?php echo '<script'; ?>
 src="scripts/plugins/bootstrap-notify.js"><?php echo '</script'; ?>
>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <?php echo '<script'; ?>
 src="scripts/material-dashboard.js?v=2.1.0"><?php echo '</script'; ?>
>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <?php echo '<script'; ?>
 src="scripts/admin.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="scripts/main.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
