<?php
/* Smarty version 3.1.36, created on 2020-12-30 11:29:16
  from '/home/abdykili/www/views/default/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fec648c613077_81717601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c8ed71718b491bb9f591e8302e4d03c3a46eaa7' => 
    array (
      0 => '/home/abdykili/www/views/default/category.tpl',
      1 => 1609319770,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fec648c613077_81717601 (Smarty_Internal_Template $_smarty_tpl) {
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
 (280)</a></li>
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
                        <div class="col s8">
                            <ul>
                                <li><a href="#" class="active">Nejnovější</a></li>
                                <li><a href="#">Nejlevnější</a></li>
                                <li><a href="#">Nejdražší</a></li>
                            </ul>       
                        </div>
                        <div class="col s4">
                            <p>1-30 из 23521 nabídek</p>
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
                        <div class="post_item">
                            <div class="row">
                                <div class="col s6 post_img">
                                    <a href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['PostId'];?>
">
                                        <img src="https://sta-reality2.1gr.cz/sta/compile/thumbs/b/c/3/06d0bbb6f119bd9c75998b7b79b28.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col s6 post_img">
                                    <a href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['PostId'];?>
">
                                        <img src="https://sta-reality2.1gr.cz/sta/compile/thumbs/b/c/3/06d0bbb6f119bd9c75998b7b79b28.jpg" alt="">
                                    </a>                               
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col s8 post_info">
                                    <a href="?controller=post&id=<?php echo $_smarty_tpl->tpl_vars['post']->value['PostId'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['PostName'];?>
</a>
                                    <p>Vinohradská, Praha 10 - Strašnice</p>
                                    <span>8 813 600 Kč </span>
                                </div>
                                <div class="col s4 add_love">
                                    <a href="#" ><i class="small material-icons">favorite_border</i>  Přidat do oblíbených</a>
                                </div>
                            </div>
                        </div>  
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
            <div class="col s3 side_posts">
                <h3>VIP inzeráty</h3>
                <div class="post_row">
                    <div class="post_item">
                        <div class="row">
                            <div class="col s12">
                                <a href="#">
                                <img src="https://sta-reality2.1gr.cz/sta/compile/thumbs/b/c/3/06d0bbb6f119bd9c75998b7b79b28.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 post_info">
                                <a href="#">Prodej bytu 2+kk 50m2</a>
                                <p>Vinohradská, Praha 10 - Strašnice</p>
                                <span>8 813 600 Kč </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 add_love">
                                <a href="#"><i class="small material-icons">favorite_border</i> Přidat do oblíbených</a>
                            </div>
                        </div>
                    </div>    
                    <div class="post_item">
                        <div class="row">
                            <div class="col s12">
                                <a href="#">
                                <img src="https://sta-reality2.1gr.cz/sta/compile/thumbs/b/c/3/06d0bbb6f119bd9c75998b7b79b28.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 post_info">
                                <a href="#">Prodej bytu 2+kk 50m2</a>
                                <p>Vinohradská, Praha 10 - Strašnice</p>
                                <span>8 813 600 Kč </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 add_love">
                                <a href="#"><i class="small material-icons">favorite_border</i> Přidat do oblíbených</a>
                            </div>
                        </div>
                    </div> 
                    <div class="post_item">
                        <div class="row">
                            <div class="col s12">
                                <a href="#">
                                <img src="https://sta-reality2.1gr.cz/sta/compile/thumbs/b/c/3/06d0bbb6f119bd9c75998b7b79b28.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 post_info">
                                <a href="#">Prodej bytu 2+kk 50m2</a>
                                <p>Vinohradská, Praha 10 - Strašnice</p>
                                <span>8 813 600 Kč </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 add_love">
                                <a href="#"><i class="small material-icons">favorite_border</i> Přidat do oblíbených</a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section><?php }
}
