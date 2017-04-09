<head>
</head>
<body>

<div id="container">
	<h1>Demographics</h1>

	<div id="body">
		<p>Knowing some information about you will help make this a better study.</p>
		<form action="thanks">
			<div class="row">
					<div class="col-md-2">Gender</div>
					<div class="col-md-10">
						<input type="radio" name="gender" value="Female"> Female &nbsp;&nbsp;
						<input type="radio" name="gender" value="Male"> Male
					</div>
			</div>
			<div class="row">
					<div class="col-md-2">Age</div>
					<div class="col-md-10"><input type="number" name="age" min="15" max="95"></div>
			</div>
			<div class="row">
					<div class="col-md-2">Educational Attainment</div>
					<div class="col-md-10"><input type="text" name="education"></div>
			</div>
			<div class="row">
					<div class="col-md-2">Occupation</div>
					<div class="col-md-10"><input type="text" name="occupation"></div>
			</div>
			<div class="row">
					<div class="col-md-2">About how many hours each week do you use the web?</div>
					<div class="col-md-10"><input type="number" name="usage" min="1" max="168"></div>
			</div>
			<div class="row">
					<div class="col-md-2">Do you consider yourself informed about the government and its proceedings?</div>
					<div class="col-md-10">
						<input type="radio" name="informed" value="Yes"> Yes &nbsp;&nbsp;
						<input type="radio" name="informed" value="No"> No
					</div>
			</div>
	<hr/>
			<p>As a sign of our gratitude, Php 50.00 will be donated to a cause of your choice.</p>
			<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="informed" value="1"> NGO 1 &nbsp;&nbsp;
						<input type="radio" name="informed" value="2"> NGO 2 &nbsp;&nbsp;
						<input type="radio" name="informed" value="3"> NGO 3
			</div>
		</br>
		  <input type="submit" value="Submit">
		</form>
		
	</div>

	<p class="footer"><strong>Version 1.0</strong></p>
</div>

</body>
</html>