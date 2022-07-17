# wordpress-Basics-notes- usefull for me


//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////-------(CUSTOME POST TYPE)------------////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
add_action( 'init', 'slides_post_type' );
function slides_post_type() {

register_post_type( 'Slides',
    array(
'labels' => array(
    'name'               => __('Slides', 'bonestheme'),
    'singular_name'      => __('Slide', 'bonestheme'),
    'add_new_item'       => __('Add New Slide', 'bonestheme'),
    'edit_item'          => __('Edit Slide', 'bonestheme'),
    'new_item'           => __('New Slide', 'bonestheme'),
    'view_item'          => __('View Slide', 'bonestheme'),
    'search_items'       => __('Search Slides', 'bonestheme'),
    'not_found'          => __('No Slide Found', 'bonestheme'),
    'not_found_in_trash' => __('No slides found in Trash', 'bonestheme')
),

'description'          => 'Represents a single slide in the header slideshow.',
'hierarchical'         => false,
'menu_icon'            => 'dashicons-images-alt2',
'menu_position'        => 5,
'public'               => true,
'register_meta_box_cb' => array('SlideJS', 'createCPTMetaboxes'),
'rewrite'              => array( 'slug' => 'slides', 'with_front' => false ),
'show_in_admin_bar'    => false,
'show_in_nav_menus'    => true,
'show_ui'              => true,
'supports'             => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes')
));
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////-------(CUSTOME POST TYPE)------------///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function special_media_post() {
$labels = array(
    'name'                => _x( 'Media Posts', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Media Post', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Media Post', 'text_domain' ),
    'parent_item_colon'   => __( 'Media Post:', 'text_domain' ),
    'all_items'           => __( 'All Media Posts', 'text_domain' ),
    'view_item'           => __( 'View Media Post', 'text_domain' ),
    'add_new_item'        => __( 'Add New Media Post', 'text_domain' ),
    'add_new'             => __( 'New Media Post', 'text_domain' ),
    'edit_item'           => __( 'Edit Media Post', 'text_domain' ),
    'update_item'         => __( 'Update Media Post', 'text_domain' ),
    'search_items'        => __( 'Search Media Posts', 'text_domain' ),
    'not_found'           => __( 'No media posts found', 'text_domain' ),
    'not_found_in_trash'  => __( 'No media posts found in Trash', 'text_domain' ),
);

$rewrite = array(
    'slug'                => 'mediapost',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
);

$args = array(
    'label'               => __( 'mediapost', 'text_domain' ),
    'description'         => __( 'Post Type for Media', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'custom-fields', ),
    'taxonomies'          => array( 'year', 'type' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'query_var'           => 'mediapost',
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
);

register_post_type( 'special_media_post', $args );
}

// Register Custom Taxonomy
function media_year()  {
$labels = array(
    'name'                       => _x( 'Years', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Year', 'text_domain' ),
    'all_items'                  => __( 'All Years', 'text_domain' ),
    'parent_item'                => __( 'Parent Year', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Year:', 'text_domain' ),
    'new_item_name'              => __( 'New Year Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Year', 'text_domain' ),
    'edit_item'                  => __( 'Edit Year', 'text_domain' ),
    'update_item'                => __( 'Update Year', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate years with commas', 'text_domain' ),
    'search_items'               => __( 'Search years', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove years', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used yearss', 'text_domain' ),
);

$rewrite = array(
    'slug'                       => 'year',
    'with_front'                 => true,
    'hierarchical'               => true,
);

$capabilities = array(
    'manage_terms'               => 'manage_categories',
    'edit_terms'                 => 'manage_categories',
    'delete_terms'               => 'manage_categories',
    'assign_terms'               => 'edit_posts',
);

$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'query_var'                  => 'year',
    'rewrite'                    => $rewrite,
    'capabilities'               => $capabilities,
);

register_taxonomy( 'year', 'special_media_post', $args );
}

// Register Custom Taxonomy
function media_type()  {
$labels = array(
    'name'                       => _x( 'Types', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Type', 'text_domain' ),
    'all_items'                  => __( 'All Types', 'text_domain' ),
    'parent_item'                => __( 'Parent Type', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Type:', 'text_domain' ),
    'new_item_name'              => __( 'New Type Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Type', 'text_domain' ),
    'edit_item'                  => __( 'Edit Type', 'text_domain' ),
    'update_item'                => __( 'Update Type', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate types with commas', 'text_domain' ),
    'search_items'               => __( 'Search types', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove types', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used types', 'text_domain' ),
);

$rewrite = array(
    'slug'                       => 'type',
    'with_front'                 => true,
    'hierarchical'               => true,
);

$capabilities = array(
    'manage_terms'               => 'manage_categories',
    'edit_terms'                 => 'manage_categories',
    'delete_terms'               => 'manage_categories',
    'assign_terms'               => 'edit_posts',
);

$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'query_var'                  => 'media_type',
    'rewrite'                    => $rewrite,
    'capabilities'               => $capabilities,
);

register_taxonomy( 'type', 'special_media_post', $args );
}

// Hook into the 'init' action
add_action( 'init', 'special_media_post', 0 );

// Hook into the 'init' action
add_action( 'init', 'media_year', 0 );

// Hook into the 'init' action
add_action( 'init', 'media_type', 0 );

//////////Custom posts Bubble(admin drashbord)///

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// buuble notifications for custom posts with status pending
<?php add_action( 'admin_menu', 'add_pending_bubble' );

function add_pending_bubble() {
    global $menu;

    $custom_post_count = wp_count_posts('custom-post-name');
    $custom_post_pending_count = $custom_post_count->pending;

    if ( $custom_post_pending_count ) {
        foreach ( $menu as $key => $value ) {
            if ( $menu[$key][2] == 'edit.php?post_type=custom-post-name' ) {
                $menu[$key][0] .= ' <span class="update-plugins count-' . $custom_post_pending_count . '"><span class="plugin-count">' . $custom_post_pending_count . '</span></span>';
                return;
            }
        }
    }
}?>


	<?php add_action( 'admin_menu', 'wpse15567_admin_menu' );

function wpse15567_admin_menu()
{
    $warnings = get_transient( 'wpse15567_warnings' );
    $warning_count = count( $warnings );
    $warning_title = esc_attr( sprintf( '%d plugin warnings', $warning_count ) );

    $menu_label = sprintf( __( 'Plugin Checker %s' ), "<span class='update-plugins count-$warning_count' title='$warning_title'><span class='update-count'>" . number_format_i18n($warning_count) . "</span></span>" );

    add_options_page( 'Plugin Check', $menu_label, 'activate_plugins', 'sec_plugin_check', 'sec_checker' );
} ?>

	////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




wordpress gyaan,, (single.php) >>>>>>>>>>>multipal single.php

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

<?php     while (have_posts()) : the_post();
				
if ( get_post_type( get_the_ID() ) == 'team_members' ) {
    //if is true 
    ?>

{{my-code single.php }}

<?php 
}				
			
			else 	{	?>

<?php } endwhile; ?>


//////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
////////////////page.php////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////



<?php get_header(); ?>

<?php 
$args = array(
	'post_type' => 'your_post',
);  
$your_loop = new WP_Query( $args ); if ( $your_loop->have_posts() ) : while ( $your_loop->have_posts() ) : $your_loop->the_post();
$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

<h1>Title</h1>
<?php the_title(); ?>

<h1>Content</h1>
<?php the_content(); ?>

<h1>Excerpt</h1>
<?php the_excerpt(); ?>

<h1>Text Input</h1>
<?php echo $meta['text']; ?>

<h1>Textarea</h1>
<?php echo $meta['textarea']; ?>


<h1>Checkbox</h1>
<?php if ( $meta['checkbox'] === 'checkbox') { ?>
Checkbox is checked.
<?php } else { ?> 
Checkbox is not checked. 
<?php } ?>


<h1>Select Menu</h1>
<p>The actual value selected.</p>
<?php echo $meta['select']; ?>

<p>Switch statement for options.</p>
<?php 
	switch ( $meta['select'] ) {
		case 'option-one':
			echo 'Option One';
			break;
		case 'option-two':
			echo 'Option Two';
			break;
		default:
			echo 'No option selected';
			break;
	} 
?>

<h1>Image</h1>
<img src="<?php echo $meta['image']; ?>">


<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>


	//////////////////////////////////////////////
	////////////////////////////////////////////////////
	//////////////////////////////////////////////




//////////////////////////////////////
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
function.php>>>>>>>> me lagega......
////////////////////////////////////////////////

1)https://www.taniarascia.com/wordpress-part-three-custom-fields-and-metaboxes/ 2)https://developer.wordpress.org/reference/functions/add_meta_box/
3)https://www.taniarascia.com/wordpress-from-scratch-part-two/


<?php
function create_post_your_post() {
	register_post_type( 'your_post',
		array(
			'labels'       => array(
				'name'       => __( 'Your Post' ),
			),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'supports'     => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
			), 
			'taxonomies'   => array(
				'post_tag',
				'category',
			)
		)
	);
	register_taxonomy_for_object_type( 'category', 'your_post' );
	register_taxonomy_for_object_type( 'post_tag', 'your_post' );
}
add_action( 'init', 'create_post_your_post' );
function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Your Fields', // $title
		'show_your_fields_meta_box', // $callback
		'your_post', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );
function show_your_fields_meta_box() {
	global $post;  
		$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <p>
    <label for="your_fields[text]">Input Text</label>
    <br>
    <input type="text" name="your_fields[text]" id="your_fields[text]" class="regular-text" value="<?php echo $meta['text']; ?>">
  </p>
  <p>
    <label for="your_fields[textarea]">Textarea</label>
    <br>
    <textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30" style="width:500px;"><?php echo $meta['textarea']; ?></textarea>
  </p>
  <p>
    <label for="your_fields[checkbox]">Checkbox
			<input type="checkbox" name="your_fields[checkbox]" value="checkbox" <?php if ( $meta['checkbox'] === 'checkbox' ) echo 'checked'; ?>>
		</label>
  </p>
  <p>
    <label for="your_fields[select]">Select Menu</label>
    <br>
    <select name="your_fields[select]" id="your_fields[select]">
				<option value="option-one" <?php selected( $meta['select'], 'option-one' ); ?>>Option One</option>
				<option value="option-two" <?php selected( $meta['select'], 'option-two' ); ?>>Option Two</option>
		</select>
  </p>
  <p>
    <label for="your_fields[image]">Image Upload</label><br>
    <input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>


  <script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>

  <?php }
function save_your_fields_meta( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	
	$old = get_post_meta( $post_id, 'your_fields', true );
	$new = $_POST['your_fields'];
	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'your_fields', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'your_fields', $old );
	}
}
add_action( 'save_post', 'save_your_fields_meta' );




             Post Page             
