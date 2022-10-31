<?php get_header(); ?>
<body <?php body_class(); ?>>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo("description") ?></h3>
                <h1 class="align-self-center display-1 text-center heading"><a href="<?php echo get_site_url(); ?>"><?php bloginfo("name") ?></a></h1>
            </div>
        </div>
    </div>
</div>
<div class="posts">
    <?php 
        while (have_posts()){
            the_post();
    ?>
        <div class="post" <?php post_class(); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center"><?php the_title();?></h2>
                        <p class="text-center">
                        <strong><?php the_author() ?></strong><br/>
                            <?php echo get_the_date(); ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-10 offset-md-1">
                    <p>
                        <?php 
                            if (has_post_thumbnail()){
                                the_post_thumbnail("large", array("class" => "img-fluid"));
                            }
                        ?>
                    </p>
                    <?php 
                        the_content();
                    ?>
                </div>
                <?php if(comments_open()): ?>
                    <div class="col-md-10 offset-md-1">
                        <?php comments_template();?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php
        }
    ?>
</div>
<?php get_footer(); ?>