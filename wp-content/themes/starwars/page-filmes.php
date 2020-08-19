<?php /* Template Name: Filmes */ ?>
<?php
    $filmes_json = file_get_contents("https://swapi.dev/api/films/");
    $filmes_json_data = json_decode($filmes_json, true);
    global $wp;
    $url = home_url($wp->request);
?>
<?php get_header(); ?>
<div class="main personagens filmes">
    <div class="container">
        <div class="row">
            <h1 class="title">Filmes</h1>
            <div id="boxes" class="boxes">
                <?php $count = 0; ?>
                <?php foreach ($filmes_json_data["results"] as $filme) : ?>
                    <div class="box">
                        <?php $filme_url = basename($filme["url"]); ?>
                        <a href="<?php echo home_url() . '/filme?id=' . $filme_url; ?>" target="_blank" rel="noopener">
                            <h1>Episode <?php echo $filme["episode_id"] . " - " . $filme["title"]; ?></h1>
                            <strong>Data de lançamento: <?php  echo date('d/m/Y',  strtotime($filme["release_date"]));  ?></strong>
                        </a>
                    </div>
                <?php $count++;
                endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>