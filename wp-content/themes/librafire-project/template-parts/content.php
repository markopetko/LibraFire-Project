<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LibraFire_Project
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php librafire_project_post_thumbnail(); ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">	

		<?php
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'librafire-project' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'librafire-project' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'librafire-project' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				librafire_project_posted_on();
				the_time(); 
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<!-- Share section -->

		<div class="share">
		<p>Share:</p>
			<a href="mailto:email@email.com?subject=<?php echo get_the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/email-2.png" alt="Email" /></a>
			<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo urlencode(get_the_title($id)); ?>" title="Share this post on Facebook" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.png" alt="Facebook" /></a>
			<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.png" alt="Twitter" /></a>
			<a href="http://pinterest.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/pinterest.png" alt="Pinterest" /></a>
		</div>

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'librafire-project' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'librafire-project' ),
				'after'  => '</div>',
			)
		);
		
		$value = get_post_meta( $post->ID, '_wporg_meta_key', true );
		if ($value == "left"){
			?>
			<div class="row author">
				<div class="col-md-3 col-12 l-author-left">
					<?php
					echo get_avatar( get_the_author_meta('user_email'), $size = '150');
					?>
					<p>Stay In Touch:</p>
					<div class="social-links">
						<a href="mailto:<?php the_author_meta('email'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/email.png" alt="Email" /></a>
						<a href="<?php the_author_meta('url'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin.png" alt="Linkedin" /></a>
					</div>
				</div>
				<div class="col-md-9 col-12 l-author-right">
					<div class="display-name">
						<?php
							the_author_meta('display_name');
						?>
					</div>
					<div class="alias">
						<?php
							the_author_meta('nickname');
						?>
					</div>
					<div class="bio">
						<?php
							the_author_meta('description');
						?>
					</div>
				</div>

			</div>
			<?php
		}

		elseif ($value == "right"){
			?>
			<div class="row author">
				<div class="col-md-9 col-12 r-author-left">
					<div class="display-name">
						<?php
							the_author_meta('display_name');
						?>
					</div>
					<div class="alias">
						<?php
							the_author_meta('nickname');
						?>
					</div>
					<div class="bio">
						<?php
							the_author_meta('description');
						?>
					</div>
				</div>
				<div class="col-md-3 col-12 r-author-right">
					<?php
					echo get_avatar( get_the_author_meta('user_email'), $size = '150');	
					?>
					<p>Stay In Touch:</p>
					<div class="social-links">
						<a href="mailto:<?php the_author_meta('email'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/email.png" alt="Email" /></a>
						<a href="<?php the_author_meta('url'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin.png" alt="Linkedin" /></a>
					</div>
				</div>
			</div>
			<?php
		}
		else {
			?>
			<div class="row author">
				<div class="col-md-3 col-12 l-author-left">
					<p>Stay In Touch:</p>
					<div class="social-links">
						<a href="mailto:<?php the_author_meta('email'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/email.png" alt="Email" /></a>
						<a href="<?php the_author_meta('url'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin.png" alt="Linkedin" /></a>
					</div>
				</div>
				<div class="col-md-9 col-12 l-author-right no-author-right">
					<div class="display-name">
						<?php
							the_author_meta('display_name');
						?>
					</div>
					<div class="alias">
						<?php
							the_author_meta('nickname');
						?>
					</div>
					<div class="bio">
						<?php
							the_author_meta('description');
						?>
					</div>
				</div>				
			</div>
			<?php
		}
		?>
		<?php 

// Define our WP Query Parameters
$the_query = new WP_Query( 'posts_per_page=5' ); ?>
  
 
<?php 
// Start our WP Query
while ($the_query -> have_posts()) : $the_query -> the_post(); 
// Display the Post Title with Hyperlink
?>
 
 
<?php 
// Repeat the process and reset once it hits the limit
endwhile;
wp_reset_postdata();
?>
		 
		<!-- Copy section  -->
		<div class="copy-section">
			<p>Share This Article:</p>
			<div class="copy">
				<input type="text" value="<?php the_permalink(); ?>" id="myInput" readonly="readonly">
				<button onclick="myFunction()"></button>
			</div>

			<script>
				function myFunction() {
				  var copyText = document.getElementById("myInput");
				  copyText.select();
				  copyText.setSelectionRange(0, 99999)
				  document.execCommand("copy");
				}
			</script>
		</div>		

	</div><!-- .entry-content -->
	<!-- Similar Posts -->
		<div class="related-post">
			<h2>Similar Posts</h2>
			<div class="relatedposts row">
				
				<?php
				  $orig_post = $post;
				  global $post;
				  $tags = wp_get_post_tags($post->ID);
				   
				  if ($tags) {
				  $tag_ids = array();
				  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				  $args=array(
				  'tag__in' => $tag_ids,
				  'post__not_in' => array($post->ID),
				  'posts_per_page'=>3, // Number of related posts to display.
				  'caller_get_posts'=>1
				  );
				   
				  $my_query = new wp_query( $args );
				 
				  while( $my_query->have_posts() ) {
				  $my_query->the_post();
				  ?>   
				  <div class="col-md-4 col-12">
				    <a rel="nofollow" href="<?php the_permalink()?>"><?php the_post_thumbnail(array(486,191)); ?></a>
				    <div class="date">
				    	<?php
							librafire_project_posted_on();
							the_time(); 
						?>
					</div>
					<div class="title">
						<a rel="nofollow"href="<?php the_permalink()?>"><?php the_title(); ?></a>
					</div>
					<div class="r-more">
				    	<a href="<?php the_permalink()?>">READ MORE   <svg xmlns="http://www.w3.org/2000/svg" width="28.739" height="6.736" viewBox="0 0 28.739 6.736"><defs></defs><g transform="translate(0 6.368) rotate(-90)"><path class="a" d="M27.921,0H0" transform="translate(3.014 27.921) rotate(-90)"/><path class="a" d="M0,0,3,3.266,6,0" transform="translate(0 24.734)"/></g></svg></a>
				    </div>
				  </div>   

				  <?php }
				  }
				  $post = $orig_post;
				  wp_reset_query();
				  ?>
			</div>
		</div>

	<footer class="entry-footer">
		<?php librafire_project_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
