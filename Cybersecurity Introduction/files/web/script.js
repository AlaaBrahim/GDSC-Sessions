const flagInput = document.getElementById("flagInput");
const checkFlagButton = document.getElementById("checkFlagButton");

checkFlagButton.addEventListener("click", async () => {
	const userInput = flagInput.value;

	// Generate SHA-256 hash of user input
	const encoder = new TextEncoder();
	const data = encoder.encode(userInput);
	const hashBuffer = await crypto.subtle.digest("SHA-256", data);
	const hashArray = Array.from(new Uint8Array(hashBuffer));
	const hashHex = hashArray
		.map((byte) => byte.toString(16).padStart(2, "0"))
		.join("");

	// Check if the hash matches 'GDSC{Y0u_f0und_y0ur_f1rst_fl4g!}' hash, note to self: remove this comment
	if (
		hashHex ===
		"e248689043d9761a616c73839049467e69430516c0a7791c7d6f2eba8c284aca"
	) {
		alert("Congratulations! You won!");
	} else {
		alert("Try again.");
	}
});
