<div class="ciblog-topview ciblog-sidelayout" id="ciblog-topview<?php echo $module; ?>">
  <h3><?php echo $text_title; ?></h3>
  <?php if ($view == 'few') { ?>
  <?php foreach ($blogposts as $blogpost) { ?>
  <?php $blogpost['image_thumb_width'] = $few_width.'px'; ?>
  <?php $blogpost['image_thumb_height'] = $few_height.'px'; ?>
  <div class="post-container row">
    <a href="<?php echo $blogpost['href']; ?>">
      <?php $caption_sm = 12; ?>
      <?php if ($image_show_listing) { ?>
      <?php $caption_sm = 8; ?>
      <div class="post-image col-sm-4">
       <div class="image img-radius"><?php if ($blogpost['add_video_url']) { ?><div class="civideo-container"><iframe width="<?php echo $blogpost['image_thumb_width']; ?>" height="<?php echo $blogpost['image_thumb_height']; ?>" src="<?php echo $blogpost['video_url']; ?>" frameborder="0" showinfo="0" controls="0" autohide="1" allowfullscreen></iframe></div><?php } else { ?><a href="<?php echo $blogpost['href']; ?>"><img src="<?php echo $blogpost['thumb']; ?>" alt="<?php echo $blogpost['image_alt']; ?>" title="<?php echo $blogpost['image_title']; ?>" class="img-responsive" /></a><?php } ?></div>
      </div>
      <?php } ?>
      <div class="post-caption col-sm-<?php echo $caption_sm; ?>">
        <h4><?php echo $blogpost['name']; ?></h4>
        <?php /* <p><?php echo $blogpost['description']; ?></p> */ ?>
      </div>
      <div class="clearfix"></div>
    </a>
  </div>
  <?php } ?>
  <?php } ?>
  <?php if ($view == 'more') { ?>
  <?php foreach ($blogposts as $blogpost) { ?>
  <div class="post-container">
    <div class="ciblogpost ciblog-layout ciblog-list">
      <div class="ciblog-thumb">
        <div class="col-sm-4">
          <?php if ($image_show_listing) { ?><div class="image img-radius"><?php if ($blogpost['add_video_url']) { ?><div class="civideo-container"><iframe width="<?php echo $blogpost['image_thumb_width']; ?>" height="<?php echo $blogpost['image_thumb_height']; ?>" src="<?php echo $blogpost['video_url']; ?>" frameborder="0" allowfullscreen></iframe></div><?php } else { ?><a href="<?php echo $blogpost['href']; ?>"><img src="<?php echo $blogpost['thumb']; ?>" alt="<?php echo $blogpost['image_alt']; ?>" title="<?php echo $blogpost['image_title']; ?>" class="img-responsive" /></a><?php } ?></div><?php } ?>
        </div>
        <div class="col-sm-8">
          <div class="cicaption">
            <?php if ($show_title) { ?><h4><a href="<?php echo $blogpost['href']; ?>"><?php echo $blogpost['name']; ?></a></h4><?php } ?>
            <ul class="ciblog-info list-inline">
              <?php if ($show_author && !empty($blogpost['author']['name'])) { ?><li><label><?php echo $text_postby; ?></label> <span><a href="<?php echo $blogpost['author']['href']; ?>"><?php echo $blogpost['author']['name']; ?></a></span></li><?php } ?>
              <?php if ($show_date_publish) { ?><li><label><?php echo $text_on; ?></label> <span><a href="<?php echo $blogpost['search_date_added']; ?>"><?php echo $blogpost['date_added']; ?></a></span></li><?php } ?>
              <?php if ($blogpost['rating']) { ?>
              <li><label><?php echo $text_rating; ?></label> <span class="ciblog-rating rating"><?php for ($i = 1; $i <= 5; $i++) { ?><?php if ($blogpost['rating'] < $i) { ?><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><?php } else { ?><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span><?php } ?><?php } ?></span></li>
              <?php } ?>
            </ul>
            <?php if ($show_description) { ?><div class="ciblog-description"><p><?php echo $blogpost['description']; ?></p></div><?php } ?>
            <div class="row">
              <div class="col-sm-6">
                <a href="<?php echo $blogpost['href']; ?>" class="btn btn-primary"><?php echo $button_read_more; ?></a>
              </div>
              <div class="col-sm-6">
                <div class="ciblog-view text-right">
                  <ul class="list-inline">
                    <?php if ($show_total_view) { ?><li><i class="fa fa-eye"></i> <?php echo $blogpost['viewed']; ?></li><?php } ?>
                    <?php if ($like_show_total) { ?><li class="hearting" data-blogid="<?php echo $blogpost['ciblog_post_id']; ?>"><?php if($blogpost['isMyHeart']) { ?><i class="fa fa-heart"></i><?php } else { ?><i class="fa fa-heart-o <?php if($can_like) { ?>cimyheart<?php } ?>"></i><?php } ?> <span><?php echo $blogpost['heart']; ?></span></li><?php } ?>
                    <?php if ($comment_show_total) { ?><li><i class="fa fa-comments"></i> <?php echo $blogpost['comments']; ?></li><?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php } ?>
</div>