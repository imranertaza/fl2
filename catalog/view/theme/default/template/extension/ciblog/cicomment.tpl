<?php if ($cicomments) { ?>
<?php foreach ($cicomments as $cicomment) { ?>
<table class="table table-striped table-bordered">
  <tr>
    <td style="width: 50%;"><strong><?php echo $cicomment['author']; ?></strong></td>
    <td class="text-right"><?php echo $cicomment['date_added']; ?></td>
  </tr>
  <tr>
    <td colspan="2"><p><?php echo $cicomment['text']; ?></p></td>
  </tr>
</table>
<?php } ?>
<div class="text-right"><?php echo $pagination; ?></div>
<?php } else { ?>
<p><?php echo $text_no_comments; ?></p>
<?php } ?>