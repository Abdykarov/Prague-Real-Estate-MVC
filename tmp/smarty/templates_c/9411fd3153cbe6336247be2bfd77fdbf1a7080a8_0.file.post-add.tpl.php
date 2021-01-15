<?php
/* Smarty version 3.1.36, created on 2021-01-15 03:51:55
  from '/home/abdykili/www/views/default/post-add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6001115b02f441_27163728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9411fd3153cbe6336247be2bfd77fdbf1a7080a8' => 
    array (
      0 => '/home/abdykili/www/views/default/post-add.tpl',
      1 => 1610682710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6001115b02f441_27163728 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="profile_section">
    <div class="wrapper">   
        <div class="row">
            <div class="post_main">
                <form method="post" id="add_post_form" enctype="multipart/form-data">
                <h1>Přidání inzerátu v Praze</h1>  
                <div class="category_path">
                    <ul></ul>
                </div>  
                <div class="post_block cat_block">
                    <h3><span class="must">*</span>Vyberte kategorii</h3>
                    <div class="error_handler category_error">
                        <?php if ((isset($_smarty_tpl->tpl_vars['post_cat_error']->value))) {?>
                            <?php echo $_smarty_tpl->tpl_vars['post_cat_error']->value;?>

                        <?php }?>
                    </div>
                    <div class="row">
                        <div class="col s4 post_cat main_categories">
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainCategories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                    <li data-index-number="<?php echo $_smarty_tpl->tpl_vars['category']->value['CategoryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value["CategoryName"];?>
</li>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </div>
                        <div class="col s4 post_cat child_categories">
                            <ul>

                            </ul>
                        </div>
                        <div class="col s4 post_cat grand_categories">
                            <ul>

                            </ul>
                        </div>
                    </div>
                    <input id="cat_hidden" type="hidden" name="category">
                </div>
            

                <div class="post_block">
                <h1><span class="must">*</span>Informace o inzerátu</h1>
                    <div class="row">
                        <div class="col s6">
                            <label for="name"><span class="must">*</span> Název</label>
                            <input id="name" name="name" type="text" class="validate"
                            value="<?php if ((isset($_smarty_tpl->tpl_vars['post_add_name']->value))) {
echo $_smarty_tpl->tpl_vars['post_add_name']->value;
}?>">
                            <div class="error_handler name_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_name_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_name_error']->value;?>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label for="price"><span class="must">*</span> Cena v kč</label>
                            <input id="price" name="price" type="text" class="validate"
                            value="<?php if ((isset($_smarty_tpl->tpl_vars['post_add_price']->value))) {
echo $_smarty_tpl->tpl_vars['post_add_price']->value;
}?>">
                            <div class="error_handler price_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_price_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_price_error']->value;?>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label for="address"><span class="must">*</span> Adresa v Praze</label>
                            <input id="address" name="address" type="text" class="validate"
                            value="<?php if ((isset($_smarty_tpl->tpl_vars['post_add_address']->value))) {
echo $_smarty_tpl->tpl_vars['post_add_address']->value;
}?>">

                            <div class="error_handler address_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_address_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_address_error']->value;?>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label for="square"><span class="must">*</span> Plocha m2</label>
                            <input id="square" name="square" type="text" class="validate"
                            value="<?php if ((isset($_smarty_tpl->tpl_vars['post_add_square']->value))) {
echo $_smarty_tpl->tpl_vars['post_add_square']->value;
}?>">

                            <div class="error_handler square_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_square_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_square_error']->value;?>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label for="desc"><span class="must">*</span> Popis inzerátu</label>
                            <textarea class="materialize-textarea" name="desc" id="desc"><?php if ((isset($_smarty_tpl->tpl_vars['post_add_desc']->value))) {
echo $_smarty_tpl->tpl_vars['post_add_desc']->value;
}?></textarea>
                            <div class="error_handler desc_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_desc_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_desc_error']->value;?>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="post_block">
                    <h4><span class="must">*</span>Forma vlastnictví</h4>
                    <div class="row post_flex">
                        <label>
                            <input name="owner" value="Osobní" type="radio" />
                            <span>Osobní</span>
                        </label>
                        <label>
                            <input name="owner" value="Družstevní" type="radio" />
                            <span>Družstevní</span>
                        </label>
                        <label>
                            <input name="owner" value="S.r.o." type="radio" />
                            <span>S.r.o.</span>
                        </label>
                        <label>
                            <input name="owner" value="Jiný" type="radio" />
                            <span>Jiný</span>
                        </label>
                    </div>
                    <div class="error_handler owner_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_owner_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_owner_error']->value;?>

                                <?php }?>
                    </div>
                    <h4><span class="must">*</span>Stav nemovitosti</h4>
                    <div class="row post_flex">
                         <label>
                            <input name="cond" value="Novostavba" type="radio" />
                            <span>Novostavba</span>
                        </label>
                         <label>
                            <input name="cond" value="Ve výstavbě" type="radio" />
                            <span>Ve výstavbě</span>
                        </label>
                         <label>
                            <input name="cond" value="Dobrý stav" type="radio" />
                            <span>Dobrý stav</span>
                        </label>
                         <label>
                            <input name="cond" value="Udržovaný" type="radio" />
                            <span>Udržovaný</span>
                        </label>
                         <label>
                            <input name="cond" value="Špatný stav" type="radio" />
                            <span>Špatný stav</span>
                        </label>
                         <label>
                            <input name="cond" value="Po rekonstrukci" type="radio" />
                            <span>Po rekonstrukci</span>
                        </label>
                         <label>
                            <input name="cond" value="Před rekonstrukci" type="radio" />
                            <span>Před rekonstrukci</span>
                        </label>
                         <label>
                            <input name="cond" value="K demolici" type="radio" />
                            <span>K demolici</span>
                        </label>
                    </div>
                    <div class="error_handler cond_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_cond_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_cond_error']->value;?>

                                <?php }?>
                    </div>
                    <h4><span class="must">*</span>Konstrukce</h4>
                    <div class="row post_flex">
                        <label>
                            <input name="const" value="Cihlová" type="radio" />
                            <span>Cihlová</span>
                        </label>
                        <label>
                            <input name="const" value="Panelová" type="radio" />
                            <span>Panelová</span>
                        </label>
                        <label>
                            <input name="const" value="Dřevěná" type="radio" />
                            <span>Dřevěná</span>
                        </label>
                        <label>
                            <input name="const" value="Kamenná" type="radio" />
                            <span>Kamenná</span>
                        </label>
                        <label>
                            <input name="const" value="Skeletová" type="radio" />
                            <span>Skeletová</span>
                        </label>
                        <label>
                            <input name="const" value="Montovaná" type="radio" />
                            <span>Montovaná</span>
                        </label>
                        <label>
                            <input name="const" value="Smíšená" type="radio" />
                            <span>Smíšená</span>
                        </label>
                    </div>
                    <div class="error_handler const_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_const_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_const_error']->value;?>

                                <?php }?>
                    </div>
                    <h4><span class="must">*</span>Foto</h4>
                    <div class="row">
                    <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Files</span>
                                <input type="file" id="files" name="file[]" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="file_input" type="text" placeholder="Upload one or more files">
                            </div>
                        </div>
                    <div class="col s6">
                        <p>Minimalně dvě fotky. První fotka bude hlavní - uživatelé ji uvidí dříve, než začnou listovat fotografiemi.</p>
                        <p>Každá fotka by neměla být větší 10 MB. . Fotografie by neměly obsahovat vodoznaky, loga nebo kontaktní údaje. Maximální počet fotografií ke stažení — 10</p>
                    </div>
                    </div>
                    <div class="error_handler file_error">
                                <?php if ((isset($_smarty_tpl->tpl_vars['post_file_error']->value))) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['post_file_error']->value;?>

                                <?php }?>
                    </div>
                </div>
            
            <button type="submit" name="add_post">Přídat inzerát</button>
                </form>

            </div>
        </div>
    </div>
</div><?php }
}
