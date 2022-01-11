


$(document).ready(function(){
	$("#cmd").click(function(){

		html2canvas(document.body).then(function(canvas) {
			
			var doc = new jsPDF("p","mm","a4");
			var img = canvas.toDataURL('image/png',10.0);
			img.width = 200;
			doc.addImage(img, 'JPEG', 0, 0,362.25,189);
			doc.save('test.pdf');
		});

	});
});