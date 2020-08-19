<?php /* Template Name: Filme */ ?>
<?php
    $filme_json = file_get_contents("https://swapi.dev/api/films/" . $_GET["id"]);
    $filme = json_decode($filme_json, true);
    global $wp;
?>
<?php get_header(); ?>
<div class="main filmeInterna">
    <div class="container">
        <div class="row">
            <section class="star-wars">
                <div class="crawl">
                    <img class="imgFilme" src="<?php bloginfo('template_url'); ?>/dist/img/logo.png" />
                    <div class="title">
                        <p>Episode <?php echo $filme["episode_id"]; ?></p>
                        <h1><?php echo $filme["title"]; ?></h1>
                    </div>
                    <p><?php echo $filme["opening_crawl"]; ?></p>
                </div>
            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>