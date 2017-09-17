<?php /*
Template name: Books
 */
?>
<?php get_header(); ?>
<section class="row" rel="<?php the_field('accueil'); ?>">
	<header class="col-md-12">
		<h1><?php the_title(); ?></h1>
		<?php //$current_category = single_cat_title("", false); ?>
	</header>
	<?php include 'breadcrumb.php'; ?>
</section>
<section class="row">
    <?php
    if( have_rows('books') ):
        while ( have_rows('books') ) : the_row();?>
            <?php $pdf = get_sub_field('pdf');$fileSize   = size_format( filesize( get_attached_file( $pdf['id'] ) ) );//print_r($fileSize); ?>
            <?php $img = get_sub_field('image'); //print_r($img); //echo $img['sizes']['large']; ?>
    <picture class="col-md-4" alt="<?php echo $img['alt']; ?>">
        <figure class="col-md-7">
            <a href="<?php echo $pdf['url']; ?>" rel="fancybox">
                <img src="<?php echo $img['sizes']['large']; ?>" alt="<?php the_sub_field('titre');?>" title="<?php the_sub_field('titre');?>"> <!--data-toggle="tooltip" data-placement="bottom"-->
            </a>
        </figure>
        <div class="col-md-5">
            <h3><a href="<?php echo $pdf['url']; ?>" rel="fancybox"><?php the_sub_field('titre');?></a></h3>
            <p><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo $fileSize;//print_r($pdf);?></p>
        </div>
    </picture>
        <?PHP endwhile;
    endif;
    ?>
</section>
<?php get_footer(); ?>
