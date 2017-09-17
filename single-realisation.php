<?php get_header(); ?>

<section>
			<article class="row">
                            <header class="col-md-12">
                                <?php //include 'entete.php'; ?>
                                <?php $clients = wp_get_post_terms($post->ID,array('tagexpo'));//print_r($clients);?>
                                <?php if($clients):?>
                                <?php foreach($clients as $client):
                                    $client_link = get_term_link( $client );?>
                                <h2 class="test"><a href="<?php echo $client_link; ?>"><?php echo $client->name;?></a></h2>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <?php if( have_rows('sous-titre') ):while ( have_rows('sous-titre') ) : the_row();?><h2<?php if( get_row_layout() == 'sous-titre2' ): echo " class=\"lignes\""; endif;?>><?php the_sub_field('sous-titre');?></h2><?php endwhile;endif;?>
                                <?php endif;?>
                                <h1><?php the_field('titre'); ?></h1>
                                <?php if(get_field('auteur')){?><h3><?php the_field('auteur');?></h3><?php }?>
                                <?php $terms = wp_get_post_terms($post->ID,array('categorie'));?>
                                <?php foreach($terms as $term):
                                    $term_link = get_term_link( $term );
                                echo '<h4><i class="fa fa-hashtag" aria-hidden="true"></i> <a href="'.$term_link.'">'.$term->name.'</a></h4>';
                                endforeach;
                                ?>                                    
                            </header>
                            <?php include 'breadcrumb-realisations.php'; ?>
                            <div id="content" class="col-md-12">
                                <figure class="col-md-4 col-xs-12">
                                        <?php //include 'slider-real.php';?>
                                    <a href="<?php the_post_thumbnail_url('full'); ?>" rel="gallery-0"><?php the_post_thumbnail('large'); ?></a>
                                </figure>
                                <main class="col-md-8 col-xs-12">
                                    <div><?php the_content(); ?></div>
                                </main>
                            </div>
                            <?php
                            $row=1;
                            if( have_rows('seconde_ligne') ):?>
                            <div id="subcontent"> 
                            <?php while ( have_rows('seconde_ligne') ) : the_row();?>
                              <aside class="col-md-12" rel="<?php echo $row; ?>">
                                <main class="col-md-8 col-xs-12 <?php if($row%2==0){echo ' col-md-push-4';} ?>">
                                    <div><?php the_sub_field('texte');?></div>
                                </main>
                                <figure class="col-md-4 col-xs-12 <?php if($row%2==0){echo ' col-md-pull-8';} ?>">
                                    <?php $img = get_sub_field('image'); //print_r($img); ?>
                                    <picture alt="<?php echo $img['alt']; ?>">
                                        <a href="<?php echo $img['sizes']['large']; ?>" rel="gallery-0"><img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt']; ?>"></a>
                                    </picture>
                                </figure>
                              </aside>  
                            <?php $row++;endwhile;?>
                            </div>
                            <?php endif;?> 
                            <aside id="slideshow" class="col-md-12">
                                <?php
                                if( have_rows('calimeo_ou_slideshare') ):
                                    while ( have_rows('calimeo_ou_slideshare') ) : the_row();
                                        if( get_row_layout() == 'calimeo' ):?>
                                            <div class="embed-responsive embed-responsive-<?php echo the_sub_field('169_ou_43'); ?>">
                                                <?php the_sub_field('calimeo'); ?>
                                            </div>
                                        <?php elseif( get_row_layout() == 'slideshare' ): ?>
                                            <div class="embed-responsive embed-responsive-<?php echo the_sub_field('169_ou_43'); ?>">
                                                <?php the_sub_field('slideshare'); ?>
                                            </div>
                                        <?php endif;
                                    endwhile;
                                else :
                                endif;
                                ?>
                            </aside>
                            
			</article>
    <aside id="otherpost" class="row">
        <div  class="col-md-12">
        <?php 
    //print_r(wp_get_post_categories($post->ID));
