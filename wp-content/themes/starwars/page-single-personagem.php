<?php /* Template Name: Personagem */ ?>
<?php
    $personagem_json = file_get_contents("https://swapi.dev/api/people/" . $_GET["id"]);
    $pesonagem = json_decode($personagem_json, true);
    global $wp;
?>
<?php get_header(); ?>
<div class="main personagens">
    <div class="container">
        <div class="row">
            <div class="boxInterna">
                <div class="box">
                    <div class="col mobile-1-1 desk-1-3">
                        <h1><?php echo $pesonagem["name"]; ?></h1>
                    </div>
                    <div class="col mobile-1-1 desk-2-3">
                        <div class='toggle'>
                            <div class='tabs'>
                                <div class='tab active'>Ficha Completa</div>
                                <div class='tab'>Filmes</div>
                            </div>
                            <div class='panels'>
                                <div class='panel'>
                                    <div class="row">
                                        <div class="col mobile-1-1 desk-1-2">
                                            <h4>Nome Completo: <span><?php echo $pesonagem["name"]; ?></span></h4>
                                            <h4>Data de Nascimento: <span><?php echo $pesonagem["birth_year"]; ?></span></h4>
                                            <h4>Cor dos Olhos: <span><?php echo $pesonagem["eye_color"]; ?></span></h4>
                                            <h4>Cor do Cabelo: <span><?php echo $pesonagem["hair_color"]; ?></span></h4>
                                            <h4>Cor da Pele: <span><?php echo $pesonagem["skin_color"]; ?></span></h4>
                                        </div>
                                        <div class="col mobile-1-1 desk-1-2">
                                            <h4>Altura: <span><?php echo $pesonagem["height"]; ?>cm</span></h4>
                                            <h4>Peso: <span><?php echo $pesonagem["mass"]; ?>kg</span></h4>
                                            <h4>Gênero: <span><?php echo $pesonagem["gender"]; ?></span></h4>
                                            <?php $planeta = json_decode(file_get_contents($pesonagem["homeworld"]), true); ?>
                                            <h4>Planeta Natal: <span><?php echo $planeta["name"]; ?></span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class='panel'>
                                    <h2>Filmes</h2>
                                    <ul>
                                        <?php
                                        foreach ($pesonagem["films"] as $films) :
                                            $filme = json_decode(file_get_contents($films), true);
                                        ?>
                                            <li>
                                                <?php $filme_url = basename($filme["url"]); ?>
                                                <a href="<?php echo home_url() . '/filme?id=' . $filme_url; ?>" target="_blank" rel="noopener">
                                                    <?php echo $filme["title"]; ?> - <span><?php  echo date('d/m/Y',  strtotime($filme["release_date"]));  ?></span>
                                                </a> 
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //   ABAS INTERNA
    (function() {
        jQuery(function() {
            var toggle;
            return toggle = new Toggle('.toggle');
        });

        this.Toggle = (function() {
            Toggle.prototype.el = null;

            Toggle.prototype.tabs = null;

            Toggle.prototype.panels = null;

            function Toggle(toggleClass) {
                this.el = jQuery(toggleClass);
                this.tabs = this.el.find(".tab");
                this.panels = this.el.find(".panel");
                this.bind();
            }

            Toggle.prototype.show = function(index) {
                var activePanel, activeTab;
                this.tabs.removeClass('active');
                activeTab = this.tabs.get(index);
                jQuery(activeTab).addClass('active');
                this.panels.hide();
                activePanel = this.panels.get(index);
                return jQuery(activePanel).show();
            };

            Toggle.prototype.bind = function() {
                var _this = this;
                return this.tabs.unbind('click').bind('click', function(e) {
                    return _this.show(jQuery(e.currentTarget).index());
                });
            };

            return Toggle;

        })();

    }).call(this);
</script>
<?php get_footer(); ?>