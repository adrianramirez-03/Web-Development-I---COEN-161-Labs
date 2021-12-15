(function () {
	// Add the click handler for the button
	$("button").click(function()
	{
		var input = $("#myInput").val();
		$("#allUpper").text(input.toUpperCase());
		$("#allLower").text(input.toLowerCase());
		$("#redText").text(input).css("color", "red");
		$("#flashyText").text(input).addClass("flashy");
	});
})();