1
////////////// post by category////////

					<?php
					query_posts('category_name=travel&showposts=4');
					while (have_posts()) : the_post();
					?>
				
					<?php endwhile; ?>
				 
				 
				 
2
///////////////////////latest post 8
					<?php
					$args = array( 'posts_per_page' => 8);
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post ); 
					?>
							 
3
///////////////limited word post//////////////

					<?php $excerpt = get_the_content();
					$excerpt = substr($excerpt, 0, 200); 
					echo '<p>'.$excerpt.'</p>'; ?>


              Custome post          

1) 
////////////
 <?php $args1 = array( 'posts_per_page' => 20, 'offset'=> 0, 'post_type' => 'home-slider' );
      $myposts = get_posts( $args1 ); ?>
      <?php foreach ( $myposts as $post ) : setup_postdata( $post );   ?>
  <?php endforeach; 
      wp_reset_postdata();?>
	  
	  
	  
	  
	  
	  
2)
//////////////
<?php
$args = array( 'posts_per_page' => -1,'post_type' => 'collection'  );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
     
	 
	2.1
	///////for image//////   
	  <?php   $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
	  2.2
	  ///////////for title///////
	  <?php the_title();?>
	  2.3
	  ////////// for content//////
	  <?php the_content();?>
	  
3)
//////////// add it on function.php //////////////////

