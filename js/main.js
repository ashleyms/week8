// function to save box qty and then send it to step 2
function saveBoxQty () {
    var boxQty = document.getElementById('box-qty').value;
    if(boxQty === "") {
        boxQty = 1;
    }
    // set box quantity selected by user in a cookie 
	cookieName = "boxQty";
    cookieValue = boxQty;
    document.cookie = cookieName + "=" + cookieValue + "; path=/;";
    
    // redirect user to step2 with the qty of boxes saved in a cookie
	window.location.href = 'shop2.php?step=2';
}

function checkCondition(items) {
    var itemMod = (items%3);
    
    if (itemMod !== 0 || items < 3){
        document.getElementById('error-msg').style.display = "block";
        return false;
    } else {
        window.location.href = 'shop2.php?step=3';
    }
}

function clearCheckout() {
    window.location.href = 'step1.php?session=clear';
}