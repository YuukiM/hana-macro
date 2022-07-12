<?php get_header(); ?>
    <section class="new-items common-section">
        <h1 class="information__heading section-heading"><?php the_title(); ?></h1>
        <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 30,
                'paged' => $paged
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
        ?>
            <ul class="new-items__list common-image-list">
            <?php
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();

            ?>
                <li>
                    <a href="<?php the_permalink(); ?>" style="background-image: url('<?php attachment_image('medium', 'url'); ?>')"  title="<?php echo get_the_title();title_postfix(); ?>"></a>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
        <?php else: ?>
        <p>新しい記事はありません。</p>

        <?php endif; ?>
        <?php
            global $the_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '/page/%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $the_query->max_num_pages,
                'type' => 'list',
                'mid_size' => 2,
                'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                'next_text' => '<i class="fa-solid fa-angle-right"></i>',
            ) );
        ?>

    </section>
<?php get_footer(); ?>