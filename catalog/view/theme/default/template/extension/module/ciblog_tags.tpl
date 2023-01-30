<div class="ciblog-tags ciblog-panel" id="ciblog-tags<?php echo $module; ?>">
  <h3 class="panel-title"><?php echo $text_title; ?></h3>
  <?php if ($tags) { ?>
  <p class="ciblog-tags"><i class="fa fa-tags" aria-hidden="true" title="<?php echo $text_tags; ?>"></i>
    <?php $i = 0; ?>
    <?php $c = count($tags); ?>
    <?php foreach ($tags as $tag) { ?>
    <a href="<?php echo $tag['href']; ?>"><?php echo $tag['tag']; ?></a>
    <?php if ($i < $c-1) { echo ', '; } ?>
    <?php $i++; ?>
    <?php } ?>
  </p>
  <?php } ?>
</div>