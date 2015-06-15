<?php var_dump($_GET); ?>
<?php var_dump($_POST); ?>

<!DOCTYPE html>
<html>

<head>
	<title>My First HTML Form</title>
	<meta charset="UTF-8">
</head>



<body>

	<section>
		<h1>My First HTML Forms</h1>

		<h2>Form #1</h2>

		<form method="POST" action="/my_first_form.php">
	        <input type="text" name="username" placeholder="Username">
	    	<input type="password" name="password" placeholder="Password">
		    <input type="submit" value="Submit Now">
		</form>

		<h2>My Second HTML Form</h2>

		<form method="POST" action="/my_first_form.php">
	        <input type="text" name="username" value="myemail@email.com" placeholder="Username">
	    	<input type="password" name="password" placeholder="Password">
		    <button>Submit It Now</button>
		</form>

		<h2>Another HTML Form</h2>

		<form method="GET" action="/my_first_form.php">
			<p>
				<label for="email">Input your email</label>
	        	<input type="text" name="username" placeholder="Username" autofocus required>
	        </p>
	        <p>
	        	<label for="email">Input your password</label>
	 	   		<input type="password" name="password" placeholder="Password" required>
		    </p>
		    <p>
		    <input type="submit" value="Log in now">
			</p>
		</form>
	</section>

	<section>
		<h2>Compose an Email Form</h2>
		<form method="POST" action="/my_first_form.php">
			<p>
				<label for="from">From:</label>
				<input id="from" type="text" name="from-email" placeholder="Your Email" required>
			</p>
			
			<p>
				<label for="to">To:</label>
				<input id="to" type="text" name="to-email" placeholder="Recpient's Email" required>
			</p>
			
			<p>
				<label for="subject">Subject:</label>
				<textarea id="subject" type="text" name="subject" rows="1" cols="40">Questions About Your Reservation</textarea>
			</p>
			
			<p>
				<label for="message">Email Message:</label>
				<textarea id="message" name="email_body" rows="5" cols="40" placeholder="Type your questions here."></textarea>
			</p>

			<p>
				<button>Send Now</button>
			</p>
		</form>
	</section>

	<section>
		<h2>Here's Another Form</h2>
		<form method="POST" action="/my_first_form.php">
			<p>
				<label for="to-2">To:</label>
				<textarea id="to-2" type="email" name="to-email" rows="1" cols="40" placeholder="Recipient's Email" autofocus required></textarea>
			</p>

			<p>
				<label for="from-2">From:</label>
				<textarea id="from-2" type="text" name"from-email" rows="1" cols="40" placeholder="Your Name" required></textarea>
			</p>

			<p>
				<label for="birthday-2">Your Birthday Message:</label>
				<textarea id="birthday-2" type="text" name="message" rows="5" cols="40" placeholder="Type your birthday message here." required></textarea>
			</p>
			<p>
				<input type="checkbox" id="send-me-copy" name="send-me-copy" value="yes-send-me-copy">
				<label for="send-me-copy">Send Copy to Your Inbox</label>
				<textarea id="to-3" type="email" name="sent-email" rows="1" cols="40" placeholder="Your Email Address"></textarea>
			<p>
				<input type="submit" value="Send Your Birthday Message!">
			</p>
			</p>
		</form>
	</section>

	<section>
		<h2>Checkbox example</h2>
		<form method="POST" action="/my_first_form.php">
			<p>What ice creams do you enjoy?
			</p>
			<p>
				<input id="choc" type="checkbox" name="choc" value="likes_chocolate">
				<label for="choc">Chocolate</label>

				<input id="str" type="checkbox" name="str" value="likes_strawberry">
				<label for="str">Strawberry</label>

				<input id="van" type="checkbox" name="van" value="likes_vanilla">
				<label for="van">Vanilla</label>
			</p>
			<p>
				<button>Submit</button>
			</p>
		</form>

		<h2>Radio example</h2>
		<form method="POST" action="/my_first_form.php">
			<h3>Multiple-Choice Test</h3>
			<p>What color is the grass?
			</p>

			<p>
				<label><input type="radio" name="q1: What color is the grass?" value="green-correct">Green
				</label>
				<label><input type="radio" name="q1: What color is the grass?" value="brown-wrong">Brown
				</label>
				<label><input type="radio" name="q1: What color is the grass?" value="red-wrong">Red
				</label>
			</p>

			<p>What sound does a cow make?
			</p>

			<p>
				<label>Moo<input type="radio" name="q2: What sound does a cow make?" value="moo-correct"></label>
				<label>Coo<input type="radio" name="q2: What sound does a cow make?" value="coo-wrong"></label>
				<label>Woo<input type="radio" name="q2: What sound does a cow make?" value="woo-wrong"></label>
			</p>
			<p>
			<input type="submit" value="Submit">
			</p>

			<p>How many inches in 1 foot?
			</p>

			<p>
				<label><input type="radio" name="q3" value="12">12</label>
				<label><input type="radio" name="q3" value="6">6</label>
				<label><input type="radio" name="q3" value="19">19</label>
			</p>
			<p>
				<button>Submit</button>
			</p>
		</form>

		<h2>Select Testing</h2>
		<form method="POST" action="/my_first_form.php">
			<label for="line-dancing">Do you enjoy line dancing?</label>
			<select id="line-dancing" name="line-dancing">
				<option value="1">Yes</option>
				<option value="0" selected>No</option>
			</select>
			<button>Submit</button>
		</form>

		<h2>Multiselect Testing</h2>
		<form method="POST" action="/my_first_form.php">
			<label for="sodas">Do you enjoy drinking any of these sodas?</label>
			<select id="sodas" name="sodas[]" multiple>
				<option value="coca">Coca-Cola</option>
				<option value="pepsi">Pepsi</option>
				<option value="sprite">Sprite</option>
				<option value="rc">RC Cola</option>
			</select>
			<button>Submit</button>
		</form>
	</section>




</body>

</html>