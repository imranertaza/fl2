<div class="ciblog-subscriber ciblog-panel" id="ciblog-subscriber<?php echo $module; ?>">
  <h3><?php echo $text_title; ?></h3>
  <div class="ciblog_subscriber ciblog-input-group">
    <input type="text" name="ciblog_subscriber" value="<?php echo $email; ?>" placeholder="<?php echo $entry_email; ?>" class="form-control" />
    <div class="buttons">
      <button type="button" class="btn btn-primary" onclick="ciBlogSubscribe(this);"><?php echo $button_subscribe; ?></button>
      <a class="pull-right ciblog-unsubscribe" onclick="ciBlogUnSubscribe(this)"><?php echo $button_unsubscribe; ?></a>
    </div>
  </div>
</div>
<?php if ($module==0) { ?>
<script type="text/javascript">
  function ciBlogSubscribe(el) {
    var $ciblog_subscriber = $(el).parents('.ciblog_subscriber').first();
    var email = $ciblog_subscriber.find('input[name="ciblog_subscriber"]').val();

    $.ajax({
      url: 'index.php?route=extension/ciblog/cisubscriber',
      type: 'post',
      data: 'email=' + email ,
      dataType: 'json',
      beforeSend: function() {
        $(el).button('loading');
      },
      complete: function() {
        $(el).button('reset');
      },
      success: function(json) {
        console.log(json)
        $ciblog_subscriber.find('.alert,.text-danger').remove();

        if (json['error']) {
          if(typeof json['error']['warning'] != 'undefined' && json['error']['warning']) {
            $ciblog_subscriber.find('input[name="ciblog_subscriber"]').before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i> ' + json['error']['warning'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
          }
          if(typeof json['error']['email'] != 'undefined' && json['error']['email']) {
            $ciblog_subscriber.find('input[name="ciblog_subscriber"]').after('<div class="text-danger"><i class="fa fa-check-circle"></i> ' + json['error']['email'] + '</div>');
          }
        }
        if (json['success']) {
          $ciblog_subscriber.find('input[name="ciblog_subscriber"]').before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  }
  function ciBlogUnSubscribe(el) {
    var $ciblog_subscriber = $(el).parents('.ciblog_subscriber').first();
    var email = $ciblog_subscriber.find('input[name="ciblog_subscriber"]').val();

    $.ajax({
      url: 'index.php?route=extension/ciblog/cisubscriber/unSubscribe',
      type: 'post',
      data: 'email=' + email ,
      dataType: 'json',
      beforeSend: function() {
        $(el).button('loading');
      },
      complete: function() {
        $(el).button('reset');
      },
      success: function(json) {
        console.log(json)
        $ciblog_subscriber.find('.alert,.text-danger').remove();

        if (json['error']) {
          if(typeof json['error']['warning'] != 'undefined' && json['error']['warning']) {
            $ciblog_subscriber.find('input[name="ciblog_subscriber"]').before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i> ' + json['error']['warning'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
          }
          if(typeof json['error']['email'] != 'undefined' && json['error']['email']) {
            $ciblog_subscriber.find('input[name="ciblog_subscriber"]').after('<div class="text-danger"><i class="fa fa-check-circle"></i> ' + json['error']['email'] + '</div>');
          }
        }
        if (json['success']) {
          $ciblog_subscriber.find('input[name="ciblog_subscriber"]').before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      }
    });
  }
</script>
<?php } ?>