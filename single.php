<?php get_header(); ?>

		<div class="container">
	      <!-- Example row of columns -->
	      <div class="row">
	        <div class="col-md-8">
	          
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<div class="editor">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>

	        </div>
	        <div class="col-md-4 card-lateral">
	          

	          <h1>Lateral</h1>
	          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


	        </div>
	      </div>

	    </div> <!-- /container -->

<?php get_footer(); ?>