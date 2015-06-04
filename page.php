<?php get_header(); ?>

<div class="article-padding">   
<h2 class="pageid"><?php the_title(); ?></h2>          
<!-- start container -->
<div id="container"> 
    
    <?php if(have_posts()): while(have_posts()) : the_post(); ?>
    <?php the_content() ?>
    <?php endwhile; endif; ?>

    <small>page.php</small>
    
</div> <!-- end container -->
</div> <!--end article padding -->

<?php get_footer(); ?>
        