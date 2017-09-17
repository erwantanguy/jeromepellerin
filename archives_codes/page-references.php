<?php /*
Template name: Références
 */
?>
<?php get_header(); ?>
<section class="row">
	<header class="col-md-12">
		<h1><?php the_title(); ?></h1>
		<?php //$current_category = single_cat_title("", false); ?>
	</header>
	<?php include 'breadcrumb.php'; ?>
</section>
<section class="row events">
	<?php //$post = $_GET['categorie']; ?>
	<nav id="localisation" class="col-lg-12 navbar navbar-default">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="javascript:;">Tout</a></li>
                        <li><a href="javascript:;" rel="institution">Institutions Culturelles</a></li>
                        <li><a href="javascript:;" rel="collectivite">Collectivités Territoriales</a></li>
                        <li><a href="javascript:;" rel="publique">Ministères, État</a></li>
                        <li><a href="javascript:;" rel="compagnie">Compagnies, Ensembles</a></li>
                        <li><a href="javascript:;" rel="entreprise">Entreprises</a></li>
                        <li><a href="javascript:;" rel="artiste">Artistes</a></li>
                        <li><a href="javascript:;" rel="event">Événementiels</a></li>
		</ul>
	</nav>
</section>
<section id="masonry" class="row">
<?php include 'cadres-references.php';?>
    </section>
<?php get_footer(); ?>