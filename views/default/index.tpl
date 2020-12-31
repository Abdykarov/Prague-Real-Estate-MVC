<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://www.iconarchive.com/download/i99461/webalys/kameleon.pics/Key.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/snow.css">
    <title>Prague Real Estate | {$pageTitle}</title>
</head>
<body class="let-it-snow">
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
                            <li><a href="#"><i class="material-icons">star_border</i> Zvolené</a></li>
                            <li><a href="?controller=user&action=login"><i class="material-icons">person_outline</i> Přihlásit</a></li>
                            <li><a href="#">Přidat inzerát</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header_info">
                <div class="header_info_text">
                       <h1>Prodej a pronájem nemovitostí v Praze</h1>
                    <h4>Vyberte si z 74 238 aktuálních nabídek realit</h4>
                </div>


                <div class="row">
                    <form method="post">
                     <div class="filter">

                                <div class="hidden_filter">
                                    
                                    <div class="hidden_form">
                                        <button value="Byt" class="button">Byt</button>
                                        <button value="Dum" class="button">Dum</button>
                                        <button value="Garaž" class="button">Garaž</button>
                                    </div>

                                </div>
                                <div class="input-field">
                                    <select>
                                        <option value="buy" selected>Koupit</option>
                                        <option value="rent">Pronajmout</option>
                                        </select>
                                </div>
                                <div class="input-field">
                                    <select multiple>
                                        <option value="" disabled selected>Počet pokojí</option>
                                        <option value="buy">1+kk</option>
                                        <option value="rent">2+kk</option>
                                        <option value="rent">2+kk</option>
                                        <option value="rent">2+kk</option>
                                        <option value="rent">2+kk</option>
                                        <option value="rent">2+kk</option>
                                        <option value="rent">2+kk</option>
                                        <option value="rent">2+kk</option>
                                        </select>
                                </div>
                                <div class="input-field filter_price">
                                    <input placeholder="Cena od" type="number" class="validate">
                                </div>
                                <div class="input-field filter_price">
                                    <input placeholder="do" type="number" class="validate">
                                </div>
                                <div class="input-field">
                                    <div class="custom_select">
                                        Byt
                                    </div>
                                </div>
                                <div class="input-field">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">
                                        <i class="material-icons right">search</i>
                                        </button>                        
                                </div>
                        </div>
                    </form>
                </div>
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
                                                        <a href="?controller=category&id={$grandChild['CategoryId']}">{$grandChild['CategoryName']}<span>98</span></a>
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
   