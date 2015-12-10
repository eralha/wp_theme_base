<!doctype html>
<!--[if IE 7]>    <html class="oldie ie7" lang="pt"> <![endif]-->
<!--[if IE 8]>    <html class="oldie ie8" lang="pt"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="pt"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <title><?php bloginfo('name'); ?><?php wp_title (); ?></title>
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  
  <!-- fb opengraph -->
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="">
  
  <!-- favicon -->
  

  <meta name="viewport" content="width=device-width">
  <!-- <link rel="stylesheet" href="css/style.css">-->

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- Bootcards CSS for desktop: -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootcards/1.0.0/css/bootcards-desktop.min.css">

  <!-- [production] remove -->
  <link href='http://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet/less" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/style.css">

  <link rel='stylesheet/less' href='<?php echo get_stylesheet_directory_uri();?>/css/less/style.less' type='text/css'>
  <script src="<?php echo get_stylesheet_directory_uri();?>/js/libs/less-1.3.3.min.js"></script>

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.9.1.min.js"><\/script>')</script>
  

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script>window.themeDir = '<?php echo get_stylesheet_directory_uri();?>';</script>
  <script data-main='<?php echo get_stylesheet_directory_uri();?>/js/main' src='<?php echo get_stylesheet_directory_uri();?>/js/libs/require.js'></script>

</head>
<body><div>
<!--[if lt IE 7]>  
  <div class="chromeframe">O seu browser de internet é <b>muito</b> antigo. <a href="http://browsehappy.com/">Actualize para um mais recente</a> ou <a href="http://www.google.com/chromeframe/?redirect=true&hl=pt-PT&quickenable=true">instale a Google Chrome Frame</a> para uma melhor experiência.</div><![endif]-->

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><i class="fa fa-users"></i> Netmais Template Base</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <?php
              require_once('wp_nav_walker.php');
              wp_nav_menu( array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary-menu',
                  'depth'             => 2,
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
          ?>
          
          <div class="navbar-right">
            <?php
              $uinfo = get_userdata(get_current_user_id());

              if(!is_user_logged_in()){ 
            ?>
              <!-- SOME LOGGED OUT HTML HERE -->
            <?php }else{?>
              <div class="navbar-form">
                <a href='/wp-admin/'><button type="submit" class="btn btn-info">admin</button></a>
              </div>
            <?php }?>
          </div><!--/.nav-right-->

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">

    <?php 
      // get tax terms to get tax post
          $args = array(
              'fields' => 'ids'
          ); 
          $terms = get_terms('categoria_projecto', $args);

          $args = array(
            'post_type'       => 'post',
            'category_name'   => 'Banner topo'
          );

      $the_query = new WP_Query( $args ); 

      ?>

      <div class="container">
        <?php if ( $the_query->have_posts() ) : ?>

          <!-- pagination here -->
          
          <!-- the loop -->
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div style="background-image:url('<?php get_image_url(); ?>');">
              <h1><?php the_title(); ?></h1>
              <p><?php the_content('<a class="btn btn-primary btn-lg" href="'.get_permalink().'" role="button">Saber mais &raquo;</a>'); ?></p>
              <p></p>
            </div>
          <?php endwhile; ?>
          <!-- end of the loop -->

          <!-- pagination here -->

          <?php wp_reset_postdata(); ?>

        <?php else : ?>
          <div>
            <h1>Adicione um banner de topo.</h1>
            <p>Para adicionar um banner de topo crie uma categoria com o nome "banner topo" e adicione um post a esta categoria.</p>
          </div>
        <?php endif; ?>

      </div><!-- END DESTAQUES TOPO -->


    </div>