<?php get_header(); ?>
    <?php
        global $wp_query;
        $post_obj = $wp_query->get_queried_object();
        $tag_slug = $post_obj->slug;  //タグアーカイブページスラッグ
    ?>
    <section class="new-items common-section">
        <h1 class="information__heading section-heading">「<?php single_tag_title(); ?>」の写真一覧</h1>
        <ul class="new-items__list common-image-list">
            <?php
                $the_query = new WP_Query(
                    array(
                        'post_type' => 'post',
                        'posts_per_page' => 60,
                        'tag' => $tag_slug
                    )
                );
                if ( $the_query->have_posts() ) :
           ?>

            <?php
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();
           ?>
                    <?php $image_field = get_field('post-image'); ?>
                    <li><a href="<?php the_permalink(); ?>"><img src="<?php echo $image_field; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy"></a></li>
                <?php endwhile;?>
            <?php else : ?>
                <li>新しい記事はありません。</li>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </section>
<?php get_footer(); ?>