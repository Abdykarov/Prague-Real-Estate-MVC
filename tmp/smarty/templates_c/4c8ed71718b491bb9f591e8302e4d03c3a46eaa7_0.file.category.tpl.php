<?php
/* Smarty version 3.1.36, created on 2021-01-15 05:33:50
  from '/home/abdykili/www/views/default/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6001293ec17bd1_58620795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c8ed71718b491bb9f591e8302e4d03c3a46eaa7' => 
    array (
      0 => '/home/abdykili/www/views/default/category.tpl',
      1 => 1610688829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6001293ec17bd1_58620795 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="category_info">
    <div class="wrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="http://wa.toad.cz/~abdykili/">Hlavní stranka</a></li>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumbs']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                    <li><a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['CategoryName'];?>
</a></li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
        <div class="category_title">
            <h1><?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
</h1>
        </div>
        <div class="subcategories">
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['childCategories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <li><a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryName'];?>
</a></li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div>
</section>
<section class="main_category">
    <div class="wrapper">
        <div class="row">
            <div class="col s9 main_posts">
                <div class="filters">
                    <div class="row">
                        <div class="col s8 forms_flex">
                            <form method="post">
                                <input type="hidden" name="sortedType" value="byDateDESC">
                                <input type="submit" <?php if ($_smarty_tpl->tpl_vars['sorted']->value == 'byDateDESC') {?> class="active" <?php } else {
}?> value="Nejnovější">
                            </form>
                            <form method="post">
                                <input type="hidden" name="sortedType" value="byDateASC">
                                <input type="submit" <?php if ($_smarty_tpl->tpl_vars['sorted']->value == 'byDateASC') {?> class="active" <?php } else {
}?> value="Nejstarší">
                            </form>
                            <form method="post">
                                <input type="hidden" name="sortedType" value="byPriceASC">
                                <input type="submit" <?php if ($_smarty_tpl->tpl_vars['sorted']->value == 'byPriceASC') {?> class="active" <?php } else {
}?> value="Nejlevnější">
                            </form>
                            <form method="post">
                                <input type="hidden" name="sortedType" value="byPriceDESC">
                                <input type="submit" <?php if ($_smarty_tpl->tpl_vars['sorted']->value == 'byPriceDESC') {?> class="active" <?php } else {
}?> value="Nejdražší">
                            </form>
                        </div>
                        <div class="col s4">
                        </div>  
                    </div>
                </div>
                <div class="post_row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
                        <?php $_smarty_tpl->_assignInScope('images', explode(",",$_smarty_tpl->tpl_vars['post']->value['PostImage']));?>
                        <div class="post_item">
                            <div class="row">
                                <div class="col s6 post_img">
                                    <a href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['PostId'];?>
">
                                        <img src="http://wa.toad.cz/~abdykili/images/postImages/<?php echo $_smarty_tpl->tpl_vars['images']->value[0];?>
" alt="">
                                    </a>
                                </div>
                                <div class="col s6 post_img">
                                    <a href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['PostId'];?>
">
                                        <img src="http://wa.toad.cz/~abdykili/images/postImages/<?php echo $_smarty_tpl->tpl_vars['images']->value[1];?>
" alt="">
                                    </a>                               
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col s8 post_info">
                                    <a href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['PostId'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['PostName'];?>
</a>
                                    <p><?php echo $_smarty_tpl->tpl_vars['post']->value['PostAddress'];?>
</p>
                                    <span><?php echo $_smarty_tpl->tpl_vars['post']->value['PostPrice'];?>
 Kč </span>
                                </div>
                                <div class="col s4 add_love">
                                </div>
                            </div>
                        </div>  
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <div class="pagination">
                    <ul>
                    <?php
$_smarty_tpl->tpl_vars['id'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['id']->step = 1;$_smarty_tpl->tpl_vars['id']->total = (int) ceil(($_smarty_tpl->tpl_vars['id']->step > 0 ? $_smarty_tpl->tpl_vars['pageCount']->value+1+1 - (1) : 1-($_smarty_tpl->tpl_vars['pageCount']->value+1)+1)/abs($_smarty_tpl->tpl_vars['id']->step));
if ($_smarty_tpl->tpl_vars['id']->total > 0) {
for ($_smarty_tpl->tpl_vars['id']->value = 1, $_smarty_tpl->tpl_vars['id']->iteration = 1;$_smarty_tpl->tpl_vars['id']->iteration <= $_smarty_tpl->tpl_vars['id']->total;$_smarty_tpl->tpl_vars['id']->value += $_smarty_tpl->tpl_vars['id']->step, $_smarty_tpl->tpl_vars['id']->iteration++) {
$_smarty_tpl->tpl_vars['id']->first = $_smarty_tpl->tpl_vars['id']->iteration === 1;$_smarty_tpl->tpl_vars['id']->last = $_smarty_tpl->tpl_vars['id']->iteration === $_smarty_tpl->tpl_vars['id']->total;?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['paginationUrl']->value;
echo $_smarty_tpl->tpl_vars['id']->value;?>
" 
                        <?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['page']->value) {?>
                            class="active"
                        <?php } else { ?>
                        <?php }?>><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</a></li>
                    <?php }
}
?>              
                    </ul>
                </div>
            </div>
            
            <div class="col s3 side_posts">
                <h3>VIP inzeráty</h3>
                <div class="post_row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vipposts']->value, 'vipPost');
$_smarty_tpl->tpl_vars['vipPost']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vipPost']->value) {
$_smarty_tpl->tpl_vars['vipPost']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('image', explode(",",$_smarty_tpl->tpl_vars['vipPost']->value['PostImage']));?>

                    <div class="post_item">
                        <div class="row">
                            <div class="col s12">
                                <a href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['vipPost']->value['PostId'];?>
">
                                <img src="http://wa.toad.cz/~abdykili/images/postImages/<?php echo $_smarty_tpl->tpl_vars['image']->value[0];?>
" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 post_info">
                                <a href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['vipPost']->value['PostId'];?>
"><?php echo $_smarty_tpl->tpl_vars['vipPost']->value['PostName'];?>
</a>
                                <p><?php echo $_smarty_tpl->tpl_vars['vipPost']->value['PostAddress'];?>
</p>
                                <span><?php echo $_smarty_tpl->tpl_vars['vipPost']->value['PostPrice'];?>
 Kč </span>
                            </div>
                        </div>  
                    </div>    
                
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                     
                    
                </div>
            </div>
        </div>
    </div>
</section><?php }
}
