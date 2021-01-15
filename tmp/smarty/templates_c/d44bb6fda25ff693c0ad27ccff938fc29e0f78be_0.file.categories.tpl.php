<?php
/* Smarty version 3.1.36, created on 2021-01-15 06:00:50
  from '/home/abdykili/www/views/admin/categories.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60012f92813b39_01739714',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd44bb6fda25ff693c0ad27ccff938fc29e0f78be' => 
    array (
      0 => '/home/abdykili/www/views/admin/categories.tpl',
      1 => 1610690447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60012f92813b39_01739714 (Smarty_Internal_Template $_smarty_tpl) {
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
            <a class="navbar-brand" href="#">Kategorie</a>
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
                  <h4 class="card-title ">Kategorie <a href="?controller=admin&action=createCategory">Vytvořit kategorii</a></h4>
                  <p class="card-category">Všechné kategorie</p>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">                    
                       <tr>
                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value[0], 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['key']->value == 'CategoryName') {?>
                            <th>
                              <?php echo $_smarty_tpl->tpl_vars['key']->value;?>

                            </th>
                            <?php } else { ?>

                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>  
                       </tr>
                      
                      </thead>
                      <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                          <tr>
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                <?php if ($_smarty_tpl->tpl_vars['key']->value == 'CategoryName') {?>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['item']->value;?>

                                </td>
                                <?php } else { ?>

                                <?php }?>
                          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                         
                          </tr>
                          <?php if ((isset($_smarty_tpl->tpl_vars['category']->value['ChildrenCategories']))) {?>
                              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['ChildrenCategories'], 'childrenCategory');
$_smarty_tpl->tpl_vars['childrenCategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['childrenCategory']->value) {
$_smarty_tpl->tpl_vars['childrenCategory']->do_else = false;
?>
                              <tr>
                                  <td style="padding-left: 25px;">
                                      -- <?php echo $_smarty_tpl->tpl_vars['childrenCategory']->value['CategoryName'];?>

                                  </td>
                                  
                              </tr>
                                 <?php if ((isset($_smarty_tpl->tpl_vars['childrenCategory']->value['ChildrenCategories']))) {?>
                                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['childrenCategory']->value['ChildrenCategories'], 'grandChild');
$_smarty_tpl->tpl_vars['grandChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['grandChild']->value) {
$_smarty_tpl->tpl_vars['grandChild']->do_else = false;
?>
                                     <tr>
                                        <td style="padding-left: 50px;">
                                            -- <?php echo $_smarty_tpl->tpl_vars['grandChild']->value['CategoryName'];?>

                                        </td>
                                        
                                    </tr>
                                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                 <?php }?>
                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                          <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                        <!-- <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCategories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>

                <div class="category_block">
                    
                    <div class="row">
                        <div class="col s5">
                            <?php if ((isset($_smarty_tpl->tpl_vars['category']->value['CategoryImage']))) {?>
                                <img src="images/<?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryImage'];?>
.png" alt="">
                            <?php } else { ?>
                                <img src="images/cat1.png" alt="">
                            <?php }?>
                        </div>

                        <div class="col s7">
                            <h3><?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryName'];?>
</h3>
                            <?php if ((isset($_smarty_tpl->tpl_vars['category']->value['ChildrenCategories']))) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['ChildrenCategories'], 'childrenCategory');
$_smarty_tpl->tpl_vars['childrenCategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['childrenCategory']->value) {
$_smarty_tpl->tpl_vars['childrenCategory']->do_else = false;
?>
                                    <div class="category_sub">
                                        <a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['childrenCategory']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['childrenCategory']->value['CategoryName'];?>
</a>
                                        <div class="row">
                                            <?php if ((isset($_smarty_tpl->tpl_vars['childrenCategory']->value['ChildrenCategories']))) {?>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['childrenCategory']->value['ChildrenCategories'], 'grandChild');
$_smarty_tpl->tpl_vars['grandChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['grandChild']->value) {
$_smarty_tpl->tpl_vars['grandChild']->do_else = false;
?>
                                                    <div class="col s6">
                                                        <a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['grandChild']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['grandChild']->value['CategoryName'];?>

                                                        <span>
                                                        <?php if ((isset($_smarty_tpl->tpl_vars['grandChild']->value['PostsCount']))) {?>
                                                            <?php echo $_smarty_tpl->tpl_vars['grandChild']->value['PostsCount'];?>

                                                        <?php } else { ?>
                                                            0
                                                        <?php }?>
                                                        </span></a>
                                                    </div>
                                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                
                                            <?php }?>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php }?>
                        </div>
                    </div>
                </div>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> -->
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
