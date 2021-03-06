<?php

    class WPH_module_general_meta extends WPH_module_component
        {
            function get_component_title()
                {
                    return "Meta";
                }
            
                                    
            function get_module_settings()
                {
                    $this->module_settings[]                  =   array(
                                                                    'id'            =>  'remove_generator_meta',
                                                                    'label'         =>  'Remove Generator Meta',
                                                                    'description'   =>  __('Remove the autogenerated meta generator tag within head (WordPress Version).',  'wp-hide-security-enhancer'),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    ); 
          
                    $this->module_settings[]                  =   array(
                                                                    'id'            =>  'remove_wlwmanifest',
                                                                    'label'         =>  'Remove wlwmanifest Meta',
                                                                    'description'   =>  __('Remove the wlwmanifest tag within head.',  'wp-hide-security-enhancer'),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    );
                                                                    
            
                    $this->module_settings[]                  =   array(
                                                                    'id'            =>  'remove_feed_links',
                                                                    'label'         =>  'Remove feed_links Meta',
                                                                    'description'   =>  __('Remove the feed_links tag within head.',  'wp-hide-security-enhancer'),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    );
                                                                    
                                                                    
                    $this->module_settings[]                  =   array(
                                                                    'id'            =>  'disable_json_rest_wphead_link',
                                                                    'label'         =>  __('Disable output the REST API link tag into page header',    'wp-hide-security-enhancer'),
                                                                    'description'   =>  __('By default a REST API link tag is being append to HTML.',    'wp-hide-security-enhancer'),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower'),
                                                                    'processing_order'  =>  58
                                                                    
                                                                    );
                    
                    
               
                    $this->module_settings[]                  =   array(
                                                                    'id'            =>  'remove_rsd_link',
                                                                    'label'         =>  'Remove rsd_link Meta',
                                                                    'description'   =>  __('Remove the rsd_link tag within head.',  'wp-hide-security-enhancer'),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    );
                                                                    
           
                                                                    
                    $this->module_settings[]                  =   array(
                                                                    'id'            =>  'remove_adjacent_posts_rel',
                                                                    'label'         =>  'Remove adjacent_posts_rel Meta',
                                                                    'description'   =>  __('Remove the adjacent_posts_rel tag within head.',  'wp-hide-security-enhancer'),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    );
                                                                    
                    $this->module_settings[]                  =   array(
                                                                    'id'            =>  'remove_profile',
                                                                    'label'         =>  'Remove profile link',
                                                                    'description'   =>  __('Remove profile link meta tag within head.',  'wp-hide-security-enhancer'),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    );
                                                                    
                    $this->module_settings[]                  =   array(
                                                                    'id'            =>  'remove_canonical',
                                                                    'label'         =>  'Remove canonical link',
                                                                    'description'   =>  __('Remove canonical link meta tag within head.',  'wp-hide-security-enhancer'),
                                                                    
                                                                    'input_type'    =>  'radio',
                                                                    'options'       =>  array(
                                                                                                'yes'       =>  __('Yes',    'wp-hide-security-enhancer'),
                                                                                                'no'        =>  __('No',     'wp-hide-security-enhancer'),
                                                                                                ),
                                                                    'default_value' =>  'no',
                                                                    
                                                                    'sanitize_type' =>  array('sanitize_title', 'strtolower')
                                                                    
                                                                    );
                                                                    
                    return $this->module_settings;   
                }
                
                
                
            function _init_remove_generator_meta($saved_field_data)
                {
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
                        
                    add_filter('the_generator',     create_function('', 'return "";'));
                    remove_action( 'wp_head',       'wp_generator' ); 
                    
                    //remove other generator links
                    add_filter( 'wph/ob_start_callback',         array(&$this, 'ob_start_callback_remove_generator_meta'));
                }
            
            
            function ob_start_callback_remove_generator_meta( $buffer )
                {
                    
                    if ( ! class_exists( 'DOMDocument', false ) )
                        return $buffer;

                    $doc = new DOMDocument();
                    $doc->preserveWhiteSpace    = true;
                                        
                    if ( @$doc->loadHTML(mb_convert_encoding($buffer, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD) === false )
                        return $buffer;
                    
                    $doc->encoding              = 'UTF-8';
                    $doc->formatOutput          = true;
                        
                    $xpath = new DOMXPath($doc);
                    
                    $nodes = $xpath->query('//meta[@name="generator"]');
                    if($nodes->length < 1)
                        return $buffer;
                        
                    foreach ($nodes as $node) 
                        {
                            $parent = $node->parentNode;
                            $parent->removeChild($node);
                        }

                    $doc->normalizeDocument();
                    
                    $buffer =   $doc->saveHTML( $dom->documentElement );
                        
                    return $buffer;    
                    
                }
                
                
            function _init_remove_wlwmanifest($saved_field_data)
                {
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
                        
                    remove_action( 'wp_head',       'wlwmanifest_link' );     
                    
                }
                
                
            function _init_remove_feed_links($saved_field_data)
                {
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
                        
                    remove_action('wp_head',    'feed_links',          2);
                    remove_action('wp_head',    'feed_links_extra',    3);     
                    
                }
                
                
            function _init_disable_json_rest_wphead_link($saved_field_data)
                {
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;

                    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
                    
                }
                
            function _init_remove_rsd_link($saved_field_data)
                {
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
                        
                    remove_action('wp_head',    'rsd_link');     
                    
                }
                
                
            function _init_adjacent_posts_rel($saved_field_data)
                {
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
                        
                    remove_action('wp_head',    'adjacent_posts_rel_link_wp_head',  10,     0);     
                    
                }
                
                
            function _init_remove_profile($saved_field_data)
                {
                    
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
                    
                    
                    add_filter('wph/ob_start_callback', array($this, 'remove_profile_tag'));     
                    
                }
                
            function remove_profile_tag($html)
                {
                 
                    $html = preg_replace('/(<link.*?rel=("|\')profile("|\').*?href=("|\')(.*?)("|\')(.*?)?\/?>|<link.*?href=("|\')(.*?)("|\').*?rel=("|\')profile("|\')(.*?)?\/?>)/i', '', $html);
                    
                    return $html;
                       
                }
                
                
            function _init_remove_canonical($saved_field_data)
                {
                    if(empty($saved_field_data) ||  $saved_field_data   ==  'no')
                        return FALSE;
                        
                    remove_action(  'wp_head', 'rel_canonical');
                                        
                    //use the earlier possible action to remove the admin canonical url
                    add_action( 'auth_redirect',        array(&$this,   'remove_wp_admin_canonical_url'));
                    
                    //make sure is removed if placed by other plugins
                    add_filter('wph/ob_start_callback', array($this, 'remove_canonical_tag'));
                }
            
            function remove_wp_admin_canonical_url()
                {
                    
                    remove_action(  'admin_head', 'wp_admin_canonical_url'   );                    
                    
                }
                
            
            function remove_canonical_tag($html)
                {
                    
                    $html = preg_replace('/(<link.*?rel=("|\')canonical("|\').*?href=("|\')(.*?)("|\')(.*?)?\/?>|<link.*?href=("|\')(.*?)("|\').*?rel=("|\')canonical("|\')(.*?)?\/?>)/i', '', $html);
                    
                    return $html;   
                    
                }


        }
?>