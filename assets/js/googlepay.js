var clientSecret = null;
$(function() {
	// apple / google pay
	function getPayButton() {	
		var stripe = Stripe("pk_live_51Hw4iYJFAQeMdV8rwLplq122ZKq8fiL6h201DZRxedJWbtdwY4CEdcW0ZOkw8oPea0qNiY2rOnnsq4HDbWgVv9Ko00CRHiB8UX");
		
		var form_data = new FormData();
		form_data.append('action', 'payment__info');
		order_info.info = true;
		form_data.append('body', JSON.stringify(order_info));
		fetch("/wp-admin/admin-ajax.php", {
			method: 'post',
			body: form_data,
		})
		.then(function(result) {
			return result.clone().json();
		})
		.then(function(data) {
			// console.log(data);
			clientSecret = data.client_secret;
			if (typeof data.error != 'undefined') {
				alert('Error starting payment: '+data.error);
			} else {
				var paymentRequest1 = stripe.paymentRequest({
					'country': data.applePayRequest.country,
					'currency': data.applePayRequest.currency,
					total: {
						label: 'Price total',
						// amount: data.applePayRequest.amount,
						amount: data.applePayRequest.amount,
					},
					requestPayerName: true,
					requestPayerEmail: true,
				});

				var elements = stripe.elements();
				var prButton = elements.create('paymentRequestButton', {
					paymentRequest: paymentRequest1,
					style: {
						paymentRequestButton: {
							type: 'buy',
							// One of 'default', 'book', 'buy', or 'donate'
							// Defaults to 'default'
							theme: 'light-outline',
							// One of 'dark', 'light', or 'light-outline'
							// Defaults to 'dark'
							height: '40px'
							// Defaults to '40px'. The width is always '100%'.
					    },
					},
				});

				// Check the availability of the Payment Request API first.
				paymentRequest1.canMakePayment().then(function(result) {
					if (result) {
						prButton.mount('#payment-request-button');
					} else {
						document.getElementById('payment-request-button').style.display = 'none';
					}
				});

				paymentRequest1.on('paymentmethod', function(ev) {
				  // Confirm the PaymentIntent without handling potential next actions (yet).
					// console.log(ev);
					// $('.message-info-block').html(ev);
					// var form_data = new FormData();
					// form_data.append('action', 'wp_ajax_payment__info');
					// order_info.info = true;

					// form_data.append('body', JSON.stringify(order_info));
					// fetch("/wp-admin/admin-ajax.php", {
					// 	method: 'post',
					// 	body: form_data,
					// })
					// .then(function(result) {
					// 	// console.log(result);
					// 	return result.clone().json();
					// })
					// .then(function(data) {
						// var clientSecret = data.client_secret;

						stripe.confirmCardPayment(
							clientSecret,
							{payment_method: ev.paymentMethod.id},
							{handleActions: false}
						)
						.then(function(confirmResult) {
							if (confirmResult.error) {
							  // Report to the browser that the payment failed, prompting it to
							  // re-show the payment interface, or show an error message and close
							  // the payment interface.
							  ev.complete('fail');
							  alert(confirmResult.error)
							} else {
							  // Report to the browser that the confirmation was successful, prompting
							  // it to close the browser payment method collection interface.
							  ev.complete('success');
							  // Check if the PaymentIntent requires any actions and if so let Stripe.js
							  // handle the flow. If using an API version older than "2019-02-11"
							  // instead check for: `paymentIntent.status === "requires_source_action"`.
								if (confirmResult.paymentIntent.status === "requires_action") {
							    // Let Stripe.js handle the rest of the payment flow.
								    stripe.confirmCardPayment(clientSecret).then(function(result) {
								      if (result.error) {
								      	alert(result.error)
								        // The payment failed -- ask your customer for a new payment method.
								      } else {
								        // The payment has succeeded.
								      	// alert('success1')

								        // orderComplete(confirmResult.paymentIntent.id);
							    		order_create_ajax(confirmResult.paymentIntent.id);
								      }
								    });
							  	} else {
								      	// alert('success2')

							    	// The payment has succeeded.
							    	// orderComplete(confirmResult.paymentIntent.id);
							    	order_create_ajax(confirmResult.paymentIntent.id);
							  	}
							}
						});
					});
				// });
			}
		})
	}

	var countryStripe = [
  {country: 'Australia', code: 'AU'},
  {country: 'Austria', code: 'AT'},
  {country: 'Belgium', code: 'BE'},
  {country: 'Bulgaria', code: 'BG'},
  {country: 'Brazil ', code: 'BR'},
  {country: 'Canada', code: 'CA'},
  {country: 'Cyprus', code: 'CY'},
  {country: 'Czech Republic', code: 'CZ'},
  {country: 'Denmark', code: 'DK'},
  {country: 'Estonia', code: 'EE'},
  {country: 'Finland', code: 'FI'},
  {country: 'France', code: 'FR'},
  {country: 'Germany', code: 'DE'},
  {country: 'Greece', code: 'GR'},
  {country: 'Hong Kong', code: 'HK'},
  {country: 'Hungary', code: 'HU'},
  {country: 'India', code: 'IN'},
  {country: 'Ireland', code: 'IE'},
  {country: 'Italy', code: 'IT'},
  {country: 'Japan', code: 'JP'},
  {country: 'Latvia', code: 'LV'},
  {country: 'Lithuania', code: 'LT'},
  {country: 'Luxembourg', code: 'LU'},
  {country: 'Malaysia', code: 'MY'},
  {country: 'Malta', code: 'MT'},
  {country: 'Mexico ', code: 'MX'},
  {country: 'Netherlands', code: 'NL'},
  {country: 'New Zealand', code: 'NZ'},
  {country: 'Norway', code: 'NO'},
  {country: 'Poland', code: 'PL'},
  {country: 'Portugal', code: 'PT'},
  {country: 'Romania', code: 'RO'},
  {country: 'Singapore', code: 'SG'},
  {country: 'Slovakia', code: 'SK'},
  {country: 'Slovenia', code: 'SI'},
  {country: 'Spain', code: 'ES'},
  {country: 'Sweden', code: 'SE'},
  {country: 'Switzerland', code: 'CH'},
  {country: 'United Kingdom', code: 'GB'},
  {country: 'United States', code: 'US'}
]
function isAnyValueIn(target, values) {
    for (var i = 0; i < values.length; i++) {
        if (target.indexOf(values[i].code) > -1) {
            return true;
        }
    }
    return false;
}


	$('.final_step-applepay').click(function() {

		var countrySelect = $('select[name="order_address_country"]').val();

		if(isAnyValueIn(countrySelect, countryStripe)) {
			getPayButton()
		}
	})
});