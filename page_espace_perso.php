<?php
/*
Template Name: Espace perso
*/
?>
<?php get_header(); ?>

<?php
// check if the repeater field has rows of data
if( have_rows('ligne_1') ):
	$ligne=0;

 	// loop through the rows of data
    while ( have_rows('ligne_1') ) : the_row();

        if($ligne==0)
        {
        	$background_ligne='white';
        	$ligne++;
        }
        else
        {
        	 $background_ligne='white';
        	 $ligne=0;
        }
        ?>
        <div class="main <?php echo $background_ligne;?>" >
            <div class="container-fluid">
                <?php
                $disposition = get_sub_field('colonne'); // type de champ: contenu flexible
                //echo count($disposition);
                if($disposition)
                {
                    foreach ($disposition as $b ) // Tableau de reference
                    {
                        echo'<div >';//id="'.$b['ancre'].'"
                            echo'<div class="row">';
                            /************Titres********************/
                            if($b['acf_fc_layout']=='titre_principal')
                            {
                                ?>
                                <div class="col-xs-12" style="padding:0;">
                                    <?php
                                    if(is_page('contact'))
                                    {
                                        ?>
                                        <div class="fusion-title title fusion-title-center fusion-title-size-two homeh2titleline">
                                            <div class="title-sep-container title-sep-container-left">
                                                 <div class="title-sep sep-double" style="border-color:#67ccca;"></div>
                                            </div>
                                            <h1 class="title-heading-center">
                                                <?php echo $b['titre_h1'];?>
                                            </h1>
                                            <div class="title-sep-container title-sep-container-right">
                                                <div class="title-sep sep-double" style="border-color:#67ccca;"></div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="fusion-title title fusion-title-center fusion-title-size-two homeh2titleline">
                                            <div class="title-sep-container title-sep-container-left">
                                                <div class="title-sep sep-single" style="border-color:#67ccca;"></div>
                                            </div>
                                            <h1 class="title-heading-center">
                                                <?php echo $b['titre_h1'];?>
                                            </h1>
                                            <div class="title-sep-container title-sep-container-right">
                                                <div class="title-sep sep-single" style="border-color:#67ccca;"></div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                </div>
                                <?php
                            }
                            if($b['acf_fc_layout']=='titre_secondaire')
                            {
                                if($b['picto_h2']['url']!='')
                                {
                                    ?>
                                    <div class="col-xs-2">
                                        <img src="<?php echo $b['picto_h2']['url'];?>">
                                    </div>
                                    <div class="col-xs-10">
                                        <h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="row">
										<div class="col-xs-12">
											<h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
										</div>
                                    </div>
                                    <?php
                                }

                            }
                            if($b['acf_fc_layout']=='titre_secondaire_simple')
                            {

                                ?>
                                <div class="row">
									<div class="col-xs-12">
										<h3 class="title-heading-left <?php echo $b['position_h2'];?>"><?php echo $b['titre_h2'];?></h3>
									</div>
                                </div>
                                <?php


                            }
                         
                            /***********************Contenus*****************************/
                            if($b['acf_fc_layout']=='1_colonne')
                            {
                                ?>
                                <div class="col-xs-12">
                                    <?php echo $b['texte'];?>
                                </div>
                                <?php
                            }
                            if($b['acf_fc_layout']=='1_colonne_avec_bordure')
                            {
                                ?>

                                <div class="col-xs-12 text-center" style="padding:0;">
                                    <?php echo $b['texte_bordure']; ?>
                                </div>
                                <?php
                            }


                            if($b['acf_fc_layout']=='2_colonnes')
                            {
                                ?>
                                <!--  Deux bloc de texte : prioté inserer une ligne de séparation entre les deux bloc   -->
                                
                            <section id="ligne_verticale"> </section>
                                <div class="row">
                              
                               
                                <div class="col-xs-6">
                                   
                                    	<?php echo $b['colonne_1'];?> 
									
                                </div>
                                
									<div class="col-xs-6">


										<?php
										echo $b['colonne_2'];
										$compteur=$b['compteur_colonne_2'];
										foreach($compteur as $comp)
										{
											if($comp['nombre']!=='')
											{
												?>
												<div class="counter-box-container" style="border: 1px solid #f8d362;background: url('<?php echo get_template_directory_uri(); ?>/assets/images/user-counter.png') no-repeat 20px bottom rgba(255, 255, 255, 0.8);width: 65%;
	margin: 0 auto;
	padding-right: 20px !important;
	padding-left: 75px !important;
	max-height: 68px !important;padding-top:5px;padding-bottom:5px;margin-top:20%;">
													<div class="content-box-percentage content-box-counter" style="color:#6dc2c1;font-size:50px;line-height:normal;">
													   <div class="timer text-center" style="line-height: 32px !important;font-size: 30px !important;font-family: 'Josefin Sans', sans-serif !important;font-weight: bold !important;"></div>
													</div>



													<div class="counter-box-content text-center" style="color:#262626;font-size:12px;line-height: 12px !important;">
														<?php  echo $comp['texte'];?>
													</div>
												</div>
												<?php
											}


										}

										?>

										<script type="text/javascript">
											$('.timer').countTo({from: 0, to: <?php echo $comp['nombre']; ?>,speed: 5000});


										</script>

										<?php
										//echo $b['colonne_3'];
										?>
										<?php ?>
									</div>
								</div>
							
                                <?php
                            }

//---------------------------DE BUT COLONNE 3-----------------------------------------*

                            if($b['acf_fc_layout']=='3_colonnes')
                            {
                                ?>
                                <div class="col-sm-4">
                                    <?php echo $b['colonne_1'];?>
                                </div>
                                <div class="col-sm-4">

                                    <?php
                                    echo $b['colonne_2'];

                                    $compteur=$b['compteur_colonne_3'];
                                    foreach($compteur as $comp)
                                    {
                                        if($comp['nombre']!=='')
                                        {
                                            ?>
                                            <div class="counter-box-container" style="border: 1px solid #f8d362;background: url('<?php echo get_template_directory_uri(); ?>/assets/images/user-counter.png') no-repeat 20px bottom rgba(255, 255, 255, 0.8);width: 65%;
margin: 0 auto;
padding-right: 20px !important;
padding-left: 75px !important;
max-height: 68px !important;padding-top:5px;padding-bottom:5px;margin-top:20%;">
                                                <div class="content-box-percentage content-box-counter" style="color:#6dc2c1;font-size:50px;line-height:normal;">
                                                   <div class="timer text-center" style="line-height: 32px !important;font-size: 30px !important;font-family: 'Josefin Sans', sans-serif !important;font-weight: bold !important;"></div>
                                                </div>



                                                <div class="counter-box-content text-center" style="color:#262626;font-size:12px;line-height: 12px !important;">
                                                    <?php  echo $comp['texte'];?>
                                                </div>



                                            </div>




                                            <?php
                                        }


                                    }

                                    ?>

                                    <script type="text/javascript">
                                        $('.timer').countTo({from: 0, to: <?php echo $comp['nombre']; ?>,speed: 5000});


                                    </script>

                                    <?php
                                    //echo $b['colonne_1'];
                                    ?>
                                    <?php ?>
                                    
                                </div>
                                <div class="col-sm-4"><?php
                                    echo $b['colonne_3'];
                                    ?></div>
                                <?php
                            }
//------------------------------FIN COLONNE 3 ----------------------------



//---------------------------DE BUT COLONNE 4 -----------------------------------------*

                            if($b['acf_fc_layout']=='4_colonnes')
                            {
                                ?>
                                <div class="col-sm-3">
                                    <?php echo $b['colonne_1'];?>
                                </div>
                                <div class="col-sm-3">

                                    <?php
                                    echo $b['colonne_2'];

                                    $compteur=$b['compteur_colonne_4'];
                                    foreach($compteur as $comp)
                                    {
                                        if($comp['nombre']!=='')
                                        {
                                            ?>
                                            <div class="counter-box-container" style="border: 1px solid #f8d362;background: url('<?php echo get_template_directory_uri(); ?>/assets/images/user-counter.png') no-repeat 20px bottom rgba(255, 255, 255, 0.8);width: 65%;
margin: 0 auto;
padding-right: 20px !important;
padding-left: 75px !important;
max-height: 68px !important;padding-top:5px;padding-bottom:5px;margin-top:20%;">
                                                <div class="content-box-percentage content-box-counter" style="color:#6dc2c1;font-size:50px;line-height:normal;">
                                                   <div class="timer text-center" style="line-height: 32px !important;font-size: 30px !important;font-family: 'Josefin Sans', sans-serif !important;font-weight: bold !important;"></div>
                                                </div>



                                                <div class="counter-box-content text-center" style="color:#262626;font-size:12px;line-height: 12px !important;">
                                                    <?php  echo $comp['texte'];?>
                                                </div>



                                            </div>




                                            <?php
                                        }


                                    }

                                    ?>

                                    <script type="text/javascript">
                                        $('.timer').countTo({from: 0, to: <?php echo $comp['nombre']; ?>,speed: 5000});


                                    </script>

                                    <?php
                                    //echo $b['colonne_1'];
                                    ?>
                                    <?php ?>
                                    
                                </div>
                                <div class="col-sm-3 "> <?php echo $b['colonne_3']; ?></div> 
                                <div class="col-sm-3"><?php echo $b['colonne_4']; ?></div>
                                <?php
                            }
//------------------------------FIN COLONNE 4----------------------------



//---------------------------- Debut Offres Lyfe -------------------------
                            

					
						







                            if($b['acf_fc_layout']=='texte_image')
                            {
                                ?>
                                <div id="<?php echo $b['ancre'];?>" class="row marg-30c texte_image">
                                    <div class="col-xs-12 col-sm-4 col-sm-push-8 pad-20c">
                                        <?php
                                        if($b['image']['url']!='')
                                        {
                                            ?>
                                            <img class="img-responsive" src="<?php echo $b['image']['url'];?>">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-sm-pull-4 pad-20c">
                                        <?php
                                        if($b['picto']['url']!='')
                                        {
                                            ?>
                                            <div class="row marg-30c">
                                                <div class="picto pull-left pad-10b"><img src="<?php echo $b['picto']['url'];?>"></div>
                                                <h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                                <!--<div class="col-xs-2">

                                                </div>
                                                <div class="col-xs-10">

                                                </div>-->
                                            </div>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="row marg-30c">
                                                <div class="col-xs-12">
                                                    <h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <?php echo $b['texte'];?>
                                    </div>

                                </div>
                                <?php


                            }
                            if($b['acf_fc_layout']=='image_texte')
                            {
                                ?>
                                <div id="<?php echo $b['ancre'];?>" class="row marg-30c image_texte" >

                                    <div class="col-xs-12 col-sm-4 pad-20c">
                                        <?php
                                        if($b['image']['url']!='')
                                        {
                                            ?>
                                            <img class="img-responsive" src="<?php echo $b['image']['url'];?>">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 pad-20c">
                                        <?php
                                        if($b['picto']['url']!='')
                                        {
                                            ?>
                                            <div class="row marg-30c">
                                                <div class="picto pull-left pad-10b"><img src="<?php echo $b['picto']['url'];?>"></div><h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                                <!--<div class="col-xs-2">

                                                </div>
                                                <div class="col-xs-10">

                                                </div>-->
                                            </div>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="row marg-30c">
                                                <div class="col-xs-12">
                                                    <h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <?php echo $b['texte'];?>
                                    </div>
                                </div>
                                <?php


                            }
                            if($b['acf_fc_layout']=='2_colonnes_vignettes')
                            {
                                ?>
                                <div class="row marg-30c">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <?php
                                                if($b['picto_1']['url']!='')
                                                {
                                                    ?>
                                                    <img src="<?php echo $b['picto_1']['url'];?>">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-xs-12 col-sm-8">

                                                <?php echo $b['texte_1'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-4">
                                                <?php
                                                if($b['picto_2']['url']!='')
                                                {
                                                    ?>
                                                    <img src="<?php echo $b['picto_2']['url'];?>">
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-xs-12 col-sm-8">

                                                <?php echo $b['texte_2'];?>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <?php


                            }
                            if($b['acf_fc_layout']=='texte_texte_image')
                            {
                                ?>
                                <div id="<?php echo $b['ancre'];?>" class="row marg-30c">
                                    <div class="col-xs-12 col-sm-4 col-sm-push-8 pad-30a pad-20c">
                                        <?php
                                        if($b['image']['url']!='')
                                        {
                                            ?>
                                            <img class="img-responsive" src="<?php echo $b['image']['url'];?>">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-sm-pull-4 pad-20c">
                                        <?php
                                        if($b['picto']['url']!='')
                                        {
                                            ?>
                                            <div class="row marg-30c">
                                                <div class="col-xs-12">
                                                    <div class="picto pull-left pad-10b"><img src="<?php echo $b['picto']['url'];?>"></div>
                                                    <h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="row marg-30c">
                                                <div class="col-xs-12">
                                                    <h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 pad-50b">
                                                <?php
                                                echo $b['colonne_1'];
                                                if($b['lien_colonne_1']!='')
                                                {
                                                    ?>
                                                    <ul class="savoir-plus">
                                                        <li>
                                                            <a href="<?php echo $b['url_colonne_1'];?>"><?php echo $b['lien_colonne_1'];?></a>
                                                        </li>
                                                    </ul>

                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 pad-bordureleft pad-50d">
                                                <?php
                                                echo $b['colonne_2'];
                                                if($b['lien_colonne_2']!='')
                                                {
                                                    ?>
                                                    <ul class="savoir-plus">
                                                        <li>
                                                            <a href="<?php echo $b['url_colonne_2'];?>"><?php echo $b['lien_colonne_2'];?></a>
                                                        </li>
                                                    </ul>

                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <?php

                            }
                            if($b['acf_fc_layout']=='image_texte_texte')
                            {
                                ?>
                                <div id="<?php echo $b['ancre'];?>" class="row marg-30c">
                                    <div class="col-xs-12 col-sm-4 pad-25a pad-20c">
                                        <?php
                                        if($b['image']['url']!='')
                                        {
                                            ?>
                                            <img class="img-responsive" src="<?php echo $b['image']['url'];?>">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 pad-20c">
                                        <?php
                                        if($b['picto']['url']!='')
                                        {
                                            ?>
                                            <div class="row marg-30c">
                                                <div class="col-xs-12">
                                                    <div class="picto pull-left pad-10b"><img src="<?php echo $b['picto']['url'];?>"></div>
                                                    <h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="row marg-30c">
                                                <div class="col-xs-12">
                                                    <h2 class="title-heading-left"><?php echo $b['titre_h2'];?></h2>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 pad-50b">
                                                <?php
                                                echo $b['colonne_1'];
                                                if($b['lien_colonne_1']!='')
                                                {
                                                    ?>
                                                    <ul class="savoir-plus">
                                                        <li>
                                                            <a href="<?php echo $b['url_colonne_1'];?>"><?php echo $b['lien_colonne_1'];?></a>
                                                        </li>
                                                    </ul>

                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 pad-bordureleft pad-50d">
                                                <?php
                                                echo $b['colonne_2'];
                                                if($b['lien_colonne_2']!='')
                                                {
                                                    ?>
                                                    <ul class="savoir-plus">
                                                        <li>
                                                            <a href="<?php echo $b['url_colonne_2'];?>"><?php echo $b['lien_colonne_2'];?></a>
                                                        </li>
                                                    </ul>

                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <?php

                            }
                            /***********************Bordures*****************************/
                            if($b['acf_fc_layout']=='bordure_fleche')
                            {
                                ?>
                                <div class="col-xs-12 bordure_fleche" style="padding:0;">
                                </div>
                                <?php
                            }
                            if($b['acf_fc_layout']=='bordure_ligne')
                            {
                                ?>
                                <div class="col-xs-12 bordure_ligne" style="padding:0;">

                                </div>
                                <?php
                            }
                            if($b['acf_fc_layout']=='bordure_ligne_noire')
                            {
                                ?>
                                <div class="col-xs-12 bordure_ligne noire" style="padding:0;">

                                </div>
                                <?php
                            }
                            /***********************Bouton lien*****************************/
                            if($b['acf_fc_layout']=='lien')
                            {
                                ?>
                                <div class="text-center marg-60a marg-30c">
                                    <a class="button-1" href="<?php echo $b['url'];?>"><?php echo $b['titre_lien'];?></a>
                                </div>
                                <?php
                            }

                            echo'</div>';
                        echo'</div>';

                    }
                }
                ?>
            </div>
        </div>

        <?php
    endwhile; endif;
?>



<?php get_footer(); ?>
