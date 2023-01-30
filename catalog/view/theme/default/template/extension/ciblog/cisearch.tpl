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
      <h3 class="ciblog-heading"><?php echo $heading_title; ?></h3>
      <label class="control-label" for="input-search"><?php echo $entry_search; ?></label>
      <div class="row">
        <div class="col-sm-4">
          <input type="text" name="ciblog_search" value="<?php echo $search; ?>" placeholder="<?php echo $text_keyword; ?>" id="input-search" class="form-control" />
        </div>
        <div class="col-sm-3">
          <select name="ciblog_category_id" class="form-control">
            <option value="0"><?php echo $text_category; ?></option>
            <?php foreach ($categories as $category_1) { ?>
            <?php if ($category_1['ciblog_category_id'] == $ciblog_category_id) { ?>
            <option value="<?php echo $category_1['ciblog_category_id']; ?>" selected="selected"><?php echo $category_1['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $category_1['ciblog_category_id']; ?>"><?php echo $category_1['name']; ?></option>
            <?php } ?>
            <?php foreach ($category_1['children'] as $category_2) { ?>
            <?php if ($category_2['ciblog_category_id'] == $ciblog_category_id) { ?>
            <option value="<?php echo $category_2['ciblog_category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $category_2['ciblog_category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
            <?php } ?>
            <?php foreach ($category_2['children'] as $category_3) { ?>
            <?php if ($category_3['ciblog_category_id'] == $ciblog_category_id) { ?>
            <option value="<?php echo $category_3['ciblog_category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $category_3['ciblog_category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
            <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-3">
          <label class="checkbox-inline">
            <?php if ($sub_category) { ?>
            <input type="checkbox" name="sub_category" value="1" checked="checked" />
            <?php } else { ?>
            <input type="checkbox" name="sub_category" value="1" />
            <?php } ?>
            <?php echo $text_sub_category; ?></label>
        </div>
      </div>
      <p>
        <label class="checkbox-inline">
          <?php if ($description) { ?>
          <input type="checkbox" name="description" value="1" id="description" checked="checked" />
          <?php } else { ?>
          <input type="checkbox" name="description" value="1" id="description" />
          <?php } ?>
          <?php echo $entry_description; ?></label>
      </p>
      <input type="button" value="<?php echo $button_search; ?>" id="button-search" class="btn btn-primary" />
      <h3 class="text-center ciblog-heading"><?php echo $text_search; ?></h3>
      <?php if ($blogposts) { ?>
        <?php foreach ($blogposts as $blogpost) { ?>
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
                    <?php if ($blogpost['rating']) { ?><li><label><?php echo $text_rating; ?></label> <span class="ciblog-rating rating"><?php for ($i = 1; $i <= 5; $i++) { ?><?php if ($blogpost['rating'] < $i) { ?><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><?php } else { ?><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span><?php } ?>
                    <?php } ?></span></li><?php } ?>
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
        <?php } ?>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      <?php } else { ?>
      <p><?php echo $text_empty; ?></p>
      <?php } ?>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<script type="text/javascript"><!--
$('#button-search').bind('click', function() {
	url = 'index.php?route=extension/ciblog/cisearch';

	var search = $('#content input[name=\'ciblog_search\']').prop('value');

	if (search) {
		url += '&ciblog_search=' + encodeURIComponent(search);
	}

	var ciblog_category_id = $('#content select[name=\'ciblog_category_id\']').prop('value');

	if (ciblog_category_id > 0) {
		url += '&ciblog_category_id=' + encodeURIComponent(ciblog_category_id);
	}

	var sub_category = $('#content input[name=\'sub_category\']:checked').prop('value');

	if (sub_category) {
		url += '&sub_category=true';
	}

	var filter_description = $('#content input[name=\'description\']:checked').prop('value');

	if (filter_description) {
		url += '&description=true';
	}

	location = url;
});

$('#content input[name=\'ciblog_search\']').bind('keydown', function(e) {
	if (e.keyCode == 13) {
		$('#button-search').trigger('click');
	}
});

$('select[name=\'ciblog_category_id\']').on('change', function() {
	if (this.value == '0') {
		$('input[name=\'sub_category\']').prop('disabled', true);
	} else {
		$('input[name=\'sub_category\']').prop('disabled', false);
	}
});

$('select[name=\'ciblog_category_id\']').trigger('change');
--></script>
<?php echo $footer; ?>