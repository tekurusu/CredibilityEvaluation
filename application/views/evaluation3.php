<head>
	<script>
	var theURL = 'website';
	var width  = 300;
	var height = 400;

	function popWindow() {
	newWindow = window.open(theURL,'newWindow','toolbar=no,menubar=no,resizable=no,scrollbars=no,status=no,location=no,width='+width+',height='+height);
	}
	</script>
	<style>
	#row1
	{
		background-color: ghostwhite;
	}
	#row2
	{
		background-color: gainsboro;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>3. <?php echo $site_name; ?></h1>

	<?php echo validation_errors(); ?>

	<?php $hidden = array();
  	 //Access $data['posted_data'] and compile an array 
  	 //of key/pair values of the hidden fields
  	 if(isset($posted_data)) {
  	   foreach ($posted_data as $name => $val) {
  	   $hidden[$name] = $val;
  	 }
  	}
  ?>

	<div id="body">
		<p>Please visit the websites listed below. You may stay in each for 10 second, after which their window will close automatically. After looking around the websites, come back to this page, rate it's credibility, rank both and provide some insight in the comments on how you come up with such judgement. Remember, you are judging if the web sites are believable based on first impressions.</p>
		<?php echo form_open('evaluation', '', $hidden); ?>
		    <?php echo form_hidden('_segment','3');?>
				<div class="row">
					<div class="col-md-3">Websites</div>
					<div class="col-md-3">Credibility Rating</div>
					<div class="col-md-3">More believable</div>
					<div class="col-md-3">Please share your comments</div>
				</div>
			 	<div class="row" id="row1"><div class="form-group">
					<div class="col-md-3"><a href="javascript:popWindow()">Link1</a></div>
					<div class="col-md-3">
						<table>
							<tr>
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td>4</td>
								<td>5</td>
							</tr>
							<tr>
								<td><input type="radio" name="mod_rating_3" value="1" <?php echo set_radio('mod_rating_3', '1'); ?> /></td>
								<td><input type="radio" name="mod_rating_3" value="2" <?php echo set_radio('mod_rating_3', '2'); ?> /></td>
								<td><input type="radio" name="mod_rating_3" value="3" <?php echo set_radio('mod_rating_3', '3'); ?> /></td>
								<td><input type="radio" name="mod_rating_3" value="4" <?php echo set_radio('mod_rating_3', '4'); ?> /></td>
								<td><input type="radio" name="mod_rating_3" value="5" <?php echo set_radio('mod_rating_3', '5'); ?> /></td>
							</tr>
						</table>
					</div>
					<div class="col-md-3"><input type="radio" name="rank_3" value="M" <?php echo set_radio('rank_3', 'M'); ?> /></div>
					<div class="col-md-3"><textarea name="mod_comment_3" rows="4" cols="40"></textarea></div>
				</div></div>

				<div class="row" id="row2"><div class="form-group">
					<div class="col-md-3"><a href="javascript:popWindow()">Link2</a></div>
					<div class="col-md-3">
						<table>
							<tr>
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td>4</td>
								<td>5</td>
							</tr>
							<tr>
								<td><input type="radio" name="orig_rating_3" value="1" <?php echo set_radio('orig_rating_3', '1'); ?> /></td>
								<td><input type="radio" name="orig_rating_3" value="2" <?php echo set_radio('orig_rating_3', '2'); ?> /></td>
								<td><input type="radio" name="orig_rating_3" value="3" <?php echo set_radio('orig_rating_3', '3'); ?> /></td>
								<td><input type="radio" name="orig_rating_3" value="4" <?php echo set_radio('orig_rating_3', '4'); ?> /></td>
								<td><input type="radio" name="orig_rating_3" value="5" <?php echo set_radio('orig_rating_3', '5'); ?> /></td>
							</tr>
						</table>
					</div>
					<div class="col-md-3"><input type="radio" name="rank_3" value="O" <?php echo set_radio('rank_3', 'O'); ?> /></div>
					<div class="col-md-3"><textarea name="orig_comment_3" rows="4" cols="40"></textarea></div>
				</div></div>
				<input type="submit">
			</form>
	</div>

	<p class="footer"><strong>Version 1.0</strong></p>
</div>

</body>
</html>