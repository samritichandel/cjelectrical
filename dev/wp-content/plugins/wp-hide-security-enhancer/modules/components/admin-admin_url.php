<?php

    class WPH_module_admin_admin_url extends WPH_module_component
        {
            function get_component_title()
                {
                    return "Admin URL";
                }
                                    
            function get_module_settings()
                {
                    $this->module_settings[]                  =   array(
                                                                        'id'            =>  'admin_url',
                                                                        'label'         =>  'New Admin Url',
                                                                        'description'   =>  array(
                                                                                                    __('Create a new admin url instead default /wp-admin and /login.',  'wp-hide-security-enhancer'),
                                                                                                    '<div class="notice-error"><div class="dashicons dashicons-warning important" alt="f534">warning</div> <span class="important">' . __('Write down your new admin url, or if lost, will not be able to log-in.',  'wp-hide-security-enhancer') . " " . __('An e-mail will be sent to',  'wp-hide-security-enhancer') . " " . get_option('admin_email') . " " . __('with the new Login URL',  'wp-hide-security-enhancer') . '</span></div>',
                                                                                                    '<div class="notice-error"><div class="dashicons dashicons-warning important" alt="f534">warning</div> <span class="important">' . __('If unable to access the login / admin section anymore, use the Recovery Link which reset links to default: ',  'wp-hide-security-enhancer') . '<br /><b class="pointer">' . site_url() . '?wph-recovery='.  $this->wph->functions->get_recovery_code()  .'</b></div>' 
                                                                                                    ),                                                                        
                                                                        'input_type'    =>  'text',
                                                                        
                                                                        'sanitize_type' =>  array(array($this->wph->functions, 'sanitize_file_path_name')),
                                                                        'processing_order'  =>  60
                                                                        
                                                                        );
                                                                    
                    $this->module_settings[]                  =   array(
                                                                        'id'            =>  'block_default_admin_url',
                                                                        'label'         =>  'Block default Admin Url',
                                                                        'description'   =>  array(
                                                                                                    __('Block default admin url and files from being accesible.',  'wp-hide-security-enhancer')
                                                                                                    ),
                                                                        'input_type'    =>  'radio',
                                                                        'options'       =>  array(
                                                                                                    'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                    'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                    ),
                                                                        'default_value' =>  'no',
                                                                        
                                                                        'sanitize_type' =>  array('sanitize_title', 'strtolower'),
                                                                        'processing_order'  =>  65
                                                                        
                                                                        );
                                                                    
                    return $this->module_settings;   
                }
                
                
                
            function _init_admin_url($saved_field_data)
                {
                    //check if the value has changed, e-mail the new url to site administrator
                    $previous_url   =   get_option('wph-previous-admin-url');
                    if($saved_field_data    !=  $previous_url)
                        {
                            $this->new_url_email_nottice($saved_field_data); 
                            update_option('wph-previous-admin-url', $saved_field_data);  
                        }
                    
                    if(empty($saved_field_data))
                        return FALSE;
                    
                    //conflict handle with other plugins
                    include_once(WPH_PATH . 'conflicts/wp-simple-firewall.php');
                    WPH_conflict_handle_wp_simple_firewall::custom_login_check();
                    
                    $default_url    =   $this->wph->functions->get_url_path( trailingslashit(    site_url()  ) .  'wp-admin'   );
                    $new_url        =   $this->wph->functions->get_url_path( trailingslashit(    site_url()  ) .  $saved_field_data   );
                    
                                        
                    //add replacement
                    $this->wph->functions->add_replacement( $default_url, $new_url);
                        
                    //add_filter('admin_url',             array($this,'admin_url'), 999, 3 ); 
                    add_action('set_auth_cookie',       array($this,'set_auth_cookie'), 999, 5);
                    
                    //?????
                    //add_filter('style_loader_src',      array($this->wph, 'generic_string_replacement' ), 999);
                    
                    //add_filter('wp_default_scripts',    array($this, 'wp_default_scripts' ), 999);
                }
                
            function _callback_saved_admin_url($saved_field_data)
                {
                    $processing_response    =   array();
                    
                    //check if the field is noe empty
                    if(empty($saved_field_data))
                        return  $processing_response; 
          
                    $admin_url =   $this->wph->functions->get_url_path( trailingslashit(    site_url()  ) .  'wp-admin'   );
                    
                    $path           =   '';
                    if(!empty($this->wph->default_variables['wordpress_directory']))
                        $path           =   trailingslashit($this->wph->default_variables['wordpress_directory']);
                    $path           .=  trailingslashit(   $saved_field_data   );
          
                    if($this->wph->server_htaccess_config   === TRUE)
                        {
                            $text   =       "\nRewriteCond %{REQUEST_URI} ".   $saved_field_data    ."$";
                            $text   .=      "\nRewriteRule ^(.*)$ ".   $saved_field_data    ."/ [R=301,L]";
                            $text   .=      "\nRewriteRule ^"    .   $path    .   '(.*) '. $admin_url .'$1 [L,QSA]';
                        }
                        
                    if($this->wph->server_web_config   === TRUE)
                            $text   = '
                                        <rule name="wph-admin_url1" stopProcessing="true">  
                                            <match url="^(.*)$" />  
                                            <conditions>  
                                                <add input="{REQUEST_URI}" matchType="Pattern" pattern="$saved_field_data$"  />  
                                            </conditions>  
                                            <action type="Redirect" redirectType="Permanent" url="'.    $saved_field_data   .'{R:1}/" />  
                                        </rule>
                                        <rule name="wph-admin_url2" stopProcessing="true">
                                            <match url="^'.  $path   .'(.*)"  />
                                            <action type="Rewrite" url="'.  $admin_url .'{R:1}"  appendQueryString="true" />
                                        </rule>
                                                            ';
                                   
                    $processing_response['rewrite']        =   $text;
                    $processing_response['page_refresh']    =   TRUE;
                                                    
                    return  $processing_response;   
                }
                
                
            function admin_url($url, $path, $blog_id)
                {
                    if($this->wph->uninstall === TRUE)
                        return $url; 
                            
                    $new_admin_url =   $this->wph->functions->get_module_item_setting('admin_url');
                       
                    $admin_dir_uri      =   trailingslashit(    site_url()  )   . trim($new_admin_url,  "/");
                    $new_url            =   trailingslashit(    $admin_dir_uri  )   .   $path;
                    
                    //add replacement
                    $this->wph->functions->add_replacement($url, $new_url);
                    
                    return $new_url;
                       
                }
               
            function set_auth_cookie($auth_cookie, $expire, $expiration, $user_id, $scheme) 
                {
                    
                    $new_admin_url =   $this->wph->functions->get_module_item_setting('admin_url');

                    if ( $scheme == 'secure_auth' ) 
                        {
                            $auth_cookie_name = SECURE_AUTH_COOKIE;
                            $secure = TRUE;
                        } 
                    else 
                        {
                            $auth_cookie_name = AUTH_COOKIE;
                            $secure = FALSE;
                        }        
                    
                    setcookie($auth_cookie_name, $auth_cookie, $expire, SITECOOKIEPATH  .   $new_admin_url, COOKIE_DOMAIN, $secure, true);
                  
                    $manager            =   WP_Session_Tokens::get_instance( $user_id );
                    $token              =   $manager->create( $expiration );
                    
                    $logged_in_cookie   =   wp_generate_auth_cookie( $user_id, $expiration, 'logged_in', $token );
                   
                }
              
            function wp_default_scripts($scripts)
                {
                    //check if custom admin url is set
                    $admin_url     =   $this->wph->functions->get_module_item_setting('admin_url');
                    if (empty(  $admin_url ))
                        return;
                    
                    //update default dirs
                    if(isset($scripts->default_dirs))
                        {
                            foreach($scripts->default_dirs    as  $key    =>  $value)
                                {
                                    $scripts->default_dirs[$key]  =   str_replace('wp-admin', $admin_url, $value);
                                }
                        }
                       
                    foreach($scripts->registered    as  $script_name    =>  $script_data)
                        {
                            $script_data->src   =   str_replace('wp-admin', $admin_url, $script_data->src);
                            
                            $scripts->registered[$script_name]  =   $script_data;      
                        }
                }
            
            
            function new_url_email_nottice($new_url)
                {
                    if(empty($new_url))
                        $new_url    =   'wp-admin';
                    
                    $to         =   get_option('admin_email');
                    $subject    =   'New Login Url for your WordPress - ' .get_option('blogname');
                    $message    =   __('Hello',  'wp-hide-security-enhancer') . ", \n\n" 
                                    . __('This is an automated message to inform that your login url has been changed at',  'wp-hide-security-enhancer') . " " .  trailingslashit(site_url()) . "\n"
                                    . __('The new login url is',  'wp-hide-security-enhancer') .  ": " . trailingslashit( trailingslashit(site_url()) .  $new_url) . "\n\n"
                                    . __('Additionality you can use this to recover the old login / admin links ',  'wp-hide-security-enhancer') .  ": " . site_url() . '?wph-recovery='.  $this->wph->functions->get_recovery_code() . "\n\n"
                                    . __('Please keep this url safe for recover, if forgot',  'wp-hide-security-enhancer') . ".";
                    $headers = 'From: '.  get_option('blogname') .' <'.  get_option('admin_email')  .'>' . "\r\n";
                    $this->wph->functions->wp_mail( $to, $subject, $message, $headers );   
                }
            
            
            function _init_block_default_admin_url($saved_field_data)
                {
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
       
                }
                
            function _callback_saved_block_default_admin_url($saved_field_data)
                {
                    $processing_response    =   array();
                    
                    //check if the field is noe empty
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return  $processing_response; 
          
                    //prevent from blocking if the admin_url is empty
                    $admin_url     =   $this->wph->functions->get_module_item_setting('admin_url');
                    if (empty(  $admin_url ))
                        return FALSE;  
          
                    $site_index =   $this->wph->functions->get_url_path  (   trailingslashit(    site_url()  )   .   'index.php',    TRUE );
                    
                    $path           =   '';
                    if(!empty($this->wph->default_variables['wordpress_directory']))
                        $path           =   trailingslashit($this->wph->default_variables['wordpress_directory']);
                                
                    if($this->wph->server_htaccess_config   === TRUE)
                        {           
                            $text   =       "RewriteCond %{ENV:REDIRECT_STATUS} ^$\n";
                            $text   .=      "RewriteRule ^wp-admin(.*) $site_index [L]\n";
                            $text   .=      "RewriteCond %{ENV:REDIRECT_STATUS} ^$\n";
                            
                            //theme my login usage
                            //$text   .=      "RewriteRule ^login(.*) $site_index?throw_404 [L]\n";
                            //$text   .=      "RewriteCond %{ENV:REDIRECT_STATUS} ^$\n";
                            
                            $text   .=      "RewriteRule ^dashboard(.*) $site_index [L]\n";
                            $text   .=      "RewriteCond %{ENV:REDIRECT_STATUS} ^$\n";
                            $text   .=      "RewriteRule ^admin(.*) $site_index [L]\n";
                            
                            if(!empty($path))
                                {
                                    $text   .=      "RewriteCond %{ENV:REDIRECT_STATUS} ^$\n";
                                    $text   .=      "RewriteRule ^".$path."wp-admin(.*) $site_index [L]\n";
                                    $text   .=      "RewriteCond %{ENV:REDIRECT_STATUS} ^$\n";
                                    $text   .=      "RewriteRule ^".$path."dashboard(.*) $site_index [L]\n";
                                    $text   .=      "RewriteCond %{ENV:REDIRECT_STATUS} ^$\n";
                                    $text   .=      "RewriteRule ^".$path."admin(.*) $site_index [L]";                               
                                }
                        }
                        
                    if($this->wph->server_web_config   === TRUE)
                        {
                            $text   = '
                                        <rule name="wph-block_default_admin_url1" stopProcessing="true">
                                            <match url="^wp-admin(.*)"  />
                                            <action type="Rewrite" url="'.  $site_index .'" />
                                        </rule>
                                        <rule name="wph-block_default_admin_url2" stopProcessing="true">
                                            <match url="^dashboard(.*)"  />
                                            <action type="Rewrite" url="'.  $site_index .'" />
                                        </rule>
                                        <rule name="wph-block_default_admin_url3" stopProcessing="true">
                                            <match url="^admin(.*)"  />
                                            <action type="Rewrite" url="'.  $site_index .'" />
                                        </rule>
                                                            ';
                            if(!empty($path))
                                {
                                    $text   .= '
                                        <rule name="wph-block_default_admin_url4" stopProcessing="true">
                                            <match url="^'. $path   .'wp-admin(.*)"  />
                                            <action type="Rewrite" url="'.  $site_index .'" />
                                        </rule>
                                        <rule name="wph-block_default_admin_url5" stopProcessing="true">
                                            <match url="^'. $path   .'dashboard(.*)"  />
                                            <action type="Rewrite" url="'.  $site_index .'" />
                                        </rule>
                                        <rule name="wph-block_default_admin_url6" stopProcessing="true">
                                            <match url="^'. $path   .'admin(.*)"  />
                                            <action type="Rewrite" url="'.  $site_index .'" />
                                        </rule>
                                                            ';                              
                                }    
                            
                            
                        }
                        
                               
                    $processing_response['rewrite'] = $text;
                                
                    return  $processing_response;   
                }


        }
?>