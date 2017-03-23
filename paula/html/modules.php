<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


function modChrome_navigation($module, &$params, &$attribs)
{
	$moduleTag           = $params->get('module_tag', 'div');
	$moduleclass_sfx     = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');


	if (!empty ($module->content)) : ?>

			<<?php echo $moduleTag; ?> class="collapse navbar-collapse <?php echo $moduleclass_sfx; ?>" id="bs-example-navbar-collapse-1">
			<?php echo $module->content; ?>
		</<?php echo $moduleTag; ?>>

	<?php endif;
}

/* Chrome für das Headermodul */
function modChrome_header($module, &$params, &$attribs)
{
	$moduleTag           = $params->get('module_tag', 'header');
	$moduleId            = $module->position . '-' . $module->id;
	$moduleclass_sfx     = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
	$headerTag           = htmlspecialchars($params->get('header_tag', 'h1'), ENT_COMPAT, 'UTF-8');
	$headerClass         = htmlspecialchars($params->get('header_class', ''), ENT_COMPAT, 'UTF-8');
	$bgimage             = 'style="background-image:url('. $params->get('backgroundimage') .');"';

	if ($module->content)
	{
		?>

		<<?php echo $moduleTag; ?> id="<?php echo $moduleId; ?>" class="<?php echo $moduleclass_sfx; ?>" <?php echo $bgimage; ?>>
			<div class="header-content">
				<div class="header-content-inner">

					<?php if ($module->showtitle) : ?>

						<<?php echo $headerTag . ' class=" ' . $headerClass . '"'; ?>>
							<?php echo $module->title; ?>
						</<?php echo $headerTag; ?>>

					<?php endif; ?>

					<?php echo $module->content; ?>
				</div>
			</div>
		</<?php echo $moduleTag; ?>>
		<?php
	}
}

function modChrome_primary($module, &$params, &$attribs)
{
	$moduleTag           = $params->get('module_tag', 'header');
	$moduleId            = $module->position . '-' . $module->id;
	$moduleclass_sfx     = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
	$headerTag           = htmlspecialchars($params->get('header_tag', 'h1'), ENT_COMPAT, 'UTF-8');
	$headerClass         = htmlspecialchars($params->get('header_class', ''), ENT_COMPAT, 'UTF-8');
	$bgimage             = 'style="background-image:url('. $params->get('backgroundimage') .');"';

	if ($module->content)
	{
		?>

		<<?php echo $moduleTag; ?> class="bg-primary" id="<?php echo $moduleId; ?>" <?php echo $bgimage; ?>>
			<div class="container">
				<div class="row">
					<div class="<?php echo $moduleclass_sfx ?>">

						<?php if ($module->showtitle) : ?>

						<<?php echo $headerTag . ' class=" ' . $headerClass . '"'; ?>>
							<?php echo $module->title; ?>
						</<?php echo $headerTag; ?>>

						<?php endif; ?>

						<?php echo $module->content; ?>
					</div>
				</div>
			</div>
		</<?php echo $moduleTag; ?>>

		<?php
	}
}

function modChrome_dark($module, &$params, &$attribs)
{
	$moduleTag       = $params->get('module_tag', 'div');
	$moduleId        = $module->position . '-' . $module->id;
	$headerTag       = htmlspecialchars($params->get('header_tag', 'h3'), ENT_COMPAT, 'UTF-8');
	$headerClass     = htmlspecialchars($params->get('header_class', 'page-header'), ENT_COMPAT, 'UTF-8');
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
	if ($module->content)
	{
		?>

		<<?php echo $moduleTag; ?> class="bg-dark" id="<?php echo $moduleId; ?>">
		<div class="container">
			<div class="row">
				<div class="<?php echo $moduleclass_sfx ?>">
					<?php if ($module->showtitle)
					{
						echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
					}
					?>

					<?php echo $module->content; ?>
				</div>
			</div>
		</div>
		</<?php echo $moduleTag; ?>>

		<?php
	}
}

