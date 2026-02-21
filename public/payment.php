<?php
require_once( "inc/config.php" );
require_once( "inc/search.php" );
?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once("inc/path.php"); ?>
	<title>IIARD | Make Payment - International Institute of Academic Research and development </title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="Description" content="IIARD Publications is an independent institution in Africa. It focuses on the developmental issues of the continent, by providing a medium for interaction between researchers in the academic community. Its main purpose is to foster the relationship between researchers and to create an enabling environment for contributors and academicians to share ideas that relates to developmental issues.">
	<meta name="keyword" content="iiardpub, iiard, research, publication, 'publications', publications, journal, journals, institute, 'publication company', 'online publication', 'academic research and development', 'international institute',iiardpublication, 'academic research', 'international journals', 'international publications', 'international journal','international publication'">
	<script type="application/x-javascript">
		addEventListener( "load", function () {
			setTimeout( hideURLbar, 0 );
		}, false );

		function hideURLbar() {
			window.scrollTo( 0, 1 );
		}
	</script>
	<!--//for-mobile-apps -->
	<!--Custom Theme files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!--//Custom Theme files -->
	<!--js-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<!--//js-->
	<!--cart-->
	<script src="js/simpleCart.min.js"></script>
	<!--cart-->
	<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
	<!--web-fonts-->
	<!--animation-effect-->
	<link href="css/animate.min.css" rel="stylesheet">
	<script src="js/wow.min.js"></script>

	<?php include_once("inc/marquee.php"); ?>

	<script>
		new WOW().init();
	</script>
	<!--//animation-effect-->
	<!--start-smooth-scrolling-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery( document ).ready( function ( $ ) {
			$( ".scroll" ).click( function ( event ) {
				event.preventDefault();
				$( 'html,body' ).animate( {
					scrollTop: $( this.hash ).offset().top
				}, 1000 );
			} );
		} );
	</script>
	<!--//end-smooth-scrolling-->
</head>

<body>
	<!--header-->
	<?php include_once("inc/header.php"); ?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
				</li>
				<li class="active">Make Payment</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--Short codes-->
	<div class="codes">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="text-align:left;"></div>
			<h3 class="title" style="margin-top:-40px;">Payment<span> Process</span></h3>
			<hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
			<p style="text-align:justify">IIARD charges a minimal amount as publication fee to cover operational cost. Such as: peer-review, hard copy production and distribution, website maintenance, Staffing and editorial expenses. There is a variety of payment options listed below. </p>

			<hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">

			<div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s">

				<div class="row wow fadeInDown animated" data-wow-delay=".5s" style="border: 1px solid #ddd; padding: 16px">
					
					<form role="form" method="post" action="" enctype="multipart/form-data" name="submit" id="submit">

						<p>
							<h4>1. BY BANK WIRE TRANSFER:</h4>
						</p>
						<p style="text-align:justify">All payments should be made into the Company's registered account name (IIARD Publication Company). We will never ask you to pay into a personal account or through a third party’s account. The payment details will be sent to you after the acceptance of your paper.<br/>
						</p>
						<p style="text-align:justify">&nbsp;</p>
						<!--
						<h3 style="font-size:15px">United State Dollar (USD)</h3>
						<p>Correspondent Bank Name: CITIBANK,NEW YORK</p>
						<p>SwiftCode: CITIUS33</p>
						<p>ABA No: 021000089</p>
						<p>Correspondent Bank Address: GUARANTY TRUST BANK PLC, LAGOS NIGERIA</p>
						<p>SwiftCode: GTBINGLA</p>
						<p>Beneficiary Name: IIARD PUBLICATION CO</p>
						<p>Beneficiary Account Number: 0170796308</p>
						<p>Amount/CurrencyType: United State Dollar(USD)</p>
						<p>&nbsp;</p>
						
						<h4> 2.   THROUGH OUR SECURE ONLINE PAYMENT GATEWAY </h4>
						<p>Our online payment is secure and convenient. We accept Visa Card only.</p>
						<p>Steps to make online payment:</p>
						<p>&nbsp;</p>

						<p>&bull; Click on the payment tab </p>
						<p>&bull; Choose the number of articles you want to submit and amount</p>
						<p> &bull; Click on make payment and page proceed to Payza secure payment page </p>
						<p> &bull; Login or Signup to proceed with payment</p>
						<p>&nbsp;</p>
						-->
						<h4> 2.	BY WESTERN UNION OR MONEY GRAM</h4>
						<p style="text-align:justify">Please contact the editorial office to obtain the payment details of the recipient. Please email a copy of the bank teller, receipt, or payment code to editor@iiardjournals.org for payment confirmation after a successful payment.</p>

						<br>
						<h4>3. BY WORLD REMIT</h4>
						<p style="text-align:justify">World remit is the fastest payment option we’ve witness so far. It is our most preferred payment option. You can visit <a href="https://www.worldremit.com">worldremit.com</a> to send,
