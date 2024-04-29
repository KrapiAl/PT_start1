var count = 0;
document.getElementById("myButton").onclick = function () {
	count++;
	if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
	} else {
        var img = document.createElement("img");
        img.src = "https://www.arts.gov/sites/default/files/styles/portrait/public/images/heritage2000-manning.jpg?itok=9Q529Dhk";
        document.getElementById("demo").appendChild(img);
	}
}
