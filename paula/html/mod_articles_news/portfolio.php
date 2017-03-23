<?php defined('_JEXEC') or die;
$moduleTag      = $params->get('module_tag', 'section');
$moduleId       = $module->position . '-' . $module->id;
?>

<<?php echo $moduleTag; ?> class="no-padding" id="<?php echo $moduleId; ?>">
	<div class="container-fluid">
		<div class="row no-gutter popup-gallery <?php echo $moduleclass_sfx; ?>">

			<!-- Foreach Schleife - ruft die Artikel aus der gewählten Kategorie in einer Schleife auf -->
			<?php foreach ($list as $item) : ?>
				<!-- Zuweisung der Variablen für das Einleitungsbild und das Bild, welches im Popup aufgeht -->

				<?php
				$images = json_decode($item->images);
				$introimg = $images->image_intro;
				$introimgalt = $images->image_intro_alt;
				$fullimg = $images->image_fulltext;
				?>
				<!-- Ausgabe des Bildkacheln -->
				<div class="col-lg-4 col-sm-6">
					<a href="<?php echo $fullimg; ?>" class="portfolio-box">
						<img src="<?php echo $introimg; ?>" class="img-responsive" alt="<?php echo $introimgalt; ?>">

						<div class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category text-faded">
									<!-- Ausgabe des Kategorietitels -->
									<?php echo $item->category_title; ?>
								</div>
								<div class="project-name">
									<!-- Ausgabe des Artikeltitels -->
									<?php echo $item->title; ?>
								</div>
							</div>
						</div>
					</a>
				</div>
		<?php endforeach; ?>
	</div><!-- Row Ende -->
</div><!--Container Ende -->
</<?php echo $moduleTag; ?>>
