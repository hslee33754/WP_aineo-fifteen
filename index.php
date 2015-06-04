<?php get_header(); ?>
        
<div class="article-padding">   
<h2 class="pageid"><?php the_title(); ?></h2>          
<!-- start container -->
<div id="container"> 
    
    <?php while(have_posts()) : the_post(); ?>
    <div class="excerpt">
        <h3 id="post-<?php the_ID();?>" class="item-title">
            <a href="<?php the_permalink();?>" rel="" title="Permanet Link to <?php the_title();?>">
                <?php the_title(); ?>&nbsp;&raquo;
            </a>
        </h3>
        <small>Posted on <?php the_time('F jS Y');?> in <?php the_category(', '); ?></small>
        <a href="<?php the_permalink(); ?>" title="Permanet Link to <?php the_title();?>">
            <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
        </a>
        <?php the_excerpt(); ?>
        <p class="full=story"><a href="<?php the_permalink();?>" rel="" title="Permanet Link to <?php the_title();?>">Full Story&nbsp;&raquo;</a></p>
    </div>
    <?php endwhile;?>

    <small>index.php</small>
</div> <!-- end container -->
</div> <!--end article padding -->

<?php get_footer(); ?>