<div class="wrapper">
        <div class="row">
                    <form method="post" id="filterForm">
                        <input type="hidden" name='categoryId' id='hiddenCategory' value="">
                            <div class="filter">
                                <div class="input-field">
                                    <div class="custom_fields main_category_filter">
                                        <span data-categoryid="{$categoryId}">{$categoryName}</span>
                                        <ul class="main_category_filter_hidden">
                                            {foreach $mainCategories as $category}
                                                <li data-categoryid="{$category['CategoryId']}">{$category['CategoryName']}</li>
                                            {/foreach}
                                        </ul>
                                    </div>
                                    
                                </div>
                                <div class="input-field">
                                    <div class="custom_fields child_category_filter">
                                        <span data-categoryid=""></span>
                                        <ul class="child_category_filter_hidden">
                                            
                                        </ul>
                                    </div>
                                </div>

                                <div class="input-field">
                                    <div class="custom_fields grand_category_filter">
                                    <span data-categoryid=""></span>
                                        <ul class="grand_category_filter_hidden">
                                            
                                        </ul>
                                    </div>
                                </div>
                                
                                
                                <div class="input-field filter_price">
                                    <input placeholder="Cena od" type="number" pattern="[0-9]+" name="fromPrice" class="validate">
                                </div>
                                <div class="input-field filter_price">
                                    <input placeholder="do" type="number" pattern="[0-9]+" name="toPrice" class="validate">
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