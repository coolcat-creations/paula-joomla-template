<?php defined('_JEXEC') or die;
$moduleTag   = $params->get('module_tag', 'section');
$moduleId    = $module->position . '-' . $module->id;
$headerTag   = htmlspecialchars($params->get('header_tag', 'h2'), ENT_COMPAT, 'UTF-8');
$headerClass = $params->get('header_class');
$headerClass = !empty($headerClass) ? ' class="section-heading ' . htmlspecialchars($headerClass, ENT_COMPAT, 'UTF-8') . '"' : '';

$item_heading = $params->get('item_heading', 'h4');
$iconitems    = count($list);
$lgclass      = floor(12 / $iconitems);
?>

<<?php echo $moduleTag; ?> class="<?php echo $moduleclass_sfx; ?>" id="<?php echo $moduleId; ?>">

<!-- Abfrage ob der Modultitel dargestellt werden soll -->
<?php if ($module->showtitle) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<<?php echo $headerTag . ' class=" ' . $headerClass . '"'; ?>>
					<?php echo $module->title; ?>
				</<?php echo $headerTag; ?>>
				<hr class="primary">
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="container">
	<div class="row">
		<!-- Foreach Schleife - ruft die Artikel aus der gewählten Kategorie in einer Schleife auf -->
		<?php foreach ($list as $item) : ?>
			<div class="col-lg-<?php echo $lgclass; ?> text-center ">
				<div class="service-box">
					<!-- Abfrage ob der Titel eingeblendet werden soll -->
					<?php if ($params->get('item_title')) : ?>

						<!-- Ausgabe des Überschriften-Tags mit Modulklassen-Suffix -->
						<<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">

						<!-- Abfrage ob der Titel mit Link ausgegeben werden soll -->
						<?php if ($params->get('link_titles') && $item->link != '') : ?>
							<a href="<?php echo $item->link; ?>">
							<?php echo $item->title; ?>
							</a>

						<?php else : ?>
							<!-- Ansonsten Titel ohne Link ausgeben -->
							<?php echo $item->title; ?>
						<?php endif; ?>

					</<?php echo $item_heading; ?>>

					<?php endif; ?>

					<?php if (!$params->get('intro_only')) : ?>
						<?php echo $item->afterDisplayTitle; ?>
					<?php endif; ?>

					<?php echo $item->beforeDisplayContent; ?>

					<?php if ($params->get('show_introtext', '1')) : ?>
						<?php echo $item->introtext; ?>
					<?php endif; ?>

					<?php echo $item->afterDisplayContent; ?>

					<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) : ?>
						<?php echo '<a class="readmore" href="' . $item->link . '">' . $item->linkText . '</a>'; ?>
					<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?> <!-- Ende der foreach Schleife -->
	</div> <!--Row Ende-->
</div> <!-- Container Ende -->
</<?php echo $moduleTag; ?>>
