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

// $(document).ready(function() {
//     $('#detail-modal').on('show.bs.modal', function(e) {
//         console.log('Hello');
//         //get data-id attribute of the clicked element
//         var productId = $(e.relatedTarget).find('h3').attr('id');
 
//         cookieName = "productId";
//         cookieValue = productId;
//         document.cookie = cookieName + "=" + cookieValue + "; path=/;";
//         console.log(document.cookie);
//         //save the id
//         // $(e.currentTarget).find('input[id="product-id"]').val(productId);
//     });
// });


// $(document).on("click", ".open-AddBookDialog", function () {
//     console.log('hello');
//     var myBookId = $(this).data('id');

//     cookieName = "productId";
//         cookieValue = productId;
//         document.cookie = cookieName + "=" + cookieValue + "; path=/;";
//         console.log(document.cookie);
// });