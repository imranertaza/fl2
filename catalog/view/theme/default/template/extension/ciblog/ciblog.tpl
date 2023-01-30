<?php echo $header; ?>
<div class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
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
      <h2><?php echo $heading_title; ?></h2>
      <?php if ($description) { ?>
      <div class="row">
        <div class="col-sm-12"><?php echo $description; ?></div>
      </div>
      <hr>
      <?php } ?>
      <?php $sm = 6; ?>
      <?php if($blog_row) { $sm = 12/$blog_row; } ?>
      <?php if ($blogposts) { ?>
      <div class="row ciblog-layout1">
        <?php foreach ($blogposts as $blogpost) { ?>
        <div class="ciblogpost ciblog-layout ciblog-grid col-sm-<?php echo $sm; ?> col-xs-12">
          <?php if ($show_title) { ?><h4><a href="<?php echo $blogpost['href']; ?>"><?php echo $blogpost['name']; ?></a></h4><hr class="hr" /><?php } ?>
          <ul class="ciblog-info list-inline">
            <?php if ($show_author && !empty($blogpost['author']['name'])) { ?><li><label><?php echo $text_postby; ?></label> <span><a href="<?php echo $blogpost['author']['href']; ?>"><?php echo $blogpost['author']['name']; ?></a></span></li><?php } ?>
            <?php if ($show_date_publish) { ?><li><label><?php echo $text_on; ?></label> <span><a href="<?php echo $blogpost['search_date_added']; ?>"><?php echo $blogpost['date_added']; ?></a></span></li><?php } ?>
            <?php if ($blogpost['rating']) { ?><li><label><?php echo $text_rating; ?></label> <span class="ciblog-rating rating"><?php for ($i = 1; $i <= 5; $i++) { ?><?php if ($blogpost['rating'] < $i) { ?><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><?php } else { ?><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span><?php } ?><?php } ?></span></li><?php } ?>
          </ul>
          <div class="ciblog-thumb">
            <?php if ($image_show_listing) { ?><div class="image img-radius"><?php if ($blogpost['add_video_url']) { ?><div class="civideo-container"><iframe width="<?php echo $blogpost['image_thumb_width']; ?>" height="<?php echo $blogpost['image_thumb_height']; ?>" src="<?php echo $blogpost['video_url']; ?>" frameborder="0" allowfullscreen></iframe></div><?php } else { ?><a href="<?php echo $blogpost['href']; ?>"><img src="<?php echo $blogpost['thumb']; ?>" alt="<?php echo $blogpost['name']; ?>" title="<?php echo $blogpost['name']; ?>" class="img-responsive" /></a><?php } ?></div><?php } ?>
            <div>
              <div class="ciblog-caption">
                <div class="ciblog-view">
                  <ul class="list-inline">
                    <?php if ($show_total_view) { ?><li><i class="fa fa-eye"></i> <?php echo $blogpost['viewed']; ?></li><?php } ?>
                    <?php if ($like_show_total) { ?><li class="hearting" data-blogid="<?php echo $blogpost['ciblog_post_id']; ?>"><?php if($blogpost['isMyHeart']) { ?><i class="fa fa-heart"></i><?php } else { ?><i class="fa fa-heart-o <?php if($can_like) { ?>cimyheart<?php } ?>"></i><?php } ?> <span><?php echo $blogpost['heart']; ?></span></li><?php } ?>
                    <?php if ($comment_show_total) { ?><li><i class="fa fa-comments"></i> <?php echo $blogpost['comments']; ?></li><?php } ?>
                  </ul>
                </div>
                <?php if ($show_description) { ?><div class="ciblog-description"><p><?php echo $blogpost['description']; ?></p></div><?php } ?>

                <a href="<?php echo $blogpost['href']; ?>" class="btn btn-primary"><?php echo $button_read_more; ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
        <div class="col-sm-6 text-right"><?php echo $results; ?></div>
      </div>
      <?php } else { ?>
      <p><?php echo $text_empty; ?></p>
      <div class="buttons">
        <div class="pull-right"><a href="<?php echo $continue; ?>" class="btn btn-primary"><?php echo $button_continue; ?></a></div>
      </div>
      <?php } ?>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>
