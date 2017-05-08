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
		<?php echo form_open('welcome'); ?>
		<p>
			In this study you will: </br>
			1. View 4 websites. </br>
			2. Evaluate each website's credibility. </br>
			3. Give a brief exlanation to support your choice.
		</p>
		<p>For our study to succeed, we need your careful assessment about the believability of each site.</p>

		<p>After accomplishing this survey, you may choose a cause among those that will be listed to receive a donation of Php 50.00.</p>
		<p>Thank you for helping.</p>

		<div class="required-note">Required *</div>

		<div>
			<h4><label class="form-required" for="email">
			  <?php if (form_error('email')) { ?>
			  	<span style="color: #a94442">E-mail address
			  		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  	</span>
			  <?php } else { ?>
			    E-mail address
			  <?php } ?>
			</label></h4>
			<input type="email" name="email" placeholder="Input email here" value="<?php echo set_value('email'); ?>" required></input>
		</div>

		<br>
		<input type="submit" class="btn btn-default" value="Begin">
		</form>
		
	</div>

	<p class="footer"><strong>Version 1.0.2</strong></p>
</div>

</body>
</html>