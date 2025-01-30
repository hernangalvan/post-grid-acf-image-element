//** POST GRID ELEMENT FOR ACF IMAGES ***********
//********************************
add_filter( 'vc_gitem_template_attribute_acf_image_custom','vc_gitem_template_attribute_acf_image_custom', 10, 2 );
function vc_gitem_template_attribute_acf_image_custom( $value, $data ) {
   extract( array_merge( array(
      'post' => null,
      'data' => '',
   ), $data ) );
  $title = get_the_title($post->ID);
  $field = get_field('image-hover', $post->ID);
  //add validation here later
  $output = "<img src=\"".$field."\" alt='".$title."'/>";
  return $output;
}

add_filter( 'vc_grid_item_shortcodes', 'acf_image_custom_shortcodes' );
function acf_image_custom_shortcodes( $shortcodes ) {
   $shortcodes['vc_acf_image_custom'] = array(
     'name' => __( 'FY - ACF image field', 'textdomain' ),
     'base' => 'vc_acf_image_custom',
     //'icon' => get_template_directory_uri() . '/assets/images/icon.svg',
     'category' => __( 'Content', 'textdomain' ),
     'description' => __( 'Displays an ACF image field with correct tags', 'textdomain' ),
     'post_type' => Vc_Grid_Item_Editor::postType()
  );
  return $shortcodes;
 }

add_shortcode( 'vc_acf_image_custom', 'vc_acf_image_custom_render' );
function vc_acf_image_custom_render($atts){
   $atts = vc_map_get_attributes( 'vc_acf_image_custom', $atts );
   return '{{ acf_image_custom }}';
}
