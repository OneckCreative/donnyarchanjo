<div class="topSection">
    <section class="template-section heading heading-contact cadre">
        <?php $this->load->view('partials/head'); ?>
            <div class="hvCentered_wrapper">
                <div class="hvCentered_element">
                    <p class="heading_since">Donny Archanjo Atelier</p>
                    <div class="container t-center">
                        <div class="col large-12">
                            <h1 class="m-t-b"><a href="mailto:contato@donnyarchanjo.com.br">contato@donnyarchanjo.com.br</a><br> <span><a href="tel:+3227357settings.animationSpeed.FAST">(19) 3406-5853</a></span></h1> <a class="btn btn-outline btn-grey m-t-b js-smooth-scroll" href=".midSection">Faça uma visita</a> </div>
                    </div>
                    <?php $this->load->view('partials/social'); ?>
                </div>
            </div>
            <div class="scrollDown js-smooth-scroll" href=".midSection">
                <div class="scrollDown_dots"> <span></span> <span></span> <span></span> </div>
                <div class="scrollDown_bar"></div>
            </div>
    </section>
</div>
<div class="midSection">
    <section class="template-section contact-section-2">
        <div class="leftSide animated" id="map-canvas"></div>
        <div class="rightSide m-t-b-tb medium-center">
            <div class="hvCentered_wrapper">
                <div class="hvCentered_element">
                    <h2 class="animated">Donny Archando Atelier</h2> <img src="assets/images/icon.png" alt="Donny Archanjo Atelier" class="animated" style="width:40px;">
                    <h3 class="animated"><a href="https://www.google.com/maps/place/Atelier+Donny+Archanjo/@-22.768208,-47.3442987,17z/data=!3m1!4b1!4m5!3m4!1s0x94c8996e76c3a8fb:0x29ef18bc5fc94ad0!8m2!3d-22.768208!4d-47.34211" target="_blank">R. das Begônias, 791 - Jardim Primavera, Americana/ SP</a></h3>
                    <table class="animated m-t-b">
                        <tr>
                            <td>De segunda à sexta</td>
                            <td><strong>das</strong> de 08h00 à 18h00</td>
                        </tr>
                        <tr>
                            <td>Sábados</td>
                            <td><strong>das</strong> de 08h00 à 13h00</td>
                        </tr>
                    </table>
                    <p class="animated"><a href="agendamento.html" class="btn btn-outline  m-t-b">Agende seu horário</a></p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('partials/bottom'); ?>
    <?php $this->load->view('partials/footerJS'); ?>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAMtN1cCuOFSFrj83w_RZiTshaffTUfcV4"></script>
        <script>
            // MID SECTION SEQUENCES
            var sequenceSection1IN = [
                {
                    e: $('.contact-section-2 .leftSide')
                    , p: 'transition.fadeIn'
                    , o: {
                        duration: settings.animationSpeed.SLOWER
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide h2')
                    , p: 'transition.fadeIn'
                    , o: {
                        delay: settings.animationSpeed.FASTEST
                        , duration: settings.animationSpeed.MIDDLE
                        , sequenceQueue: false
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide img.animated')
                    , p: 'transition.slideRightIn'
                    , o: {
                        duration: settings.animationSpeed.MIDDLE
                        , sequenceQueue: false
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide h3')
                    , p: 'transition.slideRightIn'
                    , o: {
                        duration: settings.animationSpeed.MIDDLE
                        , sequenceQueue: false
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide table')
                    , p: 'transition.slideUpIn'
                    , o: {
                        duration: settings.animationSpeed.MIDDLE
                        , sequenceQueue: false
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide p')
                    , p: 'transition.fadeIn'
                    , o: {
                        duration: settings.animationSpeed.MIDDLE
                        , sequenceQueue: false
                        , complete: function () {
                            ignoreScroll = false;
                        }
                    }
                }
		];
            var sequenceSection1OUT_Half = [
                {
                    e: $('.contact-section-2 .leftSide')
                    , p: 'transition.fadeOut'
                    , o: {
                        duration: settings.animationSpeed.FAST
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide h2')
                    , p: 'transition.fadeOut'
                    , o: {
                        duration: settings.animationSpeed.FAST
                        , sequenceQueue: false
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide img.animated')
                    , p: 'transition.fadeOut'
                    , o: {
                        duration: settings.animationSpeed.FAST
                        , sequenceQueue: false
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide h3')
                    , p: 'transition.fadeOut'
                    , o: {
                        duration: settings.animationSpeed.FAST
                        , sequenceQueue: false
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide table')
                    , p: 'transition.fadeOut'
                    , o: {
                        duration: settings.animationSpeed.FAST
                        , sequenceQueue: false
                    }
                }
                , {
                    e: $('.contact-section-2 .rightSide p')
                    , p: 'transition.fadeOut'
                    , o: {
                        duration: settings.animationSpeed.FAST
                        , sequenceQueue: false
                    }
                }
		];
            var sequencesIN = [];
            var sequencesOUT = [];
        </script>
        <script>
            settings['mapIcon'] = "assets/images/contact/map_icon.png";
            $(document).ready(function () {
                init_contact_google_map();
            });
        </script>
        <?php $this->load->view('partials/footer'); ?>