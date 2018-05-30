// function to save box qty and then send it to step 2
function saveBoxQty() {
    var boxQty = document.getElementById('box-qty').value;
    if (boxQty === "") {
        boxQty = 1;
    }
    // set box quantity selected by user in a cookie
    cookieName = "boxQty";
    cookieValue = boxQty;
    document.cookie = cookieName + "=" + cookieValue + "; path=/;";

    // redirect user to step2 with the qty of boxes saved in a cookie
    window.location.href = 'shop2.php?step=2&id=Shop';
}

// to check the total qty in cart before checkout
function checkCondition(items) {
    var itemMod = (items % 3);
    if (itemMod !== 0 || items < 3) {
        // & display error if necessary
        if (document.getElementById('error-msg') !== null) {
            document.getElementById('error-msg').style.display = "block";
        }
        document.getElementById('err-msg').style.display = "block";
        return false;
    } else {
        // & redirect to checkout if conditions are met
        window.location.href = 'shop2.php?step=3&id=Shop';
    }
}

// to cleaar the session and redirect to step1
function clearCheckout() {
    window.location.href = 'step1.php?session=clear&id=Shop';
}

// shopping cart summary window
$(document).ready(function() {
    $('#cart').mouseover(function() {
        $('#cart-summary').css("display", "block");
    });
    $('#close-btn').on("click", function() {
        $('#cart-summary').css("display", "none");
    });
});

// reduce the height of header on scroll
$(document).on("scroll", function() {
    if ($(document).scrollTop() > 200) {
        // $("header").addClass("shrink");
        $('header .main-logo').css({
            "width": "45px",
            "right": "auto",
            "left": "2%"
        });
        $('header .main-nav').css({
            "margin-top": "10px"
        });
    } else {
        $('header .main-logo').css({
            "width": "85px",
            "right": "0",
            "left": "0"
        });
        $('header .main-nav').css({
            "margin-top": "90px"
        });
    }
});
