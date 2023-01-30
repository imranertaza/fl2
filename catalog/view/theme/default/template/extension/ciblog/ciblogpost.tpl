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
      <div class="row">
        <div class="col-sm-12 ciblogpost">
          <h3 class="ciblog-heading"><?php echo $heading_title; ?></h3>
          <div class="ciblog-view">
            <ul class="list-inline">
              <?php if ($blogpage_show_author && $author['name']) { ?>
              <li><i class="fa fa-user"></i> <a href="<?php echo $author['href']; ?>"><?php echo $author['name']; ?></a></li>
              <?php } ?>
              <?php if ($blogpage_show_date_publish) { ?><li><i class="fa fa-calendar"></i> <?php echo $date_added; ?></li><?php } ?>
              <?php if ($blogpage_show_total_view) { ?><li><i class="fa fa-eye"></i> <?php echo $viewed; ?></li><?php } ?>
              <?php if ($blogpage_like_show_total) { ?><li class="hearting" data-blogid="<?php echo $ciblog_post_id; ?>" ><?php if($isMyHeart) { ?><i class="fa fa-heart"></i><?php } else { ?><i class="fa fa-heart-o <?php if($can_like) { ?>cimyheart<?php } ?>"></i><?php } ?> <span><?php echo $heart; ?></span></li><?php } ?>
              <?php if ($blogpage_comment_show_total) { ?><li><i class="fa fa-comments"></i> <?php echo $comments; ?></li><?php } ?>
              <?php if ($rating) { ?><li><label><?php echo $text_rating; ?></label> <span class="ciblog-rating rating"><?php for ($j = 1; $j <= 5; $j++) { ?><?php if ($rating < $j) { ?><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span><?php } else { ?><span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span><?php } ?><?php } ?></span></li><?php } ?>
            </ul>
          </div>
          <hr>
          <?php if ($blog_image_show_thumb) { ?>
            <?php if ($add_video_url && $video_url) { ?>
            <div class="civideo-container">
              <iframe width="<?php echo $image_thumb_width; ?>" height="<?php echo $image_thumb_height; ?>" src="<?php echo $video_url; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <?php } else { ?>
            <?php if ($thumb || $images) { ?>
            <ul class="thumbnails">
              <?php if ($thumb) { ?>
              <?php /* <li><a href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>"><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" class="img-responsive" /></a></li> */ ?>
              <li><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" class="img-responsive" /></li>
              <?php } ?>
            </ul>
            <ul class="list-unstyled ciblog-image-additional clearfix">
              <?php if ($images) { ?>
                <?php foreach ($images as $image) { ?>
                <?php /* <li><a href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>"> <img class="img-responsive" src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li> */ ?>
                <li><img class="img-responsive" src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></li>
                <?php } ?>
              <?php } ?>
            </ul>
            <?php } ?>
            <?php } ?>
          <?php } ?>
          <div class="cibdescription"><?php echo $description; ?></div>
          <?php if ($tags) { ?>
          <p class="ciblog-tags"><i class="fa fa-tags" aria-hidden="true" title="<?php echo $text_tags; ?>"></i>
            <?php $i = 0; ?>
            <?php $c = count($tags); ?>
            <?php foreach ($tags as $tag) { ?>
            <a href="<?php echo $tag['href']; ?>"><?php echo $tag['tag']; ?></a>
            <?php if ($i < $c-1) { echo ','; } ?>
            <?php $i++; ?>
            <?php } ?>
          </p>
          <?php } ?>
          <?php if ($blogpage_show_social_share) { ?>
          <!-- AddThis Button BEGIN -->
          <div class="addthis_toolbox addthis_default_style" data-url="<?php echo $share; ?>"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script>
          <!-- AddThis Button END -->
          <?php } ?>
          <?php if ($allow_comment) { ?>
            <div id="cicomment">
              <div class="cicomnt-icon text-center">
                <i class="fa fa-thumbs-o-up fa-cicb"></i>
              </div>
              <?php if (!$comment_guest) { ?>
              <!-- ask for login/signup here -->
              <?php echo $text_login; ?>
              <?php } else { ?>
              <?php if ($blogpage_comment_show) { ?>
              <div id="cicomments">

              </div>
              <?php } ?>
              <form class="form-horizontal" id="form-cicomment">
                <h4><?php echo $text_write; ?></h4>
                <div class="form-group">
                  <div class="col-sm-6">
                    <input type="text" name="cibc_author" class="form-control" placeholder="<?php echo $entry_author; ?>" value="<?php echo $customer_name; ?>" />
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="cibc_email" class="form-control" placeholder="<?php echo $entry_email; ?>" value="<?php echo $customer_email; ?>" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea class="form-control" name="cibc_text" rows="5" placeholder="<?php echo $entry_text; ?>"></textarea>
                    <div class="help-block"><?php echo $text_note; ?></div>
                  </div>
                </div>
                <div class="form-group required">
                  <div class="ciratings clearfix" id="cirating">
                    <label class="control-label col-sm-2 xl-20 xs-100" ><?php echo $entry_rating; ?>: </label>
                    <div class="col-sm-9 xl-80 xs-100">
                    <input type="number" name="cibc_rating" id="cirating_star" class="cirating-stars" value="" data-clearable="remove"/>
                    </div>
                  </div>
                </div>
                <div class="ci-capatcha"><?php echo $captcha; ?></div>
                <button type="button" class="btn btn-primary cicomment-submit"><i class="fa fa-thumbs-o-up"></i> <?php echo $button_continue; ?></button>
              </form>
              <?php } ?>
            </div>

            <?php if($rich) { ?><script type="application/ld+json"><?php echo $rich; ?></script><?php } ?>
          <?php } ?>
        </div>
      </div>
      <?php if ($blogposts) { ?>
      <h3 class="ciblog-heading"><?php echo $text_related; ?></h3>
      <hr>
      <div class="row">
        <?php $i = 0; ?>

        <?php if ($column_left && $column_right) { ?>
        <?php $sm = 6; ?>
        <?php if($blogrelated_row) { $sm = 12/$blogrelated_row; } ?>
        <?php $class = 'col-xs-12 col-sm-'.$sm; ?>
        <?php } elseif ($column_left || $column_right) { ?>
        <?php $sm = 6; ?>
        <?php $md = 6; ?>
        <?php if($blogrelated_row) { $sm = 12/$blogrelated_row; $md = 12/$blogrelated_row; } ?>
        <?php $class = 'col-xs-12 col-md-'.$md.' col-sm-'.$sm; ?>
        <?php } else { ?>
        <?php $sm = 3; ?>
        <?php if($blogrelated_row) { $sm = 12/$blogrelated_row; } ?>
        <?php $class = 'col-xs-12 col-sm-'.$sm; ?>
        <?php } ?>
        <?php foreach ($blogposts as $blogpost) { ?>
        <div class="<?php echo $class; ?> ciblogpost ciblog-layout ciblog-grid">
          <?php if ($blogrelated_show_title) { ?><h4><a href="<?php echo $blogpost['href']; ?>"><?php echo $blogpost['name']; ?></a></h4><hr class="hr"><?php } ?>
          <ul class="ciblog-info list-inline">
            <?php if ($blogrelated_show_author && $blogpost['author']['name']) { ?><li><label><?php echo $text_postby; ?></label> <span><a href="<?php echo $blogpost['author']['href']; ?>"><?php echo $blogpost['author']['name']; ?></a></span></li><?php } ?>
            <?php if ($blogrelated_show_date_publish) { ?><li><label><?php echo $text_on; ?></label> <span><a href="<?php echo $blogpost['search_date_added']; ?>"><?php echo $blogpost['date_added']; ?></a></span></li><?php } ?>
            <?php if ($blogpost['rating']) { ?><li><label><?php echo $text_rating; ?></label> <span class="ciblog-rating rating"><?php for ($j = 1; $j <= 5; $j++) { ?><?php if ($blogpost['rating'] < $j) { ?><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span><?php } else { ?><span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span><?php } ?><?php } ?></span></li><?php } ?>
          </ul>
          <div class="ciblog-thumb">
            <?php if ($blogrelated_image_show_listing) { ?><div class="image img-radius"><?php if ($blogpost['add_video_url']) { ?><div class="civideo-container"><iframe width="<?php echo $blogpost['image_thumb_width']; ?>" height="<?php echo $blogpost['image_thumb_height']; ?>" src="<?php echo $blogpost['video_url']; ?>" frameborder="0" allowfullscreen></iframe></div><?php } else { ?><a href="<?php echo $blogpost['href']; ?>"><img src="<?php echo $blogpost['thumb']; ?>" alt="<?php echo $blogpost['image_alt']; ?>" title="<?php echo $blogpost['image_title']; ?>" class="img-responsive" /></a><?php } ?></div><?php } ?>
            <div class="ciblog-caption">
              <div class="ciblog-view">
                <ul class="list-inline">
                  <?php if ($blogrelated_show_total_view) { ?><li><i class="fa fa-eye"></i> <?php echo $blogpost['viewed']; ?></li><?php } ?>
                  <?php if ($blogrelated_like_show_total) { ?><li class="hearting" data-blogid="<?php echo $blogpost['ciblog_post_id']; ?>"><?php if($blogpost['isMyHeart']) { ?><i class="fa fa-heart"></i><?php } else { ?><i class="fa fa-heart-o <?php if($can_like) { ?>cimyheart<?php } ?>"></i><?php } ?> <span><?php echo $blogpost['heart']; ?></span></li><?php } ?>
                  <?php if ($blogrelated_comment_show_total) { ?><li><i class="fa fa-comments"></i> <?php echo $blogpost['comments']; ?></li><?php } ?>
                </ul>
              </div>
              <?php if ($blogrelated_show_description) { ?><div class="ciblog-description"><p><?php echo $blogpost['description']; ?></p></div><?php } ?>

              <a href="<?php echo $blogpost['href']; ?>" class="btn btn-primary"><?php echo $button_read_more; ?></a>
            </div>
          </div>
        </div>
        <?php if (($column_left && $column_right) && (($i+1) % 2 == 0)) { ?>
        <div class="clearfix visible-md visible-sm"></div>
        <?php } elseif (($column_left || $column_right) && (($i+1) % 3 == 0)) { ?>
        <div class="clearfix visible-md"></div>
        <?php } elseif (($i+1) % 4 == 0) { ?>
        <div class="clearfix visible-md"></div>
        <?php } ?>
        <?php $i++; ?>
        <?php } ?>
      </div>
      <?php } ?>
      <?php if ($products) { ?>
      <h3 class="ciblog-heading"><?php echo $text_related_products; ?></h3>
      <hr>
      <div class="row">
        <?php $i = 0; ?>
        <?php foreach ($products as $product) { ?>
        <?php if ($column_left && $column_right) { ?>
        <?php $class = 'col-xs-8 col-sm-6'; ?>
        <?php } elseif ($column_left || $column_right) { ?>
        <?php $class = 'col-xs-6 col-md-4'; ?>
        <?php } else { ?>
        <?php $class = 'col-xs-6 col-sm-3'; ?>
        <?php } ?>
        <div class="<?php echo $class; ?>">
          <div class="product-thumb transition">
            <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" /></a></div>
            <div class="caption">
              <h4><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h4>
              <p><?php echo $product['description']; ?></p>
              <?php if ($product['rating']) { ?>
              <div class="rating">
                <?php for ($j = 1; $j <= 5; $j++) { ?>
                <?php if ($product['rating'] < $j) { ?>
                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                <?php } else { ?>
                <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                <?php } ?>
                <?php } ?>
              </div>
              <?php } ?>
              <?php if ($product['price']) { ?>
              <p class="price">
                <?php if (!$product['special']) { ?>
                <?php echo $product['price']; ?>
                <?php } else { ?>
                <span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
                <?php } ?>
                <?php if ($product['tax']) { ?>
                <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
                <?php } ?>
              </p>
              <?php } ?>
            </div>
            <div class="button-group">
              <button type="button" onclick="cart.add('<?php echo $product['product_id']; ?>', '<?php echo $product['minimum']; ?>');"><span class="hidden-xs hidden-sm hidden-md"><?php echo $button_cart; ?></span> <i class="fa fa-shopping-cart"></i></button>
              <button type="button" data-toggle="tooltip" title="<?php echo $button_wishlist; ?>" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-heart"></i></button>
              <button type="button" data-toggle="tooltip" title="<?php echo $button_compare; ?>" onclick="compare.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <?php if (($column_left && $column_right) && (($i+1) % 2 == 0)) { ?>
        <div class="clearfix visible-md visible-sm"></div>
        <?php } elseif (($column_left || $column_right) && (($i+1) % 3 == 0)) { ?>
        <div class="clearfix visible-md"></div>
        <?php } elseif (($i+1) % 4 == 0) { ?>
        <div class="clearfix visible-md"></div>
        <?php } ?>
        <?php $i++; ?>
        <?php } ?>
      </div>
      <?php } ?>

      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>

