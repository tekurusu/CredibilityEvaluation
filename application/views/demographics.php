<head>
	<script>
	  var warnBeforeUnload = true;

		window.onbeforeunload = function() {
			if (warnBeforeUnload) {
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

	<h1>Demographics</h1>

	<div id="body">
		<p>Knowing some information about you will help make this a better study.</p>
		<?php echo form_open('evaluation', '', $hidden); ?>
		    <?php echo form_hidden('_segment','3');?>
			<div class="row">
					<div class="col-md-2">Gender</div>
					<div class="col-md-10">
						<input type="radio" name="gender" value="Female" required <?php echo set_radio('gender', 'Female'); ?> > Female &nbsp;&nbsp;
						<input type="radio" name="gender" value="Male" <?php echo set_radio('gender', 'Male'); ?> > Male
					</div>
			</div>
			<div class="row">
					<div class="col-md-2">Age</div>
					<div class="col-md-10"><input type="number" name="age" min="15" max="95" value="<?php echo set_value('age'); ?>" required></div>
			</div>
			<div class="row">
					<div class="col-md-2">Educational Attainment</div>
					<div class="col-md-10"><input type="text" name="education" value="<?php echo set_value('education'); ?>" required></div>
			</div>
			<div class="row">
					<div class="col-md-2">Occupation</div>
					<div class="col-md-10"><input type="text" name="occupation" value="<?php echo set_value('occupation'); ?>" required></div>
			</div>
			<div class="row">
					<div class="col-md-2">About how many hours each week do you use the web?</div>
					<div class="col-md-10"><input type="number" name="usage" min="1" max="168" value="<?php echo set_value('usage'); ?>" required></div>
			</div>
			<div class="row">
					<div class="col-md-2">Do you consider yourself informed about the government and its proceedings?</div>
					<div class="col-md-10">
						<input type="radio" name="informed" value="Yes" required <?php echo set_radio('informed', 'Yes'); ?> > Yes &nbsp;&nbsp;
						<input type="radio" name="informed" value="No" <?php echo set_radio('informed', 'No'); ?> > No
					</div>
			</div>
	<hr/>
			<p>As a sign of our gratitude, Php 50.00 will be donated to a cause of your choice.</p>
			<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="ngo" value="1" required <?php echo set_radio('ngo', '1'); ?> > NGO 1 &nbsp;&nbsp;
						<input type="radio" name="ngo" value="2" <?php echo set_radio('ngo', '2'); ?> > NGO 2 &nbsp;&nbsp;
						<input type="radio" name="ngo" value="3" <?php echo set_radio('ngo', '3'); ?> > NGO 3
			</div>
		</br>
		  <input type="submit" value="Submit">
		</form>
		
	</div>

	<p class="footer"><strong>Version 1.0</strong></p>
</div>

</body>
</html>