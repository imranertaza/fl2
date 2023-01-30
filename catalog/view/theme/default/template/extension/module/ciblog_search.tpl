<div class="ciblog-search ciblog-panel" id="ciblog-search<?php echo $module; ?>">
  <h3><?php echo $text_title; ?></h3>
  <div class="ciblog_search ciblog-input-group">
    <input type="text" name="ciblog_search" value="<?php echo $ciblog_search; ?>" placeholder="<?php echo $text_search; ?>" class="form-control" />
    <button type="button" class="btn btn-primary"><?php echo $text_search; ?></button>
  </div>
</div>

<?php if ($module==0) { ?>
<script type="text/javascript">
/* Search */
$(document).ready(function(){

	function ciBlogSearch(value) {
		var url = '<?php echo $search_page; ?>';
		var urlappend = '?';
		if(url.indexOf('?') > 0) {
			urlappend = '&';
		}

		var vars = [];
		if (value) {
			vars.push('ciblog_search=' + encodeURIComponent(value));
		}

		if(vars.length) {
			url += urlappend + vars.join('&');
		}

		// console.log(url);
		location = url;
	}

	$('.ciblog-search input[name=\'ciblog_search\']').each(function(){
		var $search = $(this);
		$search.parent().find('button').on('click', function(e,$thiss) {
			if(typeof $thiss != 'undefined') {
				ciBlogSearch($thiss.val());
			} else {
				ciBlogSearch($search.val());
			}
		});
	});

	$('.ciblog-search input[name=\'ciblog_search\']').each(function(){
		var $search = $(this);
		$search.on('keydown', function(e) {
			if (e.keyCode == 13) {
				$(this).parent().find('button').trigger('click',[$search]);
			}
		});
	});
});
</script>
<?php } ?>