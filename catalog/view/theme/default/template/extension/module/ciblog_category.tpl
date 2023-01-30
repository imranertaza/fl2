<div class="ciblog-category ciblog-panel" id="ciblog-category<?php echo $module; ?>">
  <h3><?php echo $text_title; ?></h3>
  <ul class="list list-unstyled ciblog-list">
    <?php foreach ($categories as $category) { ?>
    <?php if ($category['ciblog_category_id'] == $ciblog_category_id) { ?>
    <li><a href="<?php echo $category['href']; ?>" class="active"><i class="fa fa-angle-double-right"></i> <?php echo $category['name']; ?></a></li>
    <?php if ($category['children']) { ?>
    <ul class="list-unstyled ci-subcategory">
    <?php foreach ($category['children'] as $child) { ?>
    <?php if ($child['ciblog_category_id'] == $child_id) { ?>
    <li><a href="<?php echo $child['href']; ?>" class="active">&nbsp;&nbsp;&nbsp;- <?php echo $child['name']; ?></a></li>
    <?php } else { ?>
    <li><a href="<?php echo $child['href']; ?>">&nbsp;&nbsp;&nbsp;- <?php echo $child['name']; ?></a></li>
    <?php } ?>
    <?php } ?>
    </ul>
    <?php } ?>
    <?php } else { ?>
    <li><a href="<?php echo $category['href']; ?>"><i class="fa fa-angle-double-right"></i> <?php echo $category['name']; ?></a></li>
    <?php } ?>
    <?php } ?>
  </ul>
</div>