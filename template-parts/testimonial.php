<div class="container">
        
    <section class="section-medium section-arrow--bottom-center section-arrow-primary-color bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-white text-center">
                    <h2 class="section-title "> What Others Say About Us</h2>
                    <p class="section-sub-title">
                        We are a passionate digital design agency that specializes in beautiful and easy-to-
                        <br> use digital design &amp; web development services.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-primary t-bordered">
        <div class="container">
            <div class="row testimonial-three testimonial-three--col-three">
                
                <?php
                while ( $testimonials->have_posts() ) :
                    $testimonials->the_post();
                    if ( has_post_thumbnail() ) {
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                    }
                    ?>
                    <div class="col-md-4 testimonial-three-col">
                        <div class="testimonial-inner">
                            <div class="testimonial-image" itemprop="image">
                                <img width="180" height="180" src="<?php echo $featured_img_url ?>">
                            </div>

                            <div class="testimonial-content">
                                <?php the_content(); ?>
                            </div>

                            <div class="testimonial-meta">
                                <strong class="testimonial-name" itemprop="name"><?php the_title(); ?></strong>
                                <span class="testimonial-country" itemprop="country">Country</span>
                                <?php echo get_post_meta( get_the_ID(), '_country', true ); ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php endwhile; ?>
            </div>
        </div>
    </section>
</div>