Please contact the editorial office to obtain the payment details of the recipient. After successful payment, kindly email a copy of the teller, receipt, or payment code to editor@iiardjournals.org for payment confirmation.
</p>
<br>
						<h4> 4.	BY BITCOIN</h4>
						<p style="text-align:justify">Please contact the editorial office to obtain the bitcoin address. After successful transfer, please email transfer receipt or payment code to editor@iiardjournals.org for payment confirmation</p>
						
						<hr class="bs-docs-separator wow fadeInDown animated" data-wow-delay=".5s">
						<!--
						<h4>REFUND POLICY</h4>
						<p style="text-align:justify">If payment was mistakenly paid twice, we shall refund you through bank transfer. Bank charges shall be made by the author. Please discuss this issue to <code>editor@iiardpub.org</code>.<br> However, we will not make any refund if an article has already been publish online. </p>
						<p>&nbsp;</p>
						-->
						<!--
							<p style="text-align:justify"><code>Please Note:</code> All payments should be made into the company's registered account name <strong>IIARD Publication Company</strong>. We will never ask you to pay into a personal account or through a third party’s account.</p>
						-->

					</form>
				</div>
			</div>

			  <!-- payment div // -->
			<div class="col-md-6 wow fadeInLeft animated" data-wow-delay=".5s">
				<div id="smart-button-container">

    <!--  <div style="text-align: center;">
       <div style="margin-bottom: 1.25rem;">
          <p>Article Publication Charge (APC)</p>
          <select id="item-options"><option value="Online Only" price="50">Online Only - 50 USD</option><option value="Online and Print" price="70">Online and Print - 70 USD</option><option value="Additional Hard Copy" price="20">Additional Hard Copy - 20 USD</option></select>
          <select style="visibility: hidden" id="quantitySelect"></select>
        </div> -->
		
