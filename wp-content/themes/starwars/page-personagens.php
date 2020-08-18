<?php 
    $personagens_json = file_get_contents("https://swapi.dev/api/people/?page=" . $_GET["pagina"]);
    $personagens_json_data = json_decode($personagens_json, true);
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
                        <a href="#dados<?php echo $count; ?>" class="openDados"><?php echo $pesonagem["name"]; ?></a>
                        <div style="display: none;">
                            <div id="dados<?php echo $count; ?>" class="dados">
                                <h1>Data de Nascimento: <?php echo $pesonagem["birth_year"]; ?></h1>
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