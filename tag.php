<?php get_header(); ?>
    <?php
        global $wp_query;
        $post_obj = $wp_query->get_queried_object();
        $tag_slug = $post_obj->slug;  //タグアーカイブページスラッグ
    ?>
    <section class="new-items common-section">
        <h1 class="information__heading section-heading">「<?php single_tag_title(); ?>」の写真一覧</h1>
        <ul class="common-image-list">
            <?php
                $the_query = new WP_Query(
                    array(
                        'post_type' => 'post',
                        'posts_per_page' => 60,
                        'tag' => $tag_slug
                    )
                );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) :

                    $the_query->the_post();
                ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php attachment_image('medium', 'img'); ?>
                        </a>
                    </li>
                <?php endwhile;?>
            <?php else : ?>
                <li>「<?php single_tag_title(); ?>」の写真はありません。</li>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </section>
<?php get_footer(); ?>