function movies_register_post_type3() {
    register_post_type(
  'episodes',
  array(
   'labels' => array(
    'name' => __( 'episodes' ),
    'singular_name' => __( 'optreden' ),
    'menu_name' => __( 'episodes' ),
   // 'all_items' => __( 'Alle episodes' ),
    'view_item' => __( 'Toon episodes' ),
    'add_new_item' => __( 'Add episodes' ),
   // 'add_new' => __( 'Add episodes' ),
    'edit_item' => __( 'Bewerk episodes' ),
    'update_item' => __( 'Bijwerken' ),
    'search_items' => __( 'Zoeken' ),
    'not_found' => __( 'Niets gevonden' ),
    'not_found_in_trash' => __( 'Niets gevonden in prullenbak' ),
   ),
   'public' => true,
   'has_archive' => true,
   'rewrite' => array('slug' => 'episodes'),
   'menu_icon' => 'dashicons-admin-page',
   'supports' => array('title', 'editor','thumbnail', 'custom-fields')
  )
 );
 register_taxonomy_for_object_type( 'category', 'episodes' );
}
add_action('init', 'movies_register_post_type3');
flush_rewrite_rules( false );

4)
/*function banner_register_post_type3() {
    register_post_type(
  'beforeafterslider',
  array(
   'labels' => array(
    'name' => __( 'beforeafterslider' ),
    'singular_name' => __( 'optreden' ),
    'menu_name' => __( 'Avant le curseur' ),
    'all_items' => __( 'Toutes les diapositives' ),
    'view_item' => __( 'Toon beforeafterslider' ),
    'add_new_item' => __( 'ajouter diapositives' ),
    'add_new' => __( 'ajouter diapositives' ),
    'edit_item' => __( 'Bewerk beforeafterslider' ),
    'update_item' => __( 'Bijwerken' ),
    'search_items' => __( 'Zoeken' ),
    'not_found' => __( 'Niets gevonden' ),
    'not_found_in_trash' => __( 'Niets gevonden in prullenbak' ),
   ),
   'public' => true,
   'has_archive' => true,
   'rewrite' => array('slug' => 'beforeafterslider'),
   'menu_icon' => 'dashicons-admin-page',
   'supports' => array('title','thumbnail')
  )
 );}
add_action('init', 'banner_register_post_type3');
*/
4)<?php
		$type=get_post_type( get_the_ID());
		if($type=='episodes') {
		?>


ex.<?php
/**
 * The template name:Meet_the_team
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage blogtheme
 * @since blogtheme
 */

get_header(); ?>
<div id="n_content" style="transition: margin-top 0.2s ease-in-out; padding-top: 123px !important; margin-top: 0px !important;"> 
<img src="<?php echo  $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" class="img-responsive">
<div class="container">
<div class="col-12">
<!-- End Column Left -->
 <div class="row">
<div class="col-xs-12 text-center">
<h1 style="text-transform:uppercase; font-size:60px; font-weight: 100;">Meet the team with <b>real world</b> experience</h1>
</div>
</div>    
<div class="row wrapper-team">
<div class="col-xs-12 col-sm-3 wrapper-portrait wrapper-portrait-new wrapper-staff" itemtype="http://schema.org/Article">
	<div class="portrait text-center">
		<div class="staff-thumb-img" style="background-image: url('/assets/webshop/cms/96/96.jpg');">
        	<a href="http://www.consolid8.com.au/team/tanya" class="view-profile-sthumb">View<br>Profile</a> 
        </div>        
        <a href="http://www.consolid8.com.au/team/tanya">
        	<h4>Tanya Titman</h4>
        	<p class="portraitdesc">Founder/Managing Director</p>
        </a>
        </div>
        <div class="clear"></div>   
</div></div>

</div>
</div>

</div>
<?php get_footer(); ?>



                       all gyaan
 <?php $args1 = array( 'posts_per_page' => 20, 'offset'=> 0, 'post_type' => 'home-slider' );
      $myposts = get_posts( $args1 ); ?>
      <?php foreach ( $myposts as $post ) : setup_postdata( $post );   ?>
  <?php endforeach; 
      wp_reset_postdata();?>
 $taxonomyName = "product_cat";
//This gets top layer terms only.  This is done by setting parent to 0.  
    $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));

    echo '<ul>';
    foreach ($parent_terms as $pterm) {

        //show parent categories
        echo '<li><a href="' . get_term_link($pterm->name, $taxonomyName) . '">' . $pterm->name . '</a></li>';

        $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
        // get the image URL for parent category
        $image = wp_get_attachment_url($thumbnail_id);
        // print the IMG HTML for parent category
        echo "<img src='{$image}' alt='' width='400' height='400' />";

        //Get the Child terms
        $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false));
        foreach ($terms as $term) {

            echo '<li><a href="' . get_term_link($term->name, $taxonomyName) . '">' . $term->name . '</a></li>';
            $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
            // get the image URL for child category
            $image = wp_get_attachment_url($thumbnail_id);
            // print the IMG HTML for child category
            echo "<img src='{$image}' alt='' width='400' height='400' />";
        }
    }
    echo '</ul>';
