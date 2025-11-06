<?php
// Process manual order submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get payment details
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
    $transaction_id = '';
    $payment_proof = '';

    if ($payment_method !== 'cash-on-delivery') {
        $transaction_id = isset($_POST['transaction_id']) ? $_POST['transaction_id'] : '';
        if (isset($_FILES['payment_screenshot']) && $_FILES['payment_screenshot']['error'] === UPLOAD_ERR_OK) {
            $payment_proof = $upload_dir . 'payment_proof.' . pathinfo($_FILES['payment_screenshot']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['payment_screenshot']['tmp_name'], $payment_proof);
        }
    }

    // Get customer information
    $person_name = isset($_POST['person_name']) ? $_POST['person_name'] : '';
    $person_email = isset($_POST['person_email']) ? $_POST['person_email'] : '';
    $address_country = isset($_POST['address_country']) ? $_POST['address_country'] : '';
    $address_state = isset($_POST['address_state']) ? $_POST['address_state'] : '';
    $address_city = isset($_POST['address_city']) ? $_POST['address_city'] : '';
    $address_zipcode = isset($_POST['address_zipcode']) ? $_POST['address_zipcode'] : '';
    $address_street_house = isset($_POST['address_street_house']) ? $_POST['address_street_house'] : '';
    $card_holder = isset($_POST['card_holder']) ? $_POST['card_holder'] : '';
    $card_text = isset($_POST['card_text']) ? $_POST['card_text'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $promo_code = isset($_POST['promo_code']) ? $_POST['promo_code'] : '';

    // Get order details
    $card_color = isset($_POST['card_color']) ? $_POST['card_color'] : '';
    $card_color_cost = isset($_POST['card_color_cost']) ? $_POST['card_color_cost'] : '';
    $card_template = isset($_POST['card_template']) ? $_POST['card_template'] : '';
    $card_cost = isset($_POST['card_cost']) ? $_POST['card_cost'] : '';
    $card_shipping_method = isset($_POST['card_shipping_method']) ? $_POST['card_shipping_method'] : '';
    $card_shipping_cost = isset($_POST['card_shipping_cost']) ? $_POST['card_shipping_cost'] : '';
    $card_care = isset($_POST['card_care']) ? $_POST['card_care'] : '';
    $card_care_cost = isset($_POST['card_care_cost']) ? $_POST['card_care_cost'] : '';
    $total = isset($_POST['total']) ? $_POST['total'] : '';
    $currency = isset($_POST['currency']) ? $_POST['currency'] : '';

    // Create a unique order ID
    $order_id = 'ORD-' . strtoupper(substr(md5(uniqid()), 0, 6));

    // Handle file uploads
    $upload_dir = 'uploads/orders/' . $order_id . '/';

    // Create directory if it doesn't exist
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Save front and back card images
    $front_image = '';
    $back_image = '';
    $logo_image = '';
    $payment_proof = '';

    if (isset($_FILES['img_front']) && $_FILES['img_front']['error'] === UPLOAD_ERR_OK) {
        $front_image = $upload_dir . 'front.png';
        move_uploaded_file($_FILES['img_front']['tmp_name'], $front_image);
    }

    if (isset($_FILES['img_back']) && $_FILES['img_back']['error'] === UPLOAD_ERR_OK) {
        $back_image = $upload_dir . 'back.png';
        move_uploaded_file($_FILES['img_back']['tmp_name'], $back_image);
    }

    if (isset($_FILES['img_logo']) && $_FILES['img_logo']['error'] === UPLOAD_ERR_OK) {
        $logo_image = $upload_dir . 'logo.' . pathinfo($_FILES['img_logo']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['img_logo']['tmp_name'], $logo_image);
    }



    // Save order details to a file (in a real system, you'd use a database)
    $order_data = [
        'order_id' => $order_id,
        'order_date' => date('D, d M Y h:i A'),
        'shipping_details' => [
            'person_name' => $person_name,
            'person_email' => $person_email,
            'address' => [
                'country' => $address_country,
                'state' => $address_state,
                'city' => $address_city,
                'zipcode' => $address_zipcode,
                'street_house' => $address_street_house,
            ],
            'card_shipping_method' => $card_shipping_method,
        ],
        'order_details' => [
            'card_template' => $card_template,
            'card_color' => $card_color,
            'card_holder' => $card_holder,
            'comment' => $comment,
            'card_text' => $card_text,
            'card_care' => $card_care,
        ],
        'payment_details' => [
            'card_cost' => $card_cost,
            'card_color_cost' => $card_color_cost,
            'card_care_cost' => $card_care_cost,
            'card_shipping_cost' => $card_shipping_cost,
            'total' => $total,
            'transaction_id' => $transaction_id,
            'payment_method' => $payment_method,
            'payment_proof' => $payment_proof,
            'currency' => $currency,
            'promo_code' => $promo_code,
        ],
        'front_image' => $front_image,
        'back_image' => $back_image,
        'logo_image' => $logo_image,
    ];

    // Save order data to a JSON file
    file_put_contents($upload_dir . 'order_details.json', json_encode($order_data, JSON_PRETTY_PRINT));

    // Send email notification (in a real system, you'd implement this)
    // mail($person_email, 'Your Order Confirmation', 'Thank you for your order. Order ID: ' . $order_id);

    // Return success
    echo 'ok';
} else {
    // Not a POST request
    echo 'Invalid request method';
}
