		<aside class="page-sidebar">
			<ul class="categories-list">
<?php 			$categories = get_categories();
				foreach ( $categories as $cat ) : ?>
				<li class="category-item">
					<h3 class="category-name"><a href="<?php echo get_category_link( $cat->term_id ); 
					?>"<?php if ( is_category( $cat->term_id ) || in_category( $cat->term_id ) ) 
					echo ' class="current"'; ?>><?php echo $cat->name; ?></a></h3>
					<ul class="estudos-list">
<?php 					$loop = new WP_Query( "post_type=estudo&posts_per_page=-1&cat={$cat->term_id}" );
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li class="estudo-item"><a href="<?php the_permalink(); ?>"><?php 
						the_post_thumbnail(); ?><?php the_title(); ?></a></li>
<?php 					endwhile;
						wp_reset_postdata(); ?>
					</ul>
				</li>
<?php 			endforeach; ?>
			</ul>
		</aside>