<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
 
foreach( $categories as $category ) {
    $category_link = sprintf( 
        '<a href="%1$s" alt="%2$s">%3$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name )
    );
     
    echo '<p>' . sprintf( esc_html__( 'Category: %s', 'textdomain' ), $category_link ) . '</p> ';
    echo '<p>' . sprintf( esc_html__( 'Description: %s', 'textdomain' ), $category->description ) . '</p>';
    echo '<p>' . sprintf( esc_html__( 'Post Count: %s', 'textdomain' ), $category->count ) . '</p>';
}
if ( is_product_category() ){
    global $wp_query;

    // get the query object
    $cat = $wp_query->get_queried_object();

    // get the thumbnail id using the queried category term_id
    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML
    echo "<img src='{$image}' alt='' width='762' height='365' />";
}
   $taxonomyName = "product_cat";
//This gets top layer terms only.  This is done by setting parent to 0.  
    $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));

    echo '<ul>';
    foreach ($parent_terms as $pterm) {

        //show parent categories
        echo '<li><a href="' . get_term_link($pterm->name, $taxonomyName) . '">' . $pterm->name . '</a></li>';

        $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
        // get the image URL for parent category
        $image = wp_get_attachment_url($thumbnail_id);
        // print the IMG HTML for parent category
        echo "<img src='{$image}' alt='' width='400' height='400' />";

        //Get the Child terms
        $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false));
        foreach ($terms as $term) {

            echo '<li><a href="' . get_term_link($term->name, $taxonomyName) . '">' . $term->name . '</a></li>';
            $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
            // get the image URL for child category
            $image = wp_get_attachment_url($thumbnail_id);
            // print the IMG HTML for child category
            echo "<img src='{$image}' alt='' width='400' height='400' />";
        }
    }
    echo '</ul>';






