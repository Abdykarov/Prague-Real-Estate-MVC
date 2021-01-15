<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://www.iconarchive.com/download/i99461/webalys/kameleon.pics/Key.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/notification.css">
    <link rel="stylesheet" media="print" href="styles/print.css">

    {if isset($dark)}
    <link rel="stylesheet" href="styles/dark.css">
    {/if}
    <noscript>
        <link rel="stylesheet" href="styles/noscript.css">
    </noscript>
    <link rel="stylesheet" href="styles/snow.css">
    <title>Prague Real Estate | {$pageTitle}</title>
</head>
<body {if isset($snow)} class="let-it-snow" {/if}>
    <div class="preloader">
        <img src="https://fashionnails-shop.ru/image/catalog/lazyload.gif"  alt="">
    </div>
    <header>
        <div class="wrapper">
            <div class="nav_block">
                <div class="row">
                    <div class="col s4 logo">
                        <a href="#">Prague RE</a>
                    </div>
                    <div class="col s8 nav">
                        <ul>
                            <li><form method="post"><button type="submit" name="snow"><i class="material-icons">ac_unit</i></button></form>
                            <li><form method="post"><button type="submit" name="dark"><i class="material-icons">brightness_2</i></button></form>
                            {if isset($userEmail)}
                                <li><a href="?controller=user&action=index"><i class="material-icons">person_outline</i> {$userEmail}</a></li>
                            {else}
                                <li><a href="?controller=user&action=login"><i class="material-icons">person_outline</i> Přihlásit</a></li>
                            {/if}
                            <li><a href="?controller=post&action=add">Přidat inzerát</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header_info">
                <div class="header_info_text">
                       <h1>Prodej a pronájem nemovitostí v Praze</h1>
                    <h4>Vyberte si z {$postsCount} aktuálních nabídek realit</h4>
                </div>


                <div class="row">
                    <form method="post" id="filterForm">
                        <input type="hidden" name='categoryId' id='hiddenCategory' value="">
                            <div class="filter">
                                <div class="input-field">
                                    <div class="custom_fields main_category_filter">
                                        <span data-categoryid="{$mainCategories[0]['CategoryId']}">{$mainCategories[0]['CategoryName']}</span>
                                        <ul class="main_category_filter_hidden">
                                            {foreach $mainCategories as $category}
                                                <li data-categoryid="{$category['CategoryId']}">{$category['CategoryName']}</li>
                                            {/foreach}
                                        </ul>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="custom_fields child_category_filter">
                                        <span data-categoryid=""><span class="category_placeholder">Vyberte kategorii</span></span>
                                        <ul class="child_category_filter_hidden">
                                            
                                        </ul>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <div class="custom_fields grand_category_filter">
                                    <span data-categoryid=""><span class="category_placeholder">Vyberte kategorii</span></span>
                                        <ul class="grand_category_filter_hidden">
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                
                                <div class="input-field filter_price">
                                    <input placeholder="Cena od" type="number" name="fromPrice" class="validate">
                                </div>
                                <div class="input-field filter_price">
                                    <input placeholder="do" type="number" name="toPrice" class="validate">
                                </div>
                                <div class="input-field">
                                    <button class="btn waves-effect waves-light" type="submit" name="filter">
                                        <i class="material-icons right">search</i>
                                        </button>                        
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    
    <main>
        <div class="sub_nav">
            <ul>
                {foreach $mainCategories as $category}
                    <li><a href="?controller=category&id={$category['CategoryId']}">{$category['CategoryName']}</a></li>
                {/foreach}
                
            </ul>
        </div>
        <div class="main_categories">

            {foreach $allCategories as $category}

                <div class="category_block">
                    
                    <div class="row">
                        <div class="col s5">
                            {if isset($category['CategoryImage'])}
                                <img src="images/{$category['CategoryImage']}.png" alt="">
                            {else}
                                <img src="images/cat1.png" alt="">
                            {/if}
                        </div>

                        <div class="col s7">
                            <h3>{$category['CategoryName']}</h3>
                            {if isset($category['ChildrenCategories'])}
                                {foreach $category['ChildrenCategories'] as $childrenCategory}
                                    <div class="category_sub">
                                        <a href="?controller=category&id={$childrenCategory['CategoryId']}">{$childrenCategory['CategoryName']}</a>
                                        <div class="row">
                                            {if isset($childrenCategory['ChildrenCategories'])}
                                                {foreach $childrenCategory['ChildrenCategories'] as $grandChild}
                                                    <div class="col s6">
                                                        <a href="?controller=category&id={$grandChild['CategoryId']}">{$grandChild['CategoryName']}
                                                        <span>
                                                        {if isset($grandChild['PostsCount'])}
                                                            {$grandChild['PostsCount']}
                                                        {else}
                                                            0
                                                        {/if}
                                                        </span></a>
                                                    </div>
                                                {/foreach}
                                                
                                            {/if}
                                        </div>
                                    </div>
                                {/foreach}
                            {/if}
                        </div>
                    </div>
                </div>

            {/foreach}

        </div>

    </main>