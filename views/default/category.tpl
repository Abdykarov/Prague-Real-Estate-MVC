<section class="category_info">
    <div class="wrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="http://wa.toad.cz/~abdykili/">Hlavní stranka</a></li>
                {foreach $breadcrumbs as $row}
                    <li><a href="?controller=category&id={$row['CategoryId']}">{$row['CategoryName']}</a></li>
                {/foreach}
            </ul>
        </div>
        <div class="category_title">
            <h1>{$categoryName}</h1>
        </div>
        <div class="subcategories">
            <ul>
                {foreach $childCategories as $category}
                    <li><a href="?controller=category&id={$category['CategoryId']}">{$category['CategoryName']} (280)</a></li>
                {/foreach}
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
                    {foreach $posts as $post}
                        <div class="post_item">
                            <div class="row">
                                <div class="col s6 post_img">
                                    <a href="?controller=post&id={$post['PostId']}">
                                        <img src="https://sta-reality2.1gr.cz/sta/compile/thumbs/b/c/3/06d0bbb6f119bd9c75998b7b79b28.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col s6 post_img">
                                    <a href="?controller=post&id={$post['PostId']}">
                                        <img src="https://sta-reality2.1gr.cz/sta/compile/thumbs/b/c/3/06d0bbb6f119bd9c75998b7b79b28.jpg" alt="">
                                    </a>                               
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col s8 post_info">
                                    <a href="?controller=post&id={$post['PostId']}">{$post['PostName']}</a>
                                    <p>Vinohradská, Praha 10 - Strašnice</p>
                                    <span>8 813 600 Kč </span>
                                </div>
                                <div class="col s4 add_love">
                                    <a href="#" ><i class="small material-icons">favorite_border</i>  Přidat do oblíbených</a>
                                </div>
                            </div>
                        </div>  
                    {/foreach}
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
</section>