<!--paystack form integration START-->
<h2 style="text-align: center; color:red;">Secure Online Payment</h2>
 <button id="paystack_button" style="background:#bdc7c9; width:100%; height:40px; margin:10px;  padding-left:30%; border:none; border-radius:30px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(10.5px); -webkit-backdrop-filter: blur(10.5px); border: 1px solid rgba(255, 255, 255, 0.65);">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 50 2013.12 141.26"><rect fill="#2a3362" x="328.78" y="82.1" width="16.11" height="82.89"></rect> <path fill="#2a3362" d="M407.24,135.58c0,11.44-7.36,16.58-17.16,16.58s-16.35-5.14-16.35-16V106.62H357.62V139.9c0,16.57,10.39,26.26,27.67,26.26,10.86,0,16.93-4,21-8.52h.94l1.4,7.36h14.82V106.62H407.24Z"></path> <path fill="#2a3362" d="M565.27,153.44c-11.79,0-18.44-5.37-19.49-13.19h51.13a33.78,33.78,0,0,0,.35-4.91c-.11-21-16-29.89-33-29.89-19.73,0-34.56,11.8-34.56,30.83,0,18.09,14.25,29.88,35.61,29.88,17.87,0,29.77-7.93,32.23-20.08H581.62C579.63,150.87,573.91,153.44,565.27,153.44Zm-1-35.26c10.28,0,16.23,4.55,17.17,11H546.13C547.64,123,553.6,118.18,564.22,118.18Z"></path> <path fill="#2a3362" d="M624.63,115h-1l-1.52-8.41H607.47V165h16.11V139.9c0-11.33,6.53-17.63,18.68-17.63a32.5,32.5,0,0,1,6.58.58V106.62h-2.25C635.85,106.62,629.18,108.84,624.63,115Z"></path> <polygon fill="#2a3362" points="727.94 146.78 727.01 146.78 713.23 110.24 696.65 110.24 683.11 146.67 682.06 146.67 669.22 106.62 653.22 106.62 672.95 165 690.47 165 704.48 127.75 705.41 127.75 719.19 165 736.82 165 756.55 106.62 740.55 106.62 727.94 146.78"></polygon> <path fill="#2a3362" d="M820.67,148V128.46c0-15.88-13.43-23-30.13-23-17.74,0-28.83,8.41-30.35,21H776.3c1.17-5.49,5.84-8.52,14.24-8.52s14,3.15,14,9.57V129l-26.27,2c-12.14.94-21,6.31-21,17.75,0,11.79,10.16,17.39,25.1,17.39,12.06,0,19.41-3.36,23.91-8.43h.8c2.53,5.7,7.66,7.27,13.24,7.27h6.77V153.09h-1.52C822.18,153.09,820.67,151.46,820.67,148Zm-16.12-6.19c0,9.23-11,12.26-20.43,12.26-6.42,0-10.62-1.63-10.62-6.07,0-4,3.62-5.95,9-6.42l22.06-1.63Z"></path> <polygon fill="#2a3362" points="880.23 106.62 861.43 148.89 860.38 148.89 841.35 106.62 823.95 106.62 851.15 165 870.42 165 897.5 106.62 880.23 106.62"></polygon> <path fill="#2a3362" d="M949,146.08c-2,4.79-7.71,7.36-16.35,7.36-11.79,0-18.44-5.37-19.49-13.19h51.13a33.78,33.78,0,0,0,.35-4.91c-.11-21-16-29.89-33-29.89-19.73,0-34.55,11.8-34.55,30.83,0,18.09,14.24,29.88,35.6,29.88,17.87,0,29.77-7.93,32.23-20.08Zm-17.4-27.9c10.28,0,16.23,4.55,17.17,11H913.47C915,123,920.94,118.18,931.56,118.18Z"></path> <path fill="#2a3362" d="M302.6,102.32c0-5.14,3.62-7.35,8.29-7.35a24.17,24.17,0,0,1,6.42.93L320,84.22a36.71,36.71,0,0,0-12.14-2.1c-11.91,0-21.48,6.31-21.48,19.38v5.12h-13.9v12.79h13.9V165H302.6v-45.6h18.16V106.62H302.6Z"></path> <path fill="#2a3362" d="M459,90.16H444l-.84,16.46H430.48v12.79h12.38v28.78c0,9.8,5,18,20,18a52.84,52.84,0,0,0,11.56-1.28V152.62a34.29,34.29,0,0,1-6.66.82c-8.05,0-8.75-4.55-8.75-8.06v-26h16V106.62H459Z"></path> <path fill="#2a3362" d="M509.59,90.16H494.64l-.84,16.46H481.09v12.79h12.38v28.78c0,9.8,5,18,20,18A52.84,52.84,0,0,0,525,164.88V152.62a34.29,34.29,0,0,1-6.66.82c-8.05,0-8.75-4.55-8.75-8.06v-26h16.05V106.62H509.59Z"></path> <path fill="#009a46" d="M48.23,79.89c0-9.37,2.74-17.37,8.49-23.12l10,10C55.59,77.86,65.31,112.34,97,144.06s66.19,41.43,77.31,30.32l10,10c-18.76,18.76-61.49,5.45-97.26-30.33C62.24,129.23,48.23,101.07,48.23,79.89Z"></path> <path fill="#ff5805" d="M111.29,193c-9.37,0-17.37-2.74-23.13-8.49l10-10c11.11,11.11,45.59,1.39,77.31-30.32S216.89,78,205.78,66.89l10-10c18.77,18.76,5.45,61.49-30.33,97.26C160.63,179,132.47,193,111.29,193Z"></path> <path fill="#f5afcb" d="M188.76,139.84c-6.07-17.48-18.47-36.16-34.92-52.6-35.77-35.78-78.5-49.1-97.26-30.33h0c-1.33,1.34-.18,4.65,2.58,7.41s6.07,3.9,7.4,2.57c11.12-11.11,45.6-1.39,77.31,30.33,15,15,26.18,31.75,31.57,47.25,4.72,13.59,4.26,24.55-1.24,30.05h0c-1.34,1.33-.18,4.65,2.57,7.4s6.07,3.91,7.41,2.57C193.79,174.88,195.42,159,188.76,139.84Z"></path> <path fill="#ff9b00" d="M215.76,56.91c-9.63-9.63-25.49-11.26-44.67-4.59-17.47,6.06-36.16,18.47-52.6,34.91C82.72,123,69.4,165.73,88.16,184.5h0c1.34,1.33,4.65.18,7.41-2.57s3.91-6.07,2.57-7.41C87,163.41,96.75,128.93,128.47,97.21c15-15,31.75-26.18,47.25-31.57,13.59-4.71,24.55-4.26,30.06,1.24h0c1.33,1.33,4.65.18,7.4-2.58S217.09,58.24,215.76,56.91Z"></path></svg>
 </button>



		<form id="paymentForm" method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay" style="padding:20px; border-radius:30px; background: rgba(255, 255, 255, 0.51); box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(10.5px); -webkit-backdrop-filter: blur(10.5px); border: 1px solid rgba(255, 255, 255, 0.65);">

  <input type="hidden" name="public_key" value="FLWPUBK-385aa75f4bef8bc809b93ab4595f786c-X" />


	<div class="form-group" style="text-align: center;">

    <label for="first-name">First Name :</label>

    <input type="text" id="first-name" name="customer[name]"/>

  </div>

 <div class="form-group" style="text-align: center;">

    <label for="last-name">Last Name :</label>

    <input type="text" id="last-name"  name="tx_ref"/>

  </div>

  <div class="form-group" style="text-align: center;">

    <label for="email">E-mail :</label>

    <input type="email" id="email-address" name="customer[email]" required />

  </div>

  <div class="form-group" style="text-align: center;">

    <label for="amount" >Amount :</label>

