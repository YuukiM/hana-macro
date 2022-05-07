<?php
/*
YARPP Template: customised template
Description: A simple starter example template that you can edit.
Author: YARPP Team
*/
?>

<?php
/*
Templating in YARPP enables developers to uber-customize their YARPP display using PHP and template tags.

The tags we use in YARPP templates are the same as the template tags used in any WordPress template. In fact, any WordPress template tag will work in the YARPP Loop. You can use these template tags to display the excerpt, the post date, the comment count, or even some custom metadata. In addition, template tags from other plugins will also work.

If you've ever had to tweak or build a WordPress theme before, you’ll immediately feel at home.

// Special template tags which only work within a YARPP Loop:

1. the_score()		// this will print the YARPP match score of that particular related post
2. get_the_score()		// or return the YARPP match score of that particular related post

Notes:
1. If you would like Pinterest not to save an image, add `data-pin-nopin="true"` to the img tag.

*/
?>

<?php if ( have_posts() ) : ?>
    <ul class="related-items__list common-image-list">
	<?php
	    while ( have_posts() ) : the_post();

            $image_field = get_field('post-image');

            $size = 'medium'; // (thumbnail, medium, large, full or custom size)
            $img_attr = array(
                'src'   => $src,	// アイキャッチ画像の URL
                'class' => "attachment-$size",	// 指定した大きさ
                'alt'   => get_the_title().'のマクロ写真',	// アイキャッチ画像の抜粋
                'title' => get_the_title().'のマクロ写真',	// アイキャッチ画像のタイトル
            );
            $image = wp_get_attachment_image( $image_field, $size, false, $img_attr );

	?>
	<li>
        <a href="<?php the_permalink(); ?>" rel="bookmark norewrite" title="<?php the_title_attribute(); ?>" >
            <?php echo $image; ?>
        </a><!-- (<?php the_score(); ?>)-->
    </li>
	<?php endwhile; ?>
</ul>
<?php else : ?>
<p class="no-related-post">関連する写真はありません</p>
<?php endif; ?>
