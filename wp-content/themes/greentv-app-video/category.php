<?php get_header(); ?>
<main class="gtva-site">
<header class="gtva-hero"><div class="gtva-container gtva-hero__grid"><div><span class="gtva-kicker">Video category</span><h1><?php single_cat_title(); ?></h1><p class="gtva-lede"><?php echo category_description() ? wp_strip_all_tags(category_description()) : 'Browse GreenTV App videos and placeholder clips in this channel.'; ?></p></div><div class="gtva-quick-card"><strong><?php echo esc_html(number_format_i18n(get_queried_object()->count ?? 0)); ?></strong><span>videos and posts in this category</span></div></div></header>
<div class="gtva-container gtva-layout">
<aside class="gtva-sidebar gtva-sidebar--left"><section class="gtva-sidebar-card"><h2>Video Categories</h2><?php gtva_video_categories(); ?></section></aside>
<section class="gtva-main">
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article class="gtva-feature-card"><span class="gtva-pill"><?php echo esc_html(get_the_date('M j, Y')); ?></span><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html(get_the_excerpt()); ?></p></article>
<?php endwhile; the_posts_pagination(); else: ?>
<article class="gtva-feature-card"><h3>No videos yet</h3><p>This category is ready for new GreenTV App videos.</p></article>
<?php endif; ?>
</section>
<aside class="gtva-sidebar gtva-sidebar--right"><section class="gtva-sidebar-card"><h2>Placeholder Player</h2><div class="gtva-video-wrap"><video src="<?php echo esc_url(gtva_placeholder_video_url()); ?>" autoplay muted loop playsinline controls preload="metadata"></video></div></section></aside>
</div></main><?php get_footer(); ?>
