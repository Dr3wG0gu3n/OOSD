// Pitsini (New), 6 Nov 2013, CPRG 210, Web App Development (HTML/CSS/Javascript), Assignment Day 1-6


//Day 4- assignment ==>  underline characters in the footer
	var underText = 100;
	var under = ""; 	//declare string
		
	for (var i=0;i<underText;i++) {
		under = under + '_';
	}
	document.write(under+'<br>');
//========================================================

//Day 5- assignment ==>  current date below underline text (display as running message using "marquee")
	var iDate = new Date();
	var showDate = iDate.getDate();	
	var iMonth = iDate.getMonth();
	var iYear = iDate.getFullYear(); 
	
	if (iMonth == 0) showDate = showDate + " January";
	if (iMonth == 1) showDate = showDate + " Febuary";
	if (iMonth == 2) showDate = showDate + " March";
	if (iMonth == 3) showDate = showDate + " April";
	if (iMonth == 4) showDate = showDate + " May";
	if (iMonth == 5) showDate = showDate + " June";
	if (iMonth == 6) showDate = showDate + " July";
	if (iMonth == 7) showDate = showDate + " August";
	if (iMonth == 8) showDate = showDate + " September";
	if (iMonth == 9) showDate = showDate + " October";
	if (iMonth == 10) showDate = showDate + " November";
	if (iMonth == 11) showDate = showDate + " December";	
	
	showDate = showDate + " " + iYear;
	document.write("<marquee><font color='#FF310C'>Today is " + showDate + "</font></marquee></p>");		//scrolling text using "marquee"