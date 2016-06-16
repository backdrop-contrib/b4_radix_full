<?php
/**
 * @file
 * Template for the Rolph Full layout.  Like 1.4 core, but with more markup, classes and wrappers.
 *
 * Variables:
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: Status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node.)
 * - $action_links: Array of actions local to the page, such as 'Add menu' on
 *   the menu administration interface.
 * - $classes: Array of CSS classes to be added to the layout wrapper.
 * - $attributes: Array of additional HTML attributes to be added to the layout
 *     wrapper. Flatten using backdrop_attributes().
 * - $content: An array of content, each item in the array is keyed to one
 *   region of the layout. This layout supports the following sections:
 *   - $content['header']
 *   - $content['top']
 *   - $content['quarter1']
 *   - $content['quarter2']
 *   - $content['quarter3']
 *   - $content['quarter4']
 *   - $content['bottom']
 *   - $content['footer']
 */
?>
  <?php if ($content['header']): ?>
    <header class="l-header" role="banner" aria-label="<?php print t('Site header'); ?>">
      <div class="container container-fluid l-header-inner">
        <?php print $content['header']; ?>
      </div>
    </header>
  <?php endif; ?>

<div class="layout--rolph-full <?php print implode(' ', $classes); ?>"<?php print backdrop_attributes($attributes); ?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <div class="l-wrapper">
    <div class="l-wrapper-inner">

      <?php if ($messages): ?>
        <div class="l-messages" role="status" aria-label="<?php print t('Status messages'); ?>">
          <div class="container container-fluid l-messages-inner">
            <?php print $messages; ?>
          </div>
        </div>
      <?php endif; ?>

      <header class="l-page-title">
        <div class="container container-fluid l-page-title-inner">
          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h1 class="page-title"><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
        </div>
      </header>

      <?php if ($tabs): ?>
        <nav class="container container-fluid tabs" role="tablist" aria-label="<?php print t('Admin Content Navigation Tabs'); ?>">
          <?php print $tabs; ?>
        </nav>
      <?php endif; ?>

      <?php print $action_links; ?>

      <?php if (!empty($content['top'])): ?>
        <div class="l-top">
          <div class="container container-fluid l-top-inner">
            <?php print $content['top']; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($content['content']): ?>
        <div class="row">
          <main class="col-md-12 l-content" role="main" aria-label="<?php print t('Main content'); ?>">
            <?php print $content['content']; ?>
          </main>
        </div>
      <?php endif; ?>

    <?php if ($content['quarter1'] || $content['quarter2'] || $content['quarter3'] || $content['quarter4']): ?>
      <div class="l-middle l-quarters">
          <div class="container container-fluid l-quarters-inner">
            <div class="row l-quarters-inner-2">
              <div class="col-md-3  l-quarters-region">
                <?php print $content['quarter1']; ?>
              </div>
              <div class="col-md-3 l-quarters-region">
                <?php print $content['quarter2']; ?>
              </div>
              <div class="col-md-3 l-quarters-region">
                <?php print $content['quarter3']; ?>
              </div>
              <div class="col-md-3 l-quarters-region">
                <?php print $content['quarter4']; ?>
              </div>
            </div>
          </div>
        </div><!-- /.l-middle .l-quarters -->
      <?php endif; ?>

      <?php if (!empty($content['bottom'])): ?>
        <div class="l-bottom">
          <div class="container container-fluid l-bottom-inner">
            <div class="row l-bottom-inner-2">
              <div class="col-md-12 l-bottom-region">
                <?php print $content['bottom']; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div><!-- /.l-wrapper-inner -->
  </div><!-- /.l-wrapper -->

  <?php if ($content['footer']): ?>
    <footer class="l-footer"  role="footer">
      <div class="container container-fluid l-footer-inner">
        <div class="row l-footer-inner-2">
          <div class="col-md-12 l-footer-region">
            <?php print $content['footer']; ?>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </footer>
  <?php endif; ?>
</div><!-- /.layout--rolph-full -->
