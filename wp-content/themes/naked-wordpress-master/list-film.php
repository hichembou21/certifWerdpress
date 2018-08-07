<?php
/**
 * Template Name: List film.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">

            
            <?php 
            $args = [
                'post_type' => 'film',
                'numberposts' => 10,
                'posts_per_page' => 5,
            ];
            
            $posts_query = new WP_Query($args);
            if ( $posts_query->have_posts() ) : 
			// Do we have any posts/pages in the databse that match our query?
			?>

				<?php while ( $posts_query->have_posts() ) : $posts_query -> the_post(); 
				// If we have a page to show, start a loop that will display it
				?>

					<article class="post">
					
						<h1 class="title title-film"><?php the_title(); // Display the title of the page ?></h1>
						
						<div class="the-content">
						<?php  

							$img = get_field('image');
							echo '<img alt="'.$img['alt'].'" src="'.$img['url'].'"/>';
							echo '<p>';
							the_field("description");
							echo'</p>';
							$table = get_field("table");
							echo '<table class="table">';
							if ( $table['header'] ) {

								echo '<thead>';
					
									echo '<tr>';
					
										foreach ( $table['header'] as $th ) {
					
											echo '<th>';
												echo $th['c'];
											echo '</th>';
										}
					
									echo '</tr>';
					
								echo '</thead>';
							}
							
							echo '<tbody>';

            foreach ( $table['body'] as $tr ) {

                echo '<tr>';

                    foreach ( $tr as $td ) {

                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
                    }

                echo '</tr>';
            		}

        		echo '</tbody>';

    			echo '</table>';
						?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>