wordpress gyaan,,
////////////////////////////////////////////////////////

<?php     while (have_posts()) : the_post();
				
if ( get_post_type( get_the_ID() ) == 'team_members' ) {
    //if is true 
    ?>

{{my-code single.php }}

<?php 
}				
			
			else 	{	?>

<?php } endwhile; ?>


Editor/textarea




<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
  </head>

<body>
<textarea id="froala-editor">Initialize the Froala WYSIWYG HTML Editor on a textarea.</textarea>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>
<script>
$(function() {
  $('textarea#froala-editor').froalaEditor()
});
</script>
                      
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////  plugin//////////////////
////////////////////////////////////// function.php///////

1) blank plugin


function wporg_options_page_html()
{
    
}
function wporg_options_page()
{
    add_menu_page(
        'WPOrg',
        'WPOrg Options',
        'manage_options',
        'wporg',
        'wporg_options_page_html',
        'C:/xampp/htdocs/wordpresstest/wp-content/themes/twentyseventeen/images/icon.png',
        20
    );
	
}

add_action('admin_menu', 'wporg_options_page');






//////////////////////////////////////
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
///////////////function.php//////////////////////
////////////////////////////////////////////////

1)https://www.taniarascia.com/wordpress-part-three-custom-fields-and-metaboxes/ 
2)https://developer.wordpress.org/reference/functions/add_meta_box/
3)https://www.taniarascia.com/wordpress-from-scratch-part-two/