<script type="text/javascript"><!--
<?php if ($blogpage_comment_show) { ?>
  $('#cicomments').delegate('.pagination a', 'click', function(e) {
      e.preventDefault();

      $('#cicomments').fadeOut('slow');

      $('#cicomments').load(this.href);

      $('#cicomments').fadeIn('slow');
  });
  ciCommentsRefresh();
<?php } ?>

function ciCommentsRefresh() {
  $('#cicomments').load('index.php?route=extension/ciblog/ciblogpost/cicomment&ciblog_post_id=<?php echo $ciblog_post_id; ?>');

}

function ciCommentFieldsObj() {
  return {
  'cibc_author' : $('input[name=\'cibc_author\']'),
  'cibc_email' : $('input[name=\'cibc_email\']'),
  'cibc_text' : $('textarea[name=\'cibc_text\']'),
  'form_cicomment' : $("#form-cicomment"),
  'cibc_rating' : $('#cirating'),
  };
}

function ciCommentFormReset() {
  var $objs = ciCommentFieldsObj();
  $objs.cibc_author.val('');
  $objs.cibc_email.val('');
  $objs.cibc_text.val('');

  $('input.cirating-stars[type=number]').each(function() {
    $(this).rating('clear');
  });
}


$('.cicomment-submit').on('click', function() {
  var $objs = ciCommentFieldsObj();
  var $this = $(this);

  var data = $objs.form_cicomment.serialize();
	$.ajax({
		url: 'index.php?route=extension/ciblog/ciblogpost/write&ciblog_post_id=<?php echo $ciblog_post_id; ?>',
		type: 'post',
		dataType: 'json',
		data: data,
		beforeSend: function() {
			$this.button('loading');
		},
		complete: function() {
			$this.button('reset');
		},
		success: function(json) {
			$('.cierror.alert-success, .cierror.alert-danger, .cierror.text-danger').remove();

			if (json['error']) {

        if(typeof json['error']['cibc_author'] != 'undefined' && json['error']['cibc_author'] != '') {
          $objs.cibc_author.after('<div class="cierror text-danger">'+ json['error']['cibc_author'] +'</div>');
        }

        if(typeof json['error']['cibc_text'] != 'undefined' && json['error']['cibc_text'] != '') {
          $objs.cibc_text.after('<div class="cierror text-danger">'+ json['error']['cibc_text'] +'</div>');
        }

        if(typeof json['error']['cibc_email'] != 'undefined' && json['error']['cibc_email'] != '') {
          $objs.cibc_email.after('<div class="cierror text-danger">'+ json['error']['cibc_email'] +'</div>');
        }
        if(typeof json['error']['cibc_rating'] != 'undefined' && json['error']['cibc_rating'] != '') {
          $objs.cibc_rating.append('<div class="cierror text-danger">'+ json['error']['cibc_rating'] +'</div>');
        }

        // if(typeof json['error']['captcha'] != 'undefined' && json['error']['captcha'] != '') {
        //   $('.ci-capatcha').html(json['captcha']);
        // }

        if(json['captcha']) {
          $('.ci-capatcha').html(json['captcha']);
        }

        if (json['error']['error']) {
				  $objs.form_cicomment.before('<div class="cierror alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['error'] + '</div>');
        }
			}

			if (json['success']) {

        if(typeof json['success']['msg'] != 'undefined' && json['success']['msg'] != '') {
				  $objs.form_cicomment.before('<div class="cierror alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success']['msg'] + '</div>');
        }

        ciCommentFormReset();
        <?php if ($blogpage_comment_show) { ?>ciCommentsRefresh();<?php } ?>

			}
		}
	});
});

$('input.cirating-stars[type=number]').each(function() {
    $(this).rating({
      'min' : 1,
      'max' :  5,
      'icon-lib' : "cifa fa",
      'active-icon' : "fa-star",
      'inactive-icon' : "fa-star-o",
      'clearable' : false,
      'divclass' : 'cirating-input',
    });
  });

// $(document).ready(function() {
// 	$('.thumbnails').magnificPopup({
// 		type:'image',
// 		delegate: 'a',
// 		gallery: {
// 			enabled:true
// 		}
// 	});
// });
//--></script>
<?php echo $footer; ?>
