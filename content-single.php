<?php
/**
 * Content used in single.php
 *
 * @package zerif-lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">

			<?php zerif_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('full');
                echo '<br><br>';
			}
			the_content();
			display_bsf_content_disclaimer(get_the_ID());
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'zerif-lite' ),
					'after'  => '</div>',
				)
			);
		?>

		<?php edit_post_link( __( 'Edit', 'zerif-lite' ), '<br><span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php

			/* translators: used between list items, there is a space after the comma */

			$category_list = get_the_category_list( __( ', ', 'zerif-lite' ) );

			/* translators: used between list items, there is a space after the comma */

			$tag_list = get_the_tag_list( '', __( ', ', 'zerif-lite' ) );

		if ( ! zerif_categorized_blog() ) {

			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) {
				/* translators: Permalink */
				//$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'zerif-lite' );
				$meta_text = __( 'Marqué %2$s.', 'zerif-lite' );

			} else {
				/* translators: Permalink */
//				$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'zerif-lite' );
				$meta_text = __( '', 'zerif-lite' );

			}
		} else {

			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				/* translators: 1 - Categories list, 2 - Tags list, 3- Permalink */
//				$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'zerif-lite' );
				$meta_text = __( 'Posté dans %1$s et marqué %2$s. ', 'zerif-lite' );

			} else {
				/* translators: 1 - Categories list, 2 - Tags list, 3- Permalink */
				//$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'zerif-lite' );
				$meta_text = __( 'Posté dans %1$s.', 'zerif-lite' );

			}
		} // end check for categories on this blog

			printf(

				$meta_text,
				$category_list,
				$tag_list,
				esc_url( get_permalink() )
			);

		?>


	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
