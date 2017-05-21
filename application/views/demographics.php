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

	<div id="body" class="demographics">
		<p>Knowing some information about you will help make this a better study.</p>
		<div class="required-note">Required *</div>
		<?php echo form_open('thanks', '', $hidden); ?>
		<?php echo form_hidden('_segment','3');?>

    <h4><label class="form-required">
    	Gender
    </label></h4>
    <div class="multiple-option">
    	<input type="radio" id="gender_M" name="gender" value="Male" required <?php echo set_radio('gender', 'Male'); ?> />
    	<label for="gender_M" class="demo-option">Male</label>
    </div>
    <div class="multiple-option">
    	<input type="radio" id="gender_F" name="gender" value="Female" <?php echo set_radio('gender', 'Female'); ?> />
    	<label for="gender_F" class="demo-option">Female</label>
    </div>
    
    <br>
    <h4><label class="form-required">
    	Age
    </label></h4>
    <input class="demo-input" type="number" name="age" min="15" max="95" placeholder="i.e. 21" value="<?php echo set_value('age'); ?>" required></input>
    
    <br><br>
    <h4><label class="form-required">
    	Educational Attainment
    </label></h4>
    <input class="demo-input larger" type="text" name="education" placeholder="i.e. College graduate" value="<?php echo set_value('education'); ?>" required></input>

    <br><br>
		<h4><label class="form-required">
    	Occupation
    </label></h4>
    <input class="demo-input larger" type="text" name="occupation" placeholder="i.e. Teacher" value="<?php echo set_value('occupation'); ?>" required></input>

		<br><br>
		<h4><label class="form-required">
    	How many hours per day do you use the internet?
    </label></h4>
    <input class="demo-input" type="number" name="usage" min="0" max="24" placeholder="i.e. 4" value="<?php echo set_value('usage'); ?>" required></input>

    <br><br>
    <h4><label class="form-required">
    	Do you consider yourself informed about the government and its activities?
    </label></h4>
    <div class="multiple-option">
    	<input type="radio" id="informed_Y" name="informed" value="Y" required <?php echo set_radio('informed', 'Y'); ?> />
    	<label for="informed_Y" class="demo-option">Yes</label>
    </div>
    <div class="multiple-option">
    	<input type="radio" id="informed_N" name="informed" value="N" <?php echo set_radio('informed', 'N'); ?> />
    	<label for="informed_N" class="demo-option">No</label>
    </div>
    <br>

		<hr/>
			<br>
		<h4><label class="form-required">
    	Select an NGO
    </label></h4>
    <p>As a sign of gratitude,  Php 50.00 will be donated by the researcher to an NGO of your choice.</p>
    <div class="ngo multiple-option">
    	<input type="radio" id="ngo_1" name="ngo" value="1" required <?php echo set_radio('ngo', '1'); ?> />
    	<label for="ngo_1">
            <p>Project Liwanag (Indigenous People)</p>
            <img src="<?php echo base_url("public/images/liwanag.png"); ?>" class="liwanag"/>
        </label>
    </div><br>
    <div class="ngo multiple-option">
        <input type="radio" id="ngo_1" name="ngo" value="2" required <?php echo set_radio('ngo', '2'); ?> />
        <label for="ngo_2">
            <p>Philippine Toy Library (Education)</p>
            <img src="<?php echo base_url("public/images/toy-library.jpg"); ?>" class="toy-library"/>
        </label>
    </div><br>
    <div class="ngo multiple-option">
        <input type="radio" id="ngo_1" name="ngo" value="3" required <?php echo set_radio('ngo', '3'); ?> />
        <label for="ngo_3">
            <p>Hapag-asa (Hunger/Poverty)</p>
            <img src="<?php echo base_url("public/images/hapagasa.jpg"); ?>" class="food-hungry"/>
        </label>
    </div><br>

		</br>
		  <input type="submit" value="Submit">
		</form>
		
	</div>

	<p class="footer"><strong>Version 2.0.1</strong></p>
</div>

</body>
</html>