<head>
	<script src="<?php echo base_url("public/js/submit_page.js"); ?>"></script>
	<script>
		function setViewWebsite(element, site_key) {
			popWindow('<?php echo $short_link; ?>', site_key);
		  	$(element).css("color", "#ddd")
		  		.addClass("prevent-hover");
		}

		$(document).ready(function() {

		  $("#website_1").one("click", function(){
		  	setViewWebsite(this, 1);
		  });

		  $("#website_2").one("click", function(){
		  	setViewWebsite(this, 3);
		  });
		});
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
	<h2>Set 1</h2>
	<hr>
	<?php if ($errors = validation_errors()) { ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $errors; ?>
	</div>
	<?php } ?>

	<div id="body">
		<p>Please visit the websites listed below. You may stay in each for 10 second, after which their window will close automatically. You may only visit the website ONCE. After looking around the websites, come back to this page, rate it's credibility, rank both and provide some insight in the comments on how you come up with such judgement. Remember, you are judging if the web sites are believable based on first impressions.</p>
		<div class="required-note">Required *</div>	
		<?php echo form_open('evaluation'); ?>
		    <?php echo form_hidden('_segment','1');?>

		    <a id="website_1"><h3>View Website 1</h3></a>
		    <a id="website_2"><h3>View Website 2</h3></a>

<br><br><br><br>

				<div class="row">
					<div class="col-md-3">Websites</div>
					<div class="col-md-3">Credibility Rating</div>
					<div class="col-md-3">
					  <?php if (form_error('rank_1')) { ?>
					  	<span style="color: #a94442">More believable
					  		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  	</span>
					  <?php } else { ?>
					    More believable
					  <?php } ?>
					</div>
					<div class="col-md-3">Please share your comments</div>
				</div>
			 	<div class="row" id="row1"><div class="form-group">
					<div class="col-md-3"><a id="website_1">View Website 1</a></div>
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
								<td><input type="radio" name="mod_rating_1" value="1" required <?php echo set_radio('mod_rating_1', '1'); ?> /></td>
								<td><input type="radio" name="mod_rating_1" value="2" <?php echo set_radio('mod_rating_1', '2'); ?> /></td>
								<td><input type="radio" name="mod_rating_1" value="3" <?php echo set_radio('mod_rating_1', '3'); ?> /></td>
								<td><input type="radio" name="mod_rating_1" value="4" <?php echo set_radio('mod_rating_1', '4'); ?> /></td>
								<td><input type="radio" name="mod_rating_1" value="5" <?php echo set_radio('mod_rating_1', '5'); ?> /></td>
							</tr>
						</table>
					</div>
					<div class="col-md-3"><input type="radio" name="rank_1" value="M" required <?php echo set_radio('rank_1', 'M'); ?> /></div>
					<div class="col-md-3"><textarea name="mod_comment_1" rows="4" cols="40" required></textarea></div>
				</div></div>

				<div class="row" id="row2"><div class="form-group">
					<div class="col-md-3"><a id="website_2">View Website 2</a></div>
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
								<td><input type="radio" name="orig_rating_1" value="1" required <?php echo set_radio('orig_rating_1', '1'); ?> /></td>
								<td><input type="radio" name="orig_rating_1" value="2" <?php echo set_radio('orig_rating_1', '2'); ?> /></td>
								<td><input type="radio" name="orig_rating_1" value="3" <?php echo set_radio('orig_rating_1', '3'); ?> /></td>
								<td><input type="radio" name="orig_rating_1" value="4" <?php echo set_radio('orig_rating_1', '4'); ?> /></td>
								<td><input type="radio" name="orig_rating_1" value="5" <?php echo set_radio('orig_rating_1', '5'); ?> /></td>
							</tr>
						</table>
					</div>
					<div class="col-md-3"><input type="radio" name="rank_1" value="O" <?php echo set_radio('rank_1', 'O'); ?> /></div>
					<div class="col-md-3"><textarea name="orig_comment_1" rows="4" cols="40" required></textarea></div>
				</div></div>
				<input type="submit" value="Next">
			</form>
	</div>

	<p class="footer"><strong>Version 1.0</strong></p>
</div>

</body>
</html>