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
                  <h4 class="card-title ">Kategorie <a href="?controller=admin&action=createCategory">Vytvořit kategorii</a></h4>
                  <p class="card-category">Všechné kategorie</p>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">                    
                        {foreach key=key item=item from=$categories[0]}
                            {if $key == 'CategoryName'}
                            <th>
                              {$key}
                            </th>
                            {else}

                            {/if}
                        {/foreach}  
                      
                      </thead>
                      <tbody>
                        {foreach $categories as $category}
                          <tr>
                          {foreach key=key item=item from=$category}
                                {if $key == 'CategoryName'}
                                <td>
                                    {$item}
                                </td>
                                {else}

                                {/if}
                          {/foreach}
                         
                          </tr>
                          {if isset($category['ChildrenCategories'])}
                              {foreach $category['ChildrenCategories'] as $childrenCategory}
                              <tr>
                                  <td style="padding-left: 25px;">
                                      -- {$childrenCategory['CategoryName']}
                                  </td>
                                  
                              </tr>
                                 {if isset($childrenCategory['ChildrenCategories'])}
                                     {foreach $childrenCategory['ChildrenCategories'] as $grandChild}
                                     <tr>
                                        <td style="padding-left: 50px;">
                                            -- {$grandChild['CategoryName']}
                                        </td>
                                        
                                    </tr>
                                     {/foreach}
                                 {/if}
                              {/foreach}
                          {/if}
                        {/foreach}


                        <!-- {foreach $allCategories as $category}

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

            {/foreach} -->
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
  
