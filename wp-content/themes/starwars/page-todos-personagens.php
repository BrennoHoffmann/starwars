<?php /* Template Name: Todos os Personagens */ ?>
<?php 
    global $wp;
    
    
    $count = 1;
    
        while($count <= 9){
            ${"perPage" . $count}  = file_get_contents("https://swapi.dev/api/people/?page=" . $count);
            ${"perPageData" . $count} = json_decode(${"perPage" . $count}, true);
            
            $count++;
        }
        $allPersonagens = array_merge($perPageData1["results"], $perPageData2["results"], 
                                        $perPageData3["results"], $perPageData4["results"], 
                                        $perPageData5["results"],  $perPageData6["results"], 
                                        $perPageData7["results"], $perPageData8["results"], 
                                        $perPageData9["results"]);

?>
<?php get_header(); ?>
<div class="main personagens">
	<div class="container">
		<div class="row">
            <input id="myInput" type="text" placeholder="Busque pelo seu personagem favorito!">
            <div id="boxes" class="boxes">
                <?php $count = 0; ?>
                <?php foreach($allPersonagens as $pesonagem): ?>
                    <div class="box">
                        <a href="#dados<?php echo $count; ?>" class="openDados">
                            <h1><?php echo $pesonagem["name"]; ?></h1>
                        </a>
                        <div style="display: none;">
                            <div id="dados<?php echo $count; ?>" class="dados">
                                <div class="row">
                                    <div class="col mobile-1-2 text-center">
                                        <h4>Nome Completo: <span><?php echo $pesonagem["name"]; ?></span></h4>
                                        <h4>Data de Nascimento: <span><?php echo $pesonagem["birth_year"]; ?></span></h4>
                                        <h4>Cor dos Olhos: <span><?php echo $pesonagem["eye_color"]; ?></span></h4>
                                        <h4>Cor do Cabelo: <span><?php echo $pesonagem["hair_color"]; ?></span></h4>
                                    </div>
                                    <div class="col mobile-1-2 text-center">
                                        <h4>Cor da Pele: <span><?php echo $pesonagem["skin_color"]; ?></span></h4>
                                        <h4>Altura: <span><?php echo $pesonagem["height"]; ?>cm</span></h4>
                                        <h4>Peso: <span><?php echo $pesonagem["mass"]; ?>kg</span></h4>
                                        <h4>Gênero: <span><?php echo $pesonagem["gender"]; ?></span></h4>
                                    </div>
                                    <div class="col mobile-1-1 text-center">
                                        <?php
                                            $personagem_url = basename($pesonagem["url"]);
                                        ?>
                                        <a href="<?php echo home_url() . '/personagem?id=' . $personagem_url; ?>" target="_blank" rel="noopener">Ver mais detalhes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $count++; endforeach; ?>
            </div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php get_footer(); ?>