<?php
function create_post_your_post() {
	register_post_type( 'your_post',
		array(
			'labels'       => array(
				'name'       => __( 'Your Post' ),
			),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'supports'     => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
			), 
			'taxonomies'   => array(
				'post_tag',
				'category',
			)
		)
	);
	register_taxonomy_for_object_type( 'category', 'your_post' );
	register_taxonomy_for_object_type( 'post_tag', 'your_post' );
}
add_action( 'init', 'create_post_your_post' );
function add_your_fields_meta_box() {
	add_meta_box(
		'your_fields_meta_box', // $id
		'Your Fields', // $title
		'show_your_fields_meta_box', // $callback
		'your_post', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'add_your_fields_meta_box' );
function show_your_fields_meta_box() {
	global $post;  
		$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

  <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

  <p>
    <label for="your_fields[text]">Input Text</label>
    <br>
    <input type="text" name="your_fields[text]" id="your_fields[text]" class="regular-text" value="<?php echo $meta['text']; ?>">
  </p>
  <p>
    <label for="your_fields[textarea]">Textarea</label>
    <br>
    <textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30" style="width:500px;"><?php echo $meta['textarea']; ?></textarea>
  </p>
  <p>
    <label for="your_fields[checkbox]">Checkbox
			<input type="checkbox" name="your_fields[checkbox]" value="checkbox" <?php if ( $meta['checkbox'] === 'checkbox' ) echo 'checked'; ?>>
		</label>
  </p>
  <p>
    <label for="your_fields[select]">Select Menu</label>
    <br>
    <select name="your_fields[select]" id="your_fields[select]">
				<option value="option-one" <?php selected( $meta['select'], 'option-one' ); ?>>Option One</option>
				<option value="option-two" <?php selected( $meta['select'], 'option-two' ); ?>>Option Two</option>
		</select>
  </p>
  <p>
    <label for="your_fields[image]">Image Upload</label><br>
    <input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php echo $meta['image']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo $meta['image']; ?>" style="max-width: 250px;"></div>


  <script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>

  <?php }
function save_your_fields_meta( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	
	$old = get_post_meta( $post_id, 'your_fields', true );
	$new = $_POST['your_fields'];
	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'your_fields', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'your_fields', $old );
	}
}
add_action( 'save_post', 'save_your_fields_meta' );
//////////////////////////////////////
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
////////////////page.php////////////////////////////////////////////////
////////////////////////////////////////////////



<?php get_header(); ?>

<?php 
$args = array(
	'post_type' => 'your_post',
);  
$your_loop = new WP_Query( $args ); if ( $your_loop->have_posts() ) : while ( $your_loop->have_posts() ) : $your_loop->the_post();
$meta = get_post_meta( $post->ID, 'your_fields', true ); ?>

<h1>Title</h1>
<?php the_title(); ?>

<h1>Content</h1>
<?php the_content(); ?>

<h1>Excerpt</h1>
<?php the_excerpt(); ?>

<h1>Text Input</h1>
<?php echo $meta['text']; ?>

<h1>Textarea</h1>
<?php echo $meta['textarea']; ?>


<h1>Checkbox</h1>
<?php if ( $meta['checkbox'] === 'checkbox') { ?>
Checkbox is checked.
<?php } else { ?> 
Checkbox is not checked. 
<?php } ?>


<h1>Select Menu</h1>
<p>The actual value selected.</p>
<?php echo $meta['select']; ?>

<p>Switch statement for options.</p>
<?php 
	switch ( $meta['select'] ) {
		case 'option-one':
			echo 'Option One';
			break;
		case 'option-two':
			echo 'Option Two';
			break;
		default:
			echo 'No option selected';
			break;
	} 
?>

<h1>Image</h1>
<img src="<?php echo $meta['image']; ?>">


<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>


