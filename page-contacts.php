<?php /*
Template name: Contacts
 */
?>
<?php get_header(); ?>

<section class="row">
			<article>
                            <header class="col-md-12">
                                <?php //include 'entete.php'; ?>
                                <?php $clients = wp_get_post_terms($post->ID,array('tagexpo'));//print_r($clients);?>
                                <?php if($clients):?>
                                <?php foreach($clients as $client):?>
                                <h2 class="test"><?php echo $client->name;?></h2>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <?php if( have_rows('sous-titre') ):while ( have_rows('sous-titre') ) : the_row();?><h2<?php if( get_row_layout() == 'sous-titre2' ): echo " class=\"lignes\""; endif;?>><?php the_sub_field('sous-titre');?></h2><?php endwhile;endif;?>
                                <?php endif;?>
                                <h1><?php the_title(); ?></h1>
                                <?php if(get_field('auteur')){?><h3><?php the_field('auteur');?></h3><?php }?>
                                <?php $terms = wp_get_post_terms($post->ID,array('categorie'));?>
                                <?php foreach($terms as $term):
                                echo '<h4><i class="fa fa-hashtag" aria-hidden="true"></i> <a href="'.get_bloginfo('url').'/categorie/'.$term->slug.'">'.$term->name.'</a></h4>';
                                endforeach;
                                ?>                                    
                            </header>
                            <?php include 'breadcrumb.php'; ?>
                            <figure class="col-md-offset-2 col-md-2">
                                <?php //include 'slider-real.php';?>
                                <a href="<?php the_post_thumbnail_url('full'); ?>"><?php the_post_thumbnail('large'); ?></a>
                                <main class="text-center">
                                    <?php the_field('zone_texte_gauche'); ?>
                                    <ul class="social-links nav navbar-nav">
						<?php if(get_option('facebook')){?>
							<li><a href="<?php echo get_option('facebook'); ?>" title="Facebook <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php }?>
						<?php if(get_option('twitter')){?>
							<li><a href="<?php echo get_option('twitter'); ?>" title="Twitter <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php }?>
						<?php if(get_option('google')){?>
							<li><a href="<?php echo get_option('google'); ?>" title="Google+ <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php }?>
						<?php if(get_option('instagram')){?>
							<li><a href="<?php echo get_option('instagram'); ?>" title="Instagram <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<?php }?>
						<?php if(get_option('pinterest')){?>
							<li><a href="<?php echo get_option('pinterest'); ?>" title="Pinterest <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						<?php }?>
						<?php if(get_option('flickr')){?>
							<li><a href="<?php echo get_option('flickr'); ?>" title="Flickr <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
						<?php }?>
						<?php if(get_option('spotify')){?>
							<li><a href="<?php echo get_option('spotify'); ?>" title="Spotify <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
						<?php }?>
                                                <?php if(get_option('linkedin')){?>
							<li><a href="<?php echo get_option('linkedin'); ?>" title="LinkedIn <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php }?>
                                                <?php if(get_option('tumblr')){?>
							<li><a href="<?php echo get_option('tumblr'); ?>" title="Tumblr <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
						<?php }?>
						<?php if(get_option('mail')){?>
							<li class="mail hidden-md"><a href="<?php echo get_option('mail'); ?>" title="Mail à <?php bloginfo('name'); ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></li>
						<?php }?>
					</ul>
                                </main>
                            </figure>
                            <div id="content" class="col-md-offset-1 col-md-7">
                                <?php the_content(); ?>
                            </div>
                            <?php
                            $row=2;
                            if( have_rows('seconde_ligne') ):?>
                            <div id="subcontent"> 
                            <?php while ( have_rows('seconde_ligne') ) : the_row();?>
                              <aside class="col-md-12" rel="<?php echo $row; ?>">
                                <main class="col-md-8<?php if($row%2==0){echo ' col-md-push-4';} ?>">
                                    <div><?php the_sub_field('texte');?></div>
                                </main>
                                <figure class="col-md-4<?php if($row%2==0){echo ' col-md-pull-8';} ?>">
                                    <?php $img = get_sub_field('image'); //print_r($img); ?>
                                    <picture alt="<?php echo $img['alt']; ?>">
                                        <a href="<?php echo $img['sizes']['large']; ?>"><img src="<?php echo $img['sizes']['large']; ?>" alt="<?php echo $img['alt']; ?>"></a>
                                    </picture>
                                </figure>
                              </aside>  
                            <?php $row++;endwhile;?>
                            </div>
                            <?php endif;?> 
                            
			</article>
    
</section>


<?php get_footer(); ?>
<script type="text/javascript">