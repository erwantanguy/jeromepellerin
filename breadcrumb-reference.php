<?php if ( function_exists('yoast_breadcrumb') ) 
				{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb col-md-12 hidden-xs"><span xmlns:v="http://rdf.data-vocabulary.org/#">
<span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="'.get_site_url().'">Accueil</a>
» 
<span typeof="v:Breadcrumb" rel="v:child"><a property="v:title" rel="v:url" href="'.get_page_link(1260).'">Références</a>
»
','</span>
</span></span></p>');} ?>