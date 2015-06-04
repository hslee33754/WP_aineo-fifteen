<?php get_header(); ?>

<div class="article-padding">   
<h2 class="pageid"><?php the_title(); ?></h2>          
<!-- start container -->
<div id="container"> 
    
    <div>
    <?php if(have_posts()): while(have_posts()) : the_post(); ?>
    <p><small>Posted on <?php the_time('F jS, Y'); ?>in <?php the_category(', '); ?></small></p>
    <?php the_content('') ?>
    <?php endwhile; endif; ?>

    <small>single.php</small>
    </div>
    <php get_sidebar(); ?></php>
    
</div> <!-- end container -->
</div> <!--end article padding -->

<?php get_footer(); ?>
        