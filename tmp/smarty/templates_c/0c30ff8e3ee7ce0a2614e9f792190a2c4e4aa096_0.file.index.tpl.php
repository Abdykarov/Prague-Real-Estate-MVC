<?php
/* Smarty version 3.1.36, created on 2021-01-15 05:59:14
  from '/home/abdykili/www/views/admin/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60012f3286c781_63761339',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c30ff8e3ee7ce0a2614e9f792190a2c4e4aa096' => 
    array (
      0 => '/home/abdykili/www/views/admin/index.tpl',
      1 => 1610690353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60012f3286c781_63761339 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/abdykili/www/library/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<div class="sidebar" data-color="purple" data-background-color="black" data-image="images/sidebar-2.jpg">
      
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Prague Real Estate
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
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
          <li class="nav-item ">
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
            <a class="navbar-brand" href="#">Inzeraty</a>
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
                  <h4 class="card-title">Inzeraty <a href="?controller=post&action=add">Vytvořit nový</a></h4>
                  <p class="card-category">Všechny inzeraty</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">                    
                        <tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value[0], 'item', false, 'key');
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
                        Edit post
                        </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                          <tr>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['key']->value == 'PostDescription') {?>
                              <td>
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value,10);?>

                              </td>
                            <?php } elseif ($_smarty_tpl->tpl_vars['key']->value == 'PostImage') {?>
                              <td>
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value,10);?>

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
                          <a href="?controller=admin&action=editPost&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['PostId'];?>
">edit</a>
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