$tag = $clients[0]->term_id;
//print_r($tag);
$id = $post->ID;
//print_r(get_field('archive'));
if (get_field('archive')==1){
    $related = get_posts( [
    'post_type' => 'realisation',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'order' => 'DESC',
    'post__not_in' => array($id),
    'meta_query' => [[
        'key' => 'archive',
        'value' => true,
    ]],
    'tax_query' => [[
        'taxonomy' => 'tagexpo',
        'field'=>'term_id',
        'terms'=>[$tag],
    ]],
    ]        
);
}else{
$related = get_posts( [
    'post_type' => 'realisation',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'order' => 'DESC',
    'post__not_in' => array($id),
    'tax_query' => [[
            'taxonomy' => 'tagexpo',
            'field'=>'term_id',
            'terms'=>[$tag],
            ]]
    ]
        );
}
//print_r($related);
if($related){

//print_r($related);
$lien=1;
if( $related ) foreach( $related as $post ) {
setup_postdata($post); ?>
<a rel="<?php if($lien==1){echo 'prev';}else{echo 'next';} ?>" class="col-md-6<?php if($lien==1){echo ' text-left';}else{echo ' text-right';} ?>" href="<?php echo get_site_url();echo '/realisation/'.$post->post_name; ?>"><?php if($lien==1){?><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php } ?><?php echo $post->post_title; ?><?php if($lien==2){?> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i><?php } ?></a>
<?php $lien++; ?>
<?php } wp_reset_postdata();}else{ ?>
    <?php
    if (get_field('archive')==1){
        $lien=1;
        $related = get_posts( [
    'post_type' => 'realisation',
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'order' => 'DESC',
    'post__not_in' => array($id),
    'meta_query' => [[
        'key' => 'archive',
        'value' => true,
    ]],
    ]        
    );
        foreach( $related as $post ) {
setup_postdata($post); ?>
<a rel="<?php if($lien==1){echo 'prev';}else{echo 'next';} ?>" class="col-md-6<?php if($lien==1){echo ' text-left';}else{echo ' text-right';} ?>" href="<?php echo get_site_url();echo '/realisation/'.$post->post_name; ?>"><?php if($lien==1){?><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php } ?><?php echo $post->post_title; ?><?php if($lien==2){?> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i><?php } ?></a>
<?php $lien++; ?>
<?php } wp_reset_postdata();
    }else{
    $prev_post = get_previous_post();
    if($prev_post) {
       $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
       echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="col-md-6 text-left"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> '. $prev_title . '</a>' . "\n";
    }else{$offset=" col-md-offset-6";}

    $next_post = get_next_post();
    if($next_post) {
       $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
       echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="col-md-6 text-right'.$offset.'">'. $next_title . ' <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>' . "\n";
}}}
    ?>
    </div>
    </aside>
</section>
<aside id="share" class="row nav">
    <div class="col-sm-12">
       <!--<i class="fa fa-share-alt link" aria-hidden="true" title="Partagez sur les réseaux réseaux sociaux"></i>-->
        <a onclick="window.open(this.href,'twitter-share-dialog','width=626,height=436');return false;" rel="nofollow" class="share" href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?> via @Jrme_Pellerin" data-toggle="tooltip" data-placement="bottom" title="Cliquez pour partager sur Twitter"><i class="fa fa-twitter"></i></a>
        <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','facebook-share-dialog','width=626,height=436');return false;" href="#" class="share" data-toggle="tooltip" data-placement="bottom" title="Cliquez pour partager sur Facebook"><i class="fa fa-facebook"></i></a>
        <a onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','googleplus-share-dialog','width=626,height=436');return false;" href="#" class="share" data-toggle="tooltip" data-placement="bottom" title="Cliquez pour partager sur Google+"><i class="fa fa-google-plus"></i></a>
        <a onclick="window.open('https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_post_thumbnail_url('large'); ?>&amp;description=<?php the_title(); ?>','pinterest-share-dialog','width='+ window.outerWidth / 1.5 +',height='+ window.outerHeight / 2 +'');return false;" href="#" class="share" data-toggle="tooltip" data-placement="bottom" title="Cliquez pour partager sur Pinterest"><i class="fa fa-pinterest"></i></a>
        <!--<a onclick="window.open('http://tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>','tumblr-share-dialog','width='+ window.outerWidth / 1.5 +',height='+ window.outerHeight / 2 +'');return false;" href="#" class="share" data-toggle="tooltip" data-placement="bottom" title="Cliquez pour partager sur Tumblr"><i class="fa fa-tumblr"></i></a>-->
        <a href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>" target="_blank" class="share" data-toggle="tooltip" data-placement="bottom" title="Cliquez pour partager sur Tumblr"><i class="fa fa-tumblr"></i></a>
    </div>
</aside>

<?php get_footer(); ?>
<script type="text/javascript">