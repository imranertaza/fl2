<?php echo $header; ?>
<div class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li> <a href="<?php echo $breadcrumb['href']; ?>"> <?php echo $breadcrumb['text']; ?> </a> </li>
    <?php } ?>
  </ul>
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?> ciblog-content"><?php echo $content_top; ?>
      <h2 class="bgheading"><?php echo $heading_title; ?></h2>
      <?php if ($categories) { ?>
      <div class="panel panel-default ciauthor-wrap">
        <div class="panel-body">
          <ul class="list-inline">
            <?php foreach ($categories as $category) { ?>
            <li>
              <h2 class="ciauthor-c" id="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></h2>
              <?php if ($category['author']) { ?>
              <?php foreach ($category['author'] as $author) { ?>
              <div class="ciauthors">
                <a href="<?php echo $author['href']; ?>">
                  <img src="<?php echo $author['thumb']; ?>" alt="<?php echo $author['image_alt']; ?>" title="<?php echo $author['image_title']; ?>" /> <br/> <span><?php echo $author['name']; ?></span>
                </a>
              </div>
              <?php } ?>
              <?php } ?>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <?php } else { ?>
      <p><?php echo $text_empty; ?></p>
      <div class="buttons clearfix">
        <div class="pull-right"><a href="<?php echo $continue; ?>" class="btn btn-primary"><?php echo $button_continue; ?></a></div>
      </div>
      <?php } ?>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>