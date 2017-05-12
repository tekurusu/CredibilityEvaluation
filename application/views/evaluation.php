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
		<p>Please visit the websites listed below. You have 25 seconds to view the website before the window closes. You may only visit the website ONCE. 
			After looking around the websites, rate its credibility, rank both and provide some insight in the comments on how you come up with such judgement. 
				Remember, you are judging if the web sites are believable based on first impressions.</p>
		<div class="required-note">Required *</div>
		<?php echo form_open('evaluation'); ?>
		    <?php echo form_hidden('_segment','1');?>

		    <a id="website_1"><h3>View Website 1</h3></a>
		    <h4><label class="form-required">
		    	Credibility Rating 
		    </label></h4>
		    <p>how believable does this website look?</p>
		    <table class="cred_rating">
		    	<tr>
		    		<th>&nbsp;</th>
		    		<th class="rating-row">0</th>
		    		<th class="rating-row">1</th>
		    		<th class="rating-row">2</th>
		    		<th class="rating-row">3</th>
		    		<th class="rating-row">4</th>
		    		<th class="rating-row">5</th>
		    		<th>&nbsp;</th>
		    	</tr>
		    	<tr>
		    		<td class="label-row">Not<br>believable</td>
		    		<td class="rating-row"><input type="radio" name="mod_rating_1" value="0" required <?php echo set_radio('mod_rating_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="mod_rating_1" value="1" <?php echo set_radio('mod_rating_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="mod_rating_1" value="2" <?php echo set_radio('mod_rating_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="mod_rating_1" value="3" <?php echo set_radio('mod_rating_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="mod_rating_1" value="4" <?php echo set_radio('mod_rating_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="mod_rating_1" value="5" <?php echo set_radio('mod_rating_1', '5'); ?> /></td>
		    		<td class="label-row">Super<br>duper<br>believable</td>
		    	</tr>
		   	</table>
		   	<br>
		   	<h4><label class="form-required" for="mod_rating_1">
		    	What influenced your opinion? 
		    </label></h4>
		    <p>why did you give this rating? Please elaborate thoroughly.</p>
		    <textarea class="comment-input" name="mod_comment_1" rows="4" cols="40" required><?php echo set_value('mod_comment_1'); ?></textarea>

		    <br><br><hr>	

		    <a id="website_2"><h3>View Website 2</h3></a>
		    <h4><label class="form-required">
		    	Credibility Rating 
		    </label></h4>
		    <p>how believable does this website look?</p>
		    <table class="cred_rating">
		    	<tr>
		    		<th>&nbsp;</th>
		    		<th class="rating-row">0</th>
		    		<th class="rating-row">1</th>
		    		<th class="rating-row">2</th>
		    		<th class="rating-row">3</th>
		    		<th class="rating-row">4</th>
		    		<th class="rating-row">5</th>
		    		<th>&nbsp;</th>
		    	</tr>
		    	<tr>
		    		<td class="label-row">Not<br>believable</td>
		    		<td class="rating-row"><input type="radio" name="orig_rating_1" value="0" required <?php echo set_radio('orig_rating_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="orig_rating_1" value="1" <?php echo set_radio('orig_rating_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="orig_rating_1" value="2" <?php echo set_radio('orig_rating_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="orig_rating_1" value="3" <?php echo set_radio('orig_rating_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="orig_rating_1" value="4" <?php echo set_radio('orig_rating_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="orig_rating_1" value="5" <?php echo set_radio('orig_rating_1', '5'); ?> /></td>
		    		<td class="label-row">Super<br>duper<br>believable</td>
		    	</tr>
		   	</table>
		   	<br>
		   	<h4><label class="form-required" for="orig_rating_1">
		    	What influenced your opinion? 
		    </label></h4>
		    <p>why did you give this rating? </p>
		    <textarea class="comment-input" name="orig_comment_1" rows="4" cols="40" required><?php echo set_value('orig_comment_1'); ?></textarea>

		    <br><br>
		    <hr>	

		    <h3><label class="form-required">
		    	Website Assessment
		    </label></h3>
		    <p>which website is more believable?</p>
		    <div class="multiple-option">
		    	<input type="radio" id="rank_1_M" name="rank_1" value="M" required <?php echo set_radio('rank_1', 'M'); ?> />
		    	<label for="rank_1_M">Website 1</label>
		    </div>
		    <div class="multiple-option">
		    	<input type="radio" id="rank_1_O" name="rank_1" value="O" <?php echo set_radio('rank_1', 'O'); ?> />
		    	<label for="rank_1_O">Website 2</label>
		    </div>
		    <br>
		    <h4><label>
		    	Reasoning
		    </label></h4>
		    <p>How did the following factors affect your decision? Please rate from 0 to 5 with zero being "No effect" and 5 being "Super duper effect".</p>
		    <table class="cred_rating factor-matrix">
		    	<tr>
		    		<th>&nbsp;</th>
		    		<th class="rating-row">0</th>
		    		<th class="rating-row">1</th>
		    		<th class="rating-row">2</th>
		    		<th class="rating-row">3</th>
		    		<th class="rating-row">4</th>
		    		<th class="rating-row">5</th>
		    		<th class="rating-row">&nbsp;</th>
		    	</tr>
		    	<tr>
		    		<td class="label-row form-required">Color </td>
		    		<td class="rating-row"><input type="radio" name="color_1" value="0" required <?php echo set_radio('color_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="color_1" value="1" <?php echo set_radio('color_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="color_1" value="2" <?php echo set_radio('color_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="color_1" value="3" <?php echo set_radio('color_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="color_1" value="4" <?php echo set_radio('color_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="color_1" value="5" <?php echo set_radio('color_1', '5'); ?> /></td>
		    		<td class="rating-row">&nbsp;</td>
		    	</tr>
		    	<tr>
		    		<td class="label-row form-required">Typography <br>(font styles)</td>
		    		<td class="rating-row"><input type="radio" name="font_1" value="0" required <?php echo set_radio('font_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="font_1" value="1" <?php echo set_radio('font_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="font_1" value="2" <?php echo set_radio('font_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="font_1" value="3" <?php echo set_radio('font_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="font_1" value="4" <?php echo set_radio('font_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="font_1" value="5" <?php echo set_radio('font_1', '5'); ?> /></td>
		    		<td class="rating-row">&nbsp;</td>
		    	</tr>
		    	<tr>
		    		<td class="label-row form-required">Images/Graphics </td>
		    		<td class="rating-row"><input type="radio" name="graphics_1" value="0" required <?php echo set_radio('graphics_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="graphics_1" value="1" <?php echo set_radio('graphics_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="graphics_1" value="2" <?php echo set_radio('graphics_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="graphics_1" value="3" <?php echo set_radio('graphics_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="graphics_1" value="4" <?php echo set_radio('graphics_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="graphics_1" value="5" <?php echo set_radio('graphics_1', '5'); ?> /></td>
		    		<td class="rating-row">&nbsp;</td>
		    	</tr>
		    	<tr>
		    		<td class="label-row form-required">Branding <br>(logos/indentity)</td>
		    		<td class="rating-row"><input type="radio" name="branding_1" value="0" required <?php echo set_radio('branding_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="branding_1" value="1" <?php echo set_radio('branding_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="branding_1" value="2" <?php echo set_radio('branding_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="branding_1" value="3" <?php echo set_radio('branding_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="branding_1" value="4" <?php echo set_radio('branding_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="branding_1" value="5" <?php echo set_radio('branding_1', '5'); ?> /></td>
		    		<td class="rating-row">&nbsp;</td>
		    	</tr>
		    	<tr>
		    		<td class="label-row form-required">Layout </td>
		    		<td class="rating-row"><input type="radio" name="layout_1" value="0" required <?php echo set_radio('layout_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="layout_1" value="1" <?php echo set_radio('layout_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="layout_1" value="2" <?php echo set_radio('layout_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="layout_1" value="3" <?php echo set_radio('layout_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="layout_1" value="4" <?php echo set_radio('layout_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="layout_1" value="5" <?php echo set_radio('layout_1', '5'); ?> /></td>
		    		<td class="rating-row">&nbsp;</td>
		    	</tr>
		    	<tr>
		    		<td class="label-row form-required">Navigation </td>
		    		<td class="rating-row"><input type="radio" name="navigation_1" value="0" required <?php echo set_radio('navigation_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="navigation_1" value="1" <?php echo set_radio('navigation_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="navigation_1" value="2" <?php echo set_radio('navigation_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="navigation_1" value="3" <?php echo set_radio('navigation_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="navigation_1" value="4" <?php echo set_radio('navigation_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="navigation_1" value="5" <?php echo set_radio('navigation_1', '5'); ?> /></td>
		    		<td class="rating-row">&nbsp;</td>
		    	</tr>
		    	<tr>
		    		<td class="label-row form-required">Sidebar </td>
		    		<td class="rating-row"><input type="radio" name="sidebar_1" value="0" required <?php echo set_radio('sidebar_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="sidebar_1" value="1" <?php echo set_radio('sidebar_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="sidebar_1" value="2" <?php echo set_radio('sidebar_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="sidebar_1" value="3" <?php echo set_radio('sidebar_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="sidebar_1" value="4" <?php echo set_radio('sidebar_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="sidebar_1" value="5" <?php echo set_radio('sidebar_1', '5'); ?> /></td>
		    		<td class="rating-row">&nbsp;</td>
		    	</tr>
		    	<tr>
		    		<td class="label-row form-required">Content Selection 	</td>
		    		<td class="rating-row"><input type="radio" name="content_1" value="0" required <?php echo set_radio('content_1', '0'); ?> /></td>
		    		<td class="rating-row"><input type="radio" name="content_1" value="1" <?php echo set_radio('content_1', '1'); ?> /></td>
					<td class="rating-row"><input type="radio" name="content_1" value="2" <?php echo set_radio('content_1', '2'); ?> /></td>
					<td class="rating-row"><input type="radio" name="content_1" value="3" <?php echo set_radio('content_1', '3'); ?> /></td>
					<td class="rating-row"><input type="radio" name="content_1" value="4" <?php echo set_radio('content_1', '4'); ?> /></td>
					<td class="rating-row"><input type="radio" name="content_1" value="5" <?php echo set_radio('content_1', '5'); ?> /></td>
		    		<td class="rating-row">&nbsp;</td>
		    	</tr>
		   	</table>
		   	<br><br>
			<input type="submit" value="Next">
			</form>
	</div>

	<p class="footer"><strong>Version 1.0</strong></p>
</div>

</body>
</html>