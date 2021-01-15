<div class="register_section">
    <div class="wrapper">
        <h1>Registrace</h1>
            <form method="post" action="?controller=user&action=AddUser" id="reg_form">
                <div class="reg_section">
                    <div class="reg_block">
                        <h4><i class="material-icons">person_outline</i> Vaší údaje</h4>    
                        <div class="row">
                            <div class="col s4">
                                <label for="name"><span class="must">*</span>Jmemo [Musi byt A-Z a-z 9-0]</label>
                                <input id="name" required pattern="[A-Za-z0-9]+" name="name" type="text" class="validate" 
                                value="{if isset($user_reg_name)}{$user_reg_name}{/if}">
                                <div class="error_handler name_error">
                                    {if isset($name_err)}
                                        {$name_err}
                                    {/if}
                                </div>
                            </div>
                            <div class="col s4">
                                <label for="last_name"><span class="must">*</span>Přijmení [Musi byt A-Z a-z 9-0]</label>
                                <input id="last_name" required pattern="[A-Za-z0-9]+" name="last_name" type="text"  class="validate"
                                value="{if isset($user_reg_surname)}{$user_reg_surname}{/if}">
                                <div class="error_handler surname_error">
                                    {if isset($surname_err)}
                                        {$surname_err}
                                    {/if}
                                </div>
                            </div>
                            <div class="col s4">
                                <label for="phone"><span class="must">*</span>Telefon [Musi byt 9-0]</label>
                                <input id="phone" required pattern="[0-9]+" name="phone" type="text" class="phone_input validate"
                                value="{if isset($user_reg_phone)}{$user_reg_phone}{/if}">
                                <div class="error_handler phone_error">
                                    {if isset($phone_err)}
                                        {$phone_err}
                                    {/if}
                                </div>
                            </div>
                            <div class="col s4">
                                <label for="email"><span class="must">*</span>Email [Musi byt A-Z a-z 9-0]</label>
                                <input id="email" required name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Špatny email format" type="email" class="email_input validate"
                                value="{if isset($user_reg_email)}{$user_reg_email}{/if}">
                                <div class="error_handler email_error">
                                    {if isset($email_err)}
                                        {$email_err}
                                    {/if}
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="reg_block">
                        <h4><i class="material-icons">build</i> Nastavení hesla</h4>    
                        <div class="row">
                            
                            <div class=" col s4">
                                <label for="pass"><span class="must">*</span>Heslo [Musi byt 9-0]</label>
                                <input id="pass" name="pass" required pattern="[0-9]+" type="password" class="validate pass_input">
                                <div class="error_handler pass_error">
                                    {if isset($pass_err)}
                                        {$pass_err}
                                    {/if}
                                </div>
                            </div>

                            <div class=" col s4">
                                <label for="pass_confirm"><span class="must">*</span>Potvrzení hesla [Musi byt 9-0]</label>
                                <input id="pass_confirm" name="pass_confirm" required pattern="[0-9]+" type="password" class="pass_confirm_input validate">
                                <div class="error_handler pass_confirm_error">
                                    {if isset($confirm_err)}
                                        {$confirm_err}
                                    {/if}
                                </div>
                            </div>
                            
                        </div>      
                        <div class="row">
                            <div class="col s4">
                                <button type="submit" name="register">Zaregistrovat se</button>
                                <div class="error_handler form_err">
                                    {if isset($form_err)}
                                        {$form_err}
                                    {/if}
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
        </form>
    </div>
</div>