<div class="sidebar" data-color="purple" data-background-color="black" data-image="images/sidebar-2.jpg">

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
              <i class="material-icons">person</i> {$adminEmail}
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
                              {if isset($admin_name_error)}
                                {$admin_name_error}
                              {/if}
                            </div>
                        </div>
                        <div class="category_pick_form">
                            <h4>Parent Category</h4>
                            <div class="error cat_error">
                              {if isset($admin_cat_error)}
                                {$admin_cat_error}
                              {/if}
                            </div>
                            <input type="hidden" name="parentCategory" id="parentCategory">
                            <ul>
                            {foreach $categories as $category}
                                <li data-categoryId="{$category['CategoryId']}">{$category['CategoryName']}</li>
                                {if isset($category['ChildrenCategories'])}
                                 {foreach $category['ChildrenCategories'] as $childrenCategory}
                                    <li data-categoryId="{$childrenCategory['CategoryId']}" style="padding-left: 50px">{$childrenCategory['CategoryName']}</li>
                                 {/foreach}
                                {/if}
                            {/foreach}
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
  
