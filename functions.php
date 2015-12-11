<?php

// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(300, 250, true);

register_nav_menus( array(
    'primary-menu' => __( 'Topo Menu', '' ),
    'bottom-menu' => __( 'Menu Bottom', '' )
) );

function daysUntil($date){
    return (isset($date)) ? floor((strtotime($date) - time())/60/60/24) : FALSE;
}

function get_image_url(){

    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id, 'large');
    $image_url = $image_url[0];
    echo $image_url;

    /*
    $pID = get_the_ID();
    $meta = get_post_meta($pID);

    echo '/wp-content/files_mf/'.$meta["imagem_listagem"][0];
    */
} 


function getMainTerm($term){
    while($term->parent != 0){
        $term = get_term_by("id", $term->parent, "categoria_projecto");
    }
    return $term;
}


// Define what post types to search
function searchAll( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array( 'post', 'page', 'feed', 'evento', 'produto'));
    }
    return $query;
}
// The hook needed to search ALL content
add_filter( 'the_search_query', 'searchAll' );


class Term_Walker extends Walker {
 
    // Set the properties of the element which give the ID of the current item and its parent
    var $db_fields = array( 'parent' => 'parent', 'id' => 'term_id' );
 
    // Displays start of a level. E.g '<ul>'
    // @see Walker::start_lvl()
    function start_lvl(&$output, $depth=0, $args=array()) {
        $output .= "\n<ul>\n";
    }
 
    // Displays end of a level. E.g '</ul>'
    // @see Walker::end_lvl()
    function end_lvl(&$output, $depth=0, $args=array()) {
        $output .= "</ul>\n";
    }
 
    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array()) {

        $query_term = get_query_var( 'term' );
        $class = '';

        if($query_term == $item->slug){
            $class = 'selected';
        }

        $output .= '<li class="'.$class.'"><a href="'.get_term_link( $item, $taxonomy_name ).'">'.esc_attr($item->name).'</a>';
    }
 
    // Displays end of an element. E.g '</li>'
    // @see Walker::end_el()
    function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</li>\n";
    }
}

/*
    $taxonomy_name = 'product_cat';
    $args = array( 'taxonomy' => $taxonomy_name );
    $terms = get_terms('product_cat', $args);

    $walker = new Term_Walker();

    echo $walker->walk($terms, 3);
*/


?>