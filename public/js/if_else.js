// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'red'; // TODO: change this to your favorite color from the list


console.log(color);

// TODO: Create a block of if/else statements to check for every color except indigo and violet.


var fave = (color === 'red') ? "Red is my favorite color! " : "It\'s not my favorite color red, but ";

if (color === 'red') {
	console.log(fave + "Red is the color of roses.");
} else if (color === 'orange') {
	console.log(fave + "carrots are orange.");
} else if (color === 'yellow') {
	console.log(fave + "canaries are yellow.");
} else if (color === 'green') {
	console.log(fave + "grass is green.");
} else if (color === 'blue') {
	console.log(fave + "the ocean is blue.");
} else {
	console.log("I don\'t know anything by that color.");
}

//More specific:
/*else if (color === 'indigo') {
	console.log("Indigo? I don\'t know anything by that color.");
} else if (color === 'violet') {
	console.log("Violet? I don\'t know anything by that color.");
}*/




// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.