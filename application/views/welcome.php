<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Credibility Evaluation</title>
	<script>
		var warnBeforeUnload = true;

		window.onbeforeunload = function() {
			if (warnBeforeUnload && $("input[name=email]").val()) {
				return "Are you sure you want to leave? Changes you made will not be saved.";	
			}
			return undefined;
		}

		// Form Submit
    $(document).on("submit", "form", function(event){
        warnBeforeUnload = false;
    });
	</script>
</head>
<body>

<div id="container">
	<h2>Welcome!</h2><hr>

	<?php if ($errors = validation_errors()) { ?>
	<div class="alert alert-danger" role="alert">
		<?php echo $errors; ?>
	</div>
	<?php } ?>

	<div id="body">
		<?php echo form_open('part1'); ?>
		<p>
			In this survey, you will be viewing two sets of websites. Links will be provided that will open pop-up windows to display each.
		</p>

		<br>
		<h4>Instructions:</h4>
		<ol>
			<li>You have <b>25 seconds</b> to view a website after clicking their link. Their window will then close automatically afterwards.	Each may only be <b>viewed once</b>.</li>
			<br>
			<li>Look around each website and <b>assess their credibility</b>. Links to other parts of the website have been disabled and only the homepages are viewable and interactable.</li>
			<br>
			<li>Focus on <b>how they look</b> then based on your <b>first impression</b>, rate their credibility and provide some insight on how you came up with such judgement. </li>
		</ol>
		<br>

		<p>For this study to succeed, your careful assessment about the <b>believability</b> of each website is needed.</p>

		<p>After accomplishing this survey, you may choose a cause to receive a donation of Php 50.00 from the researcher. (Only valid responses will be qualified.)</p>

		<div class="required-note">Required *</div>

		<div>
			<h4><label class="form-required" for="email">
			  <?php if (form_error('email')) { ?>
			  	<span style="color: #a94442">E-mail address
			  		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  	</span>
			  <?php } else { ?>
			    Email address
			  <?php } ?>
			</label></h4>
			<input type="email" name="email" placeholder="i.e. juan_dc@gmail.com" value="<?php echo set_value('email'); ?>" required></input>
		</div>

		<br>
		<input type="submit" class="btn btn-default" value="Begin">
		</form>

		<br><br>
		<small>Disclaimer:<br>This is an independent study that is not affiliated with the government and links within this survey do not lead to the actual websites. This study was designed for their improvement and no harm is intended to any of the entities referenced. </small>
		
	</div>

	<p class="footer"><strong>Version 2.0.1</strong></p>
</div>

</body>
</html>