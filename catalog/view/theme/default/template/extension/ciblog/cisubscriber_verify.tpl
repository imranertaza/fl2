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
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
      <h1 class="text-center"><?php echo $heading_title; ?></h1>
      <div class="row">
        <div class="col-sm-4 col-md-offset-4 ">
          <?php if (!$verified) { ?>
          <div class="ciblog-subscriber-verify ciblog-panel">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $text_title; ?></h3>
              </div>
              <div class="panel-body">
                <div class="ciblog_code">
                  <input type="text" name="ciblog_code" value="" placeholder="<?php echo $text_code; ?>" class="form-control input-sm" />
                  <div class="buttons">
                    <button type="button" class="btn btn-primary btn-sm" onclick="ciCodeVerify(this);"><i class="fa fa-shield"></i> <?php echo $button_verify; ?></button>

                    <a class="pull-right ciblog-resendcode" onclick="ciCodeResend(this)"><?php echo $button_resend_code; ?></a>

                  </div>
                </div>

              </div>
            </div>
          </div>
          <?php } else { ?>
          <div class="alert alert-success"><?php echo $text_verified; ?></div>
          <?php } ?>
        </div>
      </div>
      <div class="buttons clearfix">
        <div class="pull-right"><a href="<?php echo $continue; ?>" class="btn btn-primary"><?php echo $button_continue; ?></a></div>
      </div>

      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
    <style type="text/css">
  .ciblog-resendcode {
    cursor: pointer;
    color: #a94442;
  }
</style>
<script type="text/javascript">
  function ciCodeVerify(el) {
    var $ciblog_code = $(el).parents('.ciblog_code').first();
    var code = $ciblog_code.find('input[name="ciblog_code"]').val();

    $.ajax({
      url: 'index.php?route=extension/ciblog/cisubscriber/verifyManual&key=' + encodeURIComponent(code),
      type: 'get',
      dataType: 'json',
      beforeSend: function() {
        $(el).button('loading');
      },
      complete: function() {
        $(el).button('reset');
      },
      success: function(json) {
        console.log(json)
        $('.alert, .text-danger').remove();

        if (json['error']) {
          if(typeof json['error']['warning'] != 'undefined' && json['error']['warning']) {
            $ciblog_code.find('input[name="ciblog_code"]').before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i> ' + json['error']['warning'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
          }
          if(typeof json['error']['code'] != 'undefined' && json['error']['code']) {
            $ciblog_code.find('input[name="ciblog_code"]').after('<div class="text-danger"><i class="fa fa-check-circle"></i> ' + json['error']['code'] + '</div>');
          }
          if(typeof json['error']['email'] != 'undefined' && json['error']['email']) {
            $ciblog_code.find('input[name="ciblog_code"]').after('<div class="text-danger"><i class="fa fa-check-circle"></i> ' + json['error']['email'] + '</div>');
          }
        }
        if (json['success']) {
          $ciblog_code.find('input[name="ciblog_code"]').before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  }

  function ciCodeResend(el) {
    var $ciblog_code = $(el).parents('.ciblog_code').first();
    var code = $ciblog_code.find('input[name="ciblog_code"]').val();

    $.ajax({
      url: 'index.php?route=extension/ciblog/cisubscriber/codeResend&key=' + encodeURIComponent(code),
      type: 'get',
      dataType: 'json',
      beforeSend: function() {
        $(el).button('loading');
      },
      complete: function() {
        $(el).button('reset');
      },
      success: function(json) {
        console.log(json)
        $('.alert, .text-danger').remove();

        if (json['error']) {
          if(typeof json['error']['warning'] != 'undefined' && json['error']['warning']) {
            $ciblog_code.find('input[name="ciblog_code"]').before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i> ' + json['error']['warning'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
          }
          if(typeof json['error']['code'] != 'undefined' && json['error']['code']) {
            $ciblog_code.find('input[name="ciblog_code"]').after('<div class="text-danger"><i class="fa fa-check-circle"></i> ' + json['error']['code'] + '</div>');
          }
          if(typeof json['error']['email'] != 'undefined' && json['error']['email']) {
            $ciblog_code.find('input[name="ciblog_code"]').after('<div class="text-danger"><i class="fa fa-check-circle"></i> ' + json['error']['email'] + '</div>');
          }
        }
        if (json['success']) {
          $ciblog_code.find('input[name="ciblog_code"]').before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  }
</script></div>
<?php echo $footer; ?>