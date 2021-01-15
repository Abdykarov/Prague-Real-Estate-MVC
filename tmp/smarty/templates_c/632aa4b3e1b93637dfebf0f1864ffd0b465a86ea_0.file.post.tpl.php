<?php
/* Smarty version 3.1.36, created on 2021-01-15 05:51:09
  from '/home/abdykili/www/views/default/post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60012d4d55e3a8_00017361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '632aa4b3e1b93637dfebf0f1864ffd0b465a86ea' => 
    array (
      0 => '/home/abdykili/www/views/default/post.tpl',
      1 => 1610689867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60012d4d55e3a8_00017361 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="post_section">
    <div class="wrapper">
        <div class="row">
            <div class="col s12 post_slider">
                <?php $_smarty_tpl->_assignInScope('images', explode(",",$_smarty_tpl->tpl_vars['postData']->value[0]['PostImage']));?>

                <div id="primary-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                                <li class="splide__slide">
                                    <img src="http://wa.toad.cz/~abdykili/images/postImages/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="image">
                                </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    </div>
                </div>
                <div id="secondary-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
$_smarty_tpl->tpl_vars['image']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->do_else = false;
?>
                                <li class="splide__slide">
                                    <img src="http://wa.toad.cz/~abdykili/images/postImages/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="image">
                                </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>
                    </div>
                </div>

            </div>
            
        </div>

        <div class="row">
            <div class="col s9 post_container">
                <div class="row">
                    <div class="breadcrumbs">
                        <ul>
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
                </div>
                <div class="post_desc">
                    <div class="post_block">
                        <h1><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostName'];?>
</h1>
                        <h5><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostAddress'];?>
</h5>
                    </div>
                    
                    <div class="post_block">
                        <h4>Popís inzerátu</h4>
                        <p><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostDescription'];?>
</p>
                    </div>
                    <div class="post_block ">
                        <h4>Detailně o inzerátu</h4>
                        <div class="row">
                            <div class="col s6 post_attr">Číslo zakázky<span>PRE-<?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostId'];?>
-NPO281001</span></div>
                            <div class="col s6 post_attr">Jmeno autora<span><?php echo $_smarty_tpl->tpl_vars['userData']->value['Name'];?>
</span></div>
                            <div class="col s6 post_attr">Užitná plocha<span><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostArea'];?>
 &#13217;</span></div>
                            <div class="col s6 post_attr">Cena<span><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostPrice'];?>
 kč</span></div>
                            <div class="col s6 post_attr">Adresa<span><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostAddress'];?>
</span></div>
                            <div class="col s6 post_attr">Konstrukce budovy<span><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostConstruction'];?>
</span></div>
                            <div class="col s6 post_attr">Datum<span><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostDate'];?>
</span></div>
                            <div class="col s6 post_attr">Vlastnictví<span><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostOwnership'];?>
</span></div>
                            <div class="col s6 post_attr">Vip<span>(<?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['VipStatus'];?>
)</span></div>
                            <div class="col s6 post_attr">Stav bytu<span><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostCondition'];?>
</span></div>
                        </div>
                    </div>
                    <iframe id="map_iframe" height="350" src="https://maps.google.it/maps?q=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&output=embed"></iframe>
                </div>
                
            </div>
            <div class="col s3 post_aside">
                <div class="post_contacts">
                    <p><?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostPrice'];?>
 kč</p>
                    <div class="post_phone"><span>Telefon</span> <?php echo $_smarty_tpl->tpl_vars['userData']->value['Phone'];?>
</div>
                    <form action="?controller=user&action=startChat" method="post">
                        <input type="hidden" name="userId" value="<?php if ((isset($_smarty_tpl->tpl_vars['userId']->value))) {
echo $_smarty_tpl->tpl_vars['userId']->value;
}?>">
                        <input type="hidden" name="postAuthorId" value="<?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['AuthorId'];?>
">
                        <button type="submit" name="startChat">Napsat zprávu</button>
                    </form>
                    <h5> <i class='material-icons'>gps_fixed</i> <?php echo $_smarty_tpl->tpl_vars['postData']->value[0]['PostAddress'];?>
</h5>
                </div>               
           </div>
        </div>
        <div class="post_block post_details">
            <h4>Podobné nabídky</h4>
        </div>
        <div class="row">
            <div class="col s9">
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
            </div>
            <div class="col s3">
            </div>
        </div>
    
    </div>
</div><?php }
}