<select id="amount" name="amount" required><option value="25" price="25">Online Only - 20 USD</option><option value="custom">Input Amount</option></select>
    <input style="margin:10px; display:none;" type="tel" id="amount"/> 
  </div>

  <input type="hidden" name="currency" value="USD" />
  <input type="hidden" name="meta[token]" value="54" />
  <input type="hidden" name="redirect_url" value="https://iiardjournals.org/payment/" />


  <div class="form-submit" style="text-align: center;">
    <button type="submit" style="background:#eb713d; width:80%; height:40px; color:#fff; font-size:20px; font-weight:600; margin:3px; padding:4px; border:none; border-radius:15px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(10.5px); -webkit-backdrop-filter: blur(10.5px); border: 1px solid rgba(255, 255, 255, 0.65);" > 
Proceed Payment	
<img src="https://upload.wikimedia.org/wikipedia/commons/f/f3/Credit_card.svg" alt="" width="30" height="30"> 
</button>
  </div>

<div style="text-align:right;"> 
 <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="" width="50" height="60"> 
  <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="" width="50" height="60"> 
    <img src="https://upload.wikimedia.org/wikipedia/commons/3/37/Encrypt_icon.svg" alt="" width="140" height="60"> 

</div>

</form>

 <!-- FLUTTERWAVE PAYMENT METHOD ENABLED _START_ -->
<script>

const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});

let value = params.status; // "?some_value"
console.log(value);
</script>


<script> 

let forms = document.getElementById("paymentForm");
forms.style.background = "none";
forms.style.display = "block";

const paystack_button = document.getElementById('paystack_button');

paystack_button.addEventListener('click', () => {
  const form = document.getElementById('paymentForm');

  if (form.style.display === 'none') {
    // 👇️ this SHOWS the form
    form.style.display = 'block';
	
  } else {
    // 👇️ this HIDES the form
    form.style.display = 'none';
  }
});

$(document).ready( () => {
	$("#amount").change(function () {
  var selected_option = $("#amount option:selected").val();
  if(selected_option == "custom")
  $("input#amount").show();
 else
    $("input#amount").hide();
  
});
});



