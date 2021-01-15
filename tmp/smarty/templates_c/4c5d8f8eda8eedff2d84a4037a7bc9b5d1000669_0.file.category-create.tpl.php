<?php
/* Smarty version 3.1.36, created on 2021-01-15 01:09:52
  from '/home/abdykili/www/views/admin/category-create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6000eb6054e068_80392174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c5d8f8eda8eedff2d84a4037a7bc9b5d1000669' => 
    array (
      0 => '/home/abdykili/www/views/admin/category-create.tpl',
      1 => 1610672991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6000eb6054e068_80392174 (Smarty_Internal_Template $_smarty_tpl) {
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
          <li class="nav-item">
            <a class="nav-link" href="?controller=admin&action=pages">
              <i class="material-icons">library_books</i>
              <p>Stranky</p>
            </a>
          </li>
          <li class="nav-item active">
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
            <a class="navbar-brand" href="#">Tvorba kategorie</a>
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
                  <h4 class="card-title ">Tvorba kategorie <a href="?controller=admin&action=categories">Zpátky</a></h4>
                  <p class="card-category">Všechné kategorie</p>
                </div>
                <div class="card-body">
                    <form method="post" id="admin_form">
                        <div class="form_block">
                            <label for="name">Jmeno</label>
                            <input type="text" required pattern="[A-Za-z0-9]+" id="name" name="categoryName">
                            <div class="error name_error">
                              <?php if ((isset($_smarty_tpl->tpl_vars['admin_name_error']->value))) {?>
                                <?php echo $_smarty_tpl->tpl_vars['admin_name_error']->value;?>

                              <?php }?>
                            </div>
                        </div>
                        <div class="category_pick_form">
                            <h4>Parent Category</h4>
                            <div class="error cat_error">
                              <?php if ((isset($_smarty_tpl->tpl_vars['admin_cat_error']->value))) {?>
                                <?php echo $_smarty_tpl->tpl_vars['admin_cat_error']->value;?>

                              <?php }?>
                            </div>
                            <input type="hidden" name="parentCategory" id="parentCategory">
                            <ul>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                <li data-categoryId="<?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryName'];?>
</li>
                                <?php if ((isset($_smarty_tpl->tpl_vars['category']->value['ChildrenCategories']))) {?>
                                 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['ChildrenCategories'], 'childrenCategory');
$_smarty_tpl->tpl_vars['childrenCategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['childrenCategory']->value) {
$_smarty_tpl->tpl_vars['childrenCategory']->do_else = false;
?>
                                    <li data-categoryId="<?php echo $_smarty_tpl->tpl_vars['childrenCategory']->value['CategoryId'];?>
" style="padding-left: 50px"><?php echo $_smarty_tpl->tpl_vars['childrenCategory']->value['CategoryName'];?>
</li>
                                 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </div>
                        
                        <div class="form_block form_btn">
                            <button type="submit" name="createCategory">Vytvořit</button>
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
