<?php
/* Smarty version 3.1.36, created on 2021-01-15 00:12:11
  from '/home/abdykili/www/views/admin/post-edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6000dddb5b8906_62485105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18cbfcb631dd528251bb9b5807003129cf56bbdf' => 
    array (
      0 => '/home/abdykili/www/views/admin/post-edit.tpl',
      1 => 1610668562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6000dddb5b8906_62485105 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="sidebar" data-color="purple" data-background-color="black" data-image="images/sidebar-2.jpg">

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
          <li class="nav-item">
            <a class="nav-link" href="?controller=admin&action=categories">
              <i class="material-icons">dashboard</i>
              <p>Kategorie</p>
            </a>
          </li>
          <li class="nav-item">
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
            <a class="navbar-brand" href="#">Editování inzerátu</a>
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
                  <h4 class="card-title ">Editování inzerátu číslo <?php echo $_smarty_tpl->tpl_vars['postId']->value;?>
 <a href="?controller=admin&action=categories">Zpátky</a></h4>
                  <p class="card-category">Editování inzerátu</p>
                </div>
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['postId']->value;?>
">
                        <div class="form_block post_edit_form green form_btn">
                            <button type="submit" name="makeVip">Přidat vip status</button>
                        </div>
                        <div class="form_block post_edit_form form_btn">
                            <button type="submit" name="delete">Odstranit</button>
                        </div>
                    </form>
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