</script>

 
      </div>
    </div>
  


  <!-- PAYPAL PAYMENT METHOD DISABLED _START_ 
    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  
   <script>
     function initPayPalButton() {
        var shipping = 0;
        var itemOptions = document.querySelector("#smart-button-container #item-options");
    var quantity = parseInt();
    var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");
    if (!isNaN(quantity)) {
      quantitySelect.style.visibility = "visible";
    }
    var orderDescription = 'Article Publication Charge (APC)';
    if(orderDescription === '') {
      orderDescription = 'Item';
    }
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'gold',
        layout: 'vertical',
        label: 'paypal',
        
      },
      createOrder: function(data, actions) {
        var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
        var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex].getAttribute("price"));
        var tax = (0 === 0 || false) ? 0 : (selectedItemPrice * (parseFloat(0)/100));
        if(quantitySelect.options.length > 0) {
          quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
        } else {
          quantity = 1;
        }

        tax *= quantity;
        tax = Math.round(tax * 100) / 100;
        var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
        priceTotal = Math.round(priceTotal * 100) / 100;
        var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

        return actions.order.create({
          purchase_units: [{
            description: orderDescription,
            amount: {
              currency_code: 'USD',
              value: priceTotal,
              breakdown: {
                item_total: {
                  currency_code: 'USD',
                  value: itemTotalValue,
                },
                shipping: {
                  currency_code: 'USD',
                  value: shipping,
                },
                tax_total: {
                  currency_code: 'USD',
                  value: tax,
                }
              }
            },
            items: [{
              name: selectedItemDescription,
              unit_amount: {
                currency_code: 'USD',
                value: selectedItemPrice,
              },
              quantity: quantity
            }]
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
          
          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

          // Show a success message within this page, e.g.
          const element = document.getElementById('paypal-button-container');
          element.innerHTML = '';
          element.innerHTML = '<h3>Thank you for your payment!</h3>';

          // Or go to another URL:  actions.redirect('thank_you.html');

        });
      },
      onError: function(err) {
        console.log(err);
      },
    }).render('#paypal-button-container');
  }
  initPayPalButton();
    </script> PAYPAL PAYMENT METHOD DISABLED _END_ -->
				
			</div>
			
			<!-- -->

			<div class="col-md-6 wow fadeInLeft animated" data-wow-delay=".5s">

				<!--
				<table class="table table-bordered">
					<tbody>

						<tr>
							<td>
								<!--
                               <h1>Bitcoin Accepted</h1>
                                <p>Please select the plan and pay</p>
                                <p>&nbsp;</p>
								end of original comment  
								<img src="images/bitcoin.png" class="img-responsive">
								<br>

								
									<label>Please Select Your payment Option</label>
									<select id="btc_sel" class="form-control" onchange="getPrice(this)">
									<option disabled selected value="0">--Select--</option>
										<option data-desc="Online and Print Article" value="70">USD 70.00 - Online and Print Article</option>
										<option data-desc="One Online Article Only" value="50">USD 50.00 - One Article Online Only</option>
										<option data-desc="Payment For Article" value="40">USD 40.00 - Payment For Article</option>
										<option data-desc="One Hard Copy Only" value="20">USD 20.00 - One Hard Copy Only</option>

									</select>
									<hr>
									<img class="img-responsive" id="loader" src="images/loader.gif" width="100" height="100" style="margin-left: auto; margin-right: auto">
									<div id="BTC">
									
										<h4>Please make a transfer of <code id="amount"></code>BTC to <code>1PwvpTqMY83FCnbt4tVkHvjcofE4YR9YYe</code> to complete this transaction.</h4>
                          				<br>
                           				<p>Payment for <span id="desc"></span></p>
                           		</div>
									
							</td>

						</tr>

					</tbody>
				</table>
				-->
			</div>

		</div>
	</div>
	<!--//short-codes-->
	<!--footer-->
	<?php include_once("inc/footer.php"); ?>
	<!--//footer-->
	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	
	
	<!-- 
	<script>

function togglePayAmount(){
	var option = $("#sel").find('option:selected').attr("id");
	if (option === "pay_amount_option"){
		$("#pay_amount").fadeIn(500);
		return;
	}
	$("#pay_amount").fadeOut(500);
}

function getPrice(selectObject) {
	$("#loader").show();
  $("#BTC").fadeOut(500);
  var price = selectObject.value; 
	var desc = $("#btc_sel").find('option:selected').data('desc');
	
  var url= 'https://blockchain.info/tobtc?currency=USD&value='+ price;
	
	$.ajax({
    method: "GET",
    url: url,
    success: function(result) {
		$("#amount").text(result);
    	$("#desc").text(desc);
		$("#BTC").fadeIn(500);
		$("#loader").hide();
   },
   error: function(result) {
     alert('Oops!, Please try again later!');
   }
 });
}
</script>
	<script type="text/javascript">
		$( document ).ready( function () {
			$("#pay_amount").hide();
			$("#loader").hide();
			$("#BTC").hide();
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};

			$().UItoTop( {
				easingType: 'easeOutQuart'
			} );

		} );
	</script> -->
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
	<!--Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>

<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="iiardModalLabel">Transaction..</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

</body>

</html>