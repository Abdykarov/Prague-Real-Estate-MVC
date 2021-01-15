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
          <li class="nav-item ">
            <a class="nav-link" href="?controller=admin&action=categories">
              <i class="material-icons">dashboard</i>
              <p>Kategorie</p>
            </a>
          </li>
          <li class="nav-item active">
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
            <a class="navbar-brand" href="#">Stránky</a>
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
                  <h4 class="card-title ">Uživately <a href="?controller=user&action=register">Vytvořit uživatela</a></h4>
                  <p class="card-category">Všechny Uživately</p>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">                    
                        <tr>
                        {foreach key=key item=item from=$users[0]}
                            <th>
                              {$key}
                            </th>
                        {/foreach}  
                        <th>
                        Edit
                        </th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach $users as $user}
                          <tr>
                          {foreach key=key item=item from=$user}
                            {if $key == 'Password'}
                              <td>
                                  Secret
                              </td>                            
                            {else}
                              <td>
                                {$item}
                              </td>
                            {/if}
                          {/foreach}
                          <td>
                            <a href="?controller=admin&action=users&deleteId={$user['Id']}">Delete</a>
                          </td>
                          </tr>
                        {/foreach}
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
  
