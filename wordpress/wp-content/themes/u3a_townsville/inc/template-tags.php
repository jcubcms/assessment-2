<?php


if ( ! function_exists( 'u3a_townsville_the_attached_image' ) ) :

function u3a_townsville_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'u3a_townsville_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;


function u3a_townsville_categorized_blog() {
	if ( false === ( $u3a_townsville_all_the_cool_cats = get_transient( 'u3a_townsville_all_the_cool_cats' ) ) ) {
		
		$u3a_townsville_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		
		$u3a_townsville_all_the_cool_cats = count( $u3a_townsville_all_the_cool_cats );

		set_transient( 'u3a_townsville_all_the_cool_cats', $u3a_townsville_all_the_cool_cats );
	}

	if ( '1' != $u3a_townsville_all_the_cool_cats ) {
		
		return true;
	} else {
		
		return false;
	}
}

if ( ! function_exists( 'u3a_townsville_the_custom_logo' ) ) :

function u3a_townsville_the_custom_logo() {	
	the_custom_logo();
}
endif;


function u3a_townsville_category_transient_flusher() {
	
	delete_transient( 'u3a_townsville_all_the_cool_cats' );
}
add_action( 'edit_category', 'u3a_townsville_category_transient_flusher' );
add_action( 'save_post',     'u3a_townsville_category_transient_flusher' );