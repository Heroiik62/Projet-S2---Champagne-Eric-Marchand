function verify() {
    var no = Number(document.getElementById("age").value);
    if (no < 18 || Number.isNaN(no)) {
        document.getElementById("ageUnder").innerText = "Désolé, mais vous devez avoir 18 ans pour acceder a ce site web.";
    }
    else {
        $('#avertissement').modal('hide');
        localStorage.setItem('hasMajority', true);
    }
};

$(window).on('load',function(){
    localStorage.getItem('hasMajority') ?
    null :
    $('#avertissement').modal('show');
})

$('.carousel').carousel({
  interval: 3000
})

$(function() {
    	$('img').on('click', function() {
			$('.enlargeImageModalSource').attr('src', $(this).attr('src'));
			$('#enlargeImageModal').modal('show');
		});
});

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 