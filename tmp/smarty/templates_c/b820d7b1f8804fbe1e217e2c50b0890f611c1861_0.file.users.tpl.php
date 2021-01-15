<?php
/* Smarty version 3.1.36, created on 2021-01-15 06:01:10
  from '/home/abdykili/www/views/admin/users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60012fa60730e3_00284225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b820d7b1f8804fbe1e217e2c50b0890f611c1861' => 
    array (
      0 => '/home/abdykili/www/views/admin/users.tpl',
      1 => 1610690447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60012fa60730e3_00284225 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="sidebar" data-color="purple" data-background-color="black" data-image="images/sidebar-2.jpg">
      
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Prague Real Estate
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="?controller=admin&action=index">
              <i class="material-icons">library_books</i>
              <p>Inzeráty</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?controller=admin&action=categories">
              <i class="material-icons">dashboard</i>
              <p>Kategorie</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="?controller=admin&action=users">
              <i class="material-icons">person</i>
              <p>Uživately</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Stránky</a>
          </div>
          
          <div class="collapse navbar-collapse justify-content-end">
            <div class="admin_block">
              <i class="material-icons">person</i> <?php echo $_smarty_tpl->tpl_vars['adminEmail']->value;?>

            </div>
          </div>

        </div>
      </nav>
      <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
            <div class="row">
                 <div class="col-md-12">
                 <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Uživately <a href="?controller=user&action=register">Vytvořit uživatela</a></h4>
                  <p class="card-category">Všechny Uživately</p>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">                    
                        <tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value[0], 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                            <th>
                              <?php echo $_smarty_tpl->tpl_vars['key']->value;?>

                            </th>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
                        <th>
                        Edit
                        </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                          <tr>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['key']->value == 'Password') {?>
                              <td>
                                  Secret
                              </td>                            
                            <?php } else { ?>
                              <td>
                                <?php echo $_smarty_tpl->tpl_vars['item']->value;?>

                              </td>
                            <?php }?>
                          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                          <td>
                            <a href="?controller=admin&action=users&deleteId=<?php echo $_smarty_tpl->tpl_vars['user']->value['Id'];?>
">Delete</a>
                          </td>
                          </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                </div>
            </div>
            </div>
        </div>
    </div>


  </div>
  
<?php }
}
