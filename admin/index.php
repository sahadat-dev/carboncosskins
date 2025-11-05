<?php
session_start();

// Simple authentication
$admin_username = "admin";
$admin_password = "admin123"; // In production, use a secure hashed password

// Check if user is logged in
$is_logged_in = isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;

// Handle login form submission
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        $is_logged_in = true;
    } else {
        $login_error = "Invalid username or password";
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

// Function to get all orders
function getOrders()
{
    $orders = [];
    $orders_dir = "../uploads/orders/";

    if (is_dir($orders_dir)) {
        $order_folders = scandir($orders_dir);

        foreach ($order_folders as $folder) {
            if ($folder === '.' || $folder === '..') continue;

            $order_path = $orders_dir . $folder . "/order_details.json";
            if (file_exists($order_path)) {
                $order_data = json_decode(file_get_contents($order_path), true);
                if (!isset($order_data['order_id'])) {
                    $order_data['order_id'] = $folder;
                }
                $orders[] = $order_data;
            }
        }
    }

    // Sort orders by date (newest first)
    usort($orders, function ($a, $b) {
        $date_a = $a['order_date'] ?? $a['date'] ?? 0;
        $date_b = $b['order_date'] ?? $b['date'] ?? 0;
        return strtotime($date_b) - strtotime($date_a);
    });

    return $orders;
}

// Get order details
function getOrderDetails($order_id)
{
    $order_path = "../uploads/orders/" . $order_id . "/order_details.json";
    if (file_exists($order_path)) {
        return json_decode(file_get_contents($order_path), true);
    }
    return null;
}

// Handle order status update
if ($is_logged_in && isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'] ?? '';
    $new_status = $_POST['status'] ?? '';

    if ($order_id && $new_status) {
        $order_path = "../uploads/orders/" . $order_id . "/order.json";
        if (file_exists($order_path)) {
            $order_data = json_decode(file_get_contents($order_path), true);
            $order_data['status'] = $new_status;
            file_put_contents($order_path, json_encode($order_data, JSON_PRETTY_PRINT));
        }
    }
}

// Get order details if viewing a specific order
$current_order = null;
if ($is_logged_in && isset($_GET['order_id'])) {
    $current_order = getOrderDetails($_GET['order_id']);
}

// Get all orders if logged in
$orders = $is_logged_in ? getOrders() : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Co Skins - Admin</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .admin-login {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table th,
        .admin-table td {
            padding: 10px;
            border: 1px solid #454545;
            text-align: left;
        }

        .admin-table th {
            background-color: #ffffff;
            font-weight: bold;
            color: #333;
        }

        .admin-table tr:hover {
            background-color:rgb(143, 143, 143);

        }

        .status-pending {
            color: orange;
            font-weight: bold;
        }

        .status-completed {
            color: green;
            font-weight: bold;
        }

        .status-rejected {
            color: red;
            font-weight: bold;
        }

        .order-details {
            margin-top: 30px;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .invoice-id {
            font-size: 16px;
            color: #666;
        }

        .invoice-date {
            text-align: right;
            color: #666;
        }

        .invoice-date strong {
            font-weight: bold;
            color: #333;
        }

        .invoice-section {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .invoice-section h3 {
            margin-bottom: 15px;
            color: #333;
            font-size: 18px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 8px;
        }

        .invoice-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .invoice-item {
            margin-bottom: 10px;
        }

        .invoice-item-label {
            font-weight: bold;
            /* display: block; */
            margin-bottom: 5px;
            color: #555;
        }

        .invoice-item-value {
            /* display: block; */
            color: #333;
        }

        .invoice-total {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: right;
        }

        .invoice-total-amount {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .order-images {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .order-image {
            max-width: 200px;
            border: 1px solid #ddd;
            padding: 5px;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .order-image img {
            max-width: 100%;
        }

        .order-image h4 {
            margin: 5px 0;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .back-link {
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
            font-size: 16px;
        }

        .form-group input,
        .form-group select {
            width: 70%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: #333;
            font-size: 16px;
            display: inline-block;
            margin-top: 10px;
        }

        .form-group input,
        .form-group .btn {
            padding: 15px 20px;
            background-color: #333;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }

        .form-group .btn:hover {
            background-color: #555;
        }

        .status-form {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="admin-container">
        <?php if (!$is_logged_in): ?>
            <!-- Login Form -->
            <div class="admin-login">
                <h2>Admin Login</h2>
                <?php if (isset($login_error)): ?>
                    <div style="color: red; margin-bottom: 15px;"><?php echo $login_error; ?></div>
                <?php endif; ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" name="login" class="btn">Login</button>
                </form>
            </div>
        <?php else: ?>
            <!-- Admin Dashboard -->
            <div class="admin-header">
                <h1>Order Management</h1>
                <a href="?logout=1" class="btn">Logout</a>
            </div>

            <?php if ($current_order): ?>
                <!-- Order Details View -->
                <a href="admin" class="back-link">&larr; Back to Orders</a>

                <div class="order-details">
                    <div class="invoice-header">
                        <div>
                            <div class="invoice-title">Order Invoice</div>
                            <div class="invoice-id">Order ID: <?php echo $current_order['order_id']; ?></div>
                        </div>
                        <div class="invoice-date">
                            <div><strong>Date:</strong> <?php echo $current_order['order_date'] ?? $current_order['date'] ?? 'N/A'; ?></div>
                            <div><strong>Status:</strong> <span class="status-<?php echo strtolower($current_order['status'] ?? 'pending'); ?>"><?php echo $current_order['status'] ?? 'Pending'; ?></span></div>
                        </div>
                    </div>

                    <div class="status-form">
                        <form method="post" action="">
                            <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>">
                            <div class="form-group">
                                <label for="status">Update Order Status:</label>
                                <select id="status" name="status">
                                    <option value="pending" <?php echo ($current_order['status'] ?? 'pending') === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="processing" <?php echo ($current_order['status'] ?? '') === 'processing' ? 'selected' : ''; ?>>Processing</option>
                                    <option value="completed" <?php echo ($current_order['status'] ?? '') === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                    <option value="rejected" <?php echo ($current_order['status'] ?? '') === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                </select>
                                <button type="submit" name="update_status" class="btn">Update Status</button>
                            </div>

                        </form>
                    </div>

                    <div class="invoice-grid">
                        <div class="invoice-section">
                            <h3>Shipping Information</h3>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Name:</span>
                                <span class="invoice-item-value"><?php echo $current_order['person_name'] ?? 'N/A'; ?></span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Email:</span>
                                <span class="invoice-item-value"><?php echo $current_order['person_email'] ?? 'N/A'; ?></span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Address:</span>
                                <span class="invoice-item-value">
                                    <?php
                                    if (isset($current_order['address']) && is_array($current_order['address'])) {
                                        $address_parts = [];
                                        if (!empty($current_order['address']['street_house'])) $address_parts[] = $current_order['address']['street_house'];
                                        if (!empty($current_order['address']['city'])) $address_parts[] = $current_order['address']['city'];
                                        if (!empty($current_order['address']['state'])) $address_parts[] = $current_order['address']['state'];
                                        if (!empty($current_order['address']['zipcode'])) $address_parts[] = $current_order['address']['zipcode'];
                                        if (!empty($current_order['address']['country'])) $address_parts[] = $current_order['address']['country'];
                                        echo implode(', ', $address_parts) ?: 'N/A';
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>

                        <div class="invoice-section">
                            <h3>Card Information</h3>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Card Color:</span>
                                <span class="invoice-item-value"><?php echo isset($current_order['order_details']['card_color']) ? $current_order['order_details']['card_color'] : ($current_order['card_color'] ?? 'N/A'); ?></span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Card Template:</span>
                                <span class="invoice-item-value"><?php echo isset($current_order['order_details']['card_template']) ? $current_order['order_details']['card_template'] : ($current_order['card_template'] ?? 'N/A'); ?></span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Card Holder Name:</span>
                                <span class="invoice-item-value"><?php echo $current_order['card_holder'] ?? 'N/A'; ?></span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Card Text:</span>
                                <span class="invoice-item-value"><?php echo $current_order['card_text'] ?? 'N/A'; ?></span>
                            </div>
                            <?php if (!empty($current_order['card_care'])): ?>
                                <div class="invoice-item">
                                    <span class="invoice-item-label">Card Care:</span>
                                    <span class="invoice-item-value"><?php echo $current_order['card_care'] ? 'Yes' : 'No'; ?></span>
                                </div>
                                <div class="invoice-item">
                                    <span class="invoice-item-label">Card Care Fee:</span>
                                    <span class="invoice-item-value"><?php echo ($current_order['currency'] ?? '') . ' ' . ($current_order['card_care_fee'] ?? 'N/A'); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="invoice-grid">
                        <div class="invoice-section">
                            <h3>Shipping Information</h3>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Shipping Method:</span>
                                <span class="invoice-item-value"><?php echo isset($current_order['order_details']['shipping']) ? $current_order['order_details']['shipping'] : ($current_order['shipping'] ?? 'N/A'); ?></span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Shipping Fee:</span>
                                <span class="invoice-item-value"><?php echo isset($current_order['order_details']['currency']) ? $current_order['order_details']['currency'] : ($current_order['currency'] ?? '') . ' ' . ($current_order['shipping_fee'] ?? 'N/A'); ?></span>
                            </div>
                        </div>

                        <div class="invoice-section">
                            <h3>Payment Information</h3>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Payment Method:</span>
                                <span class="invoice-item-value"><?php echo $current_order['payment_method'] ?? 'N/A'; ?></span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Transaction ID:</span>
                                <span class="invoice-item-value"><?php echo $current_order['transaction_id'] ?? 'N/A'; ?></span>
                            </div>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Production Fee:</span>
                                <span class="invoice-item-value"><?php echo isset($current_order['order_details']['currency']) ? $current_order['order_details']['currency'] : ($current_order['currency'] ?? '') . ' ' . ($current_order['production_fee'] ?? 'N/A'); ?></span>
                            </div>
                            <?php if (!empty($current_order['promo_code']) || !empty($current_order['coupon'])): ?>
                                <div class="invoice-item">
                                    <span class="invoice-item-label">Coupon Code:</span>
                                    <span class="invoice-item-value"><?php echo $current_order['promo_code'] ?? $current_order['coupon'] ?? 'N/A'; ?></span>
                                </div>
                                <div class="invoice-item">
                                    <span class="invoice-item-label">Discount:</span>
                                    <span class="invoice-item-value"><?php echo isset($current_order['order_details']['currency']) ? $current_order['order_details']['currency'] : ($current_order['currency'] ?? '') . ' ' . ($current_order['discount'] ?? 'N/A'); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="invoice-total">
                        <div class="invoice-item">
                            <span class="invoice-item-label">Total Amount:</span>
                            <span class="invoice-total-amount">
                                <?php
                                $currency = isset($current_order['order_details']['currency']) ? $current_order['order_details']['currency'] : ($current_order['currency'] ?? 'USD');
                                $total = isset($current_order['order_details']['total']) ? $current_order['order_details']['total'] : ($current_order['total'] ?? 'N/A');
                                echo $currency . ' ' . $total;
                                ?>
                            </span>
                        </div>
                    </div>

                    <?php if (!empty($current_order['comment'])): ?>
                        <div class="invoice-section">
                            <h3>Additional Information</h3>
                            <div class="invoice-item">
                                <span class="invoice-item-label">Comment:</span>
                                <span class="invoice-item-value"><?php echo $current_order['comment']; ?></span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="invoice-section">
                        <h3>Order Images</h3>
                        <div class="order-images">
                            <?php
                            $order_dir = "../uploads/orders/" . $_GET['order_id'] . "/";

                            // Check for front image
                            if (!empty($current_order['front_image'])) {
                                $front_image = basename($current_order['front_image']);
                                if (file_exists($order_dir . $front_image)) {
                                    echo '<div class="order-image">';
                                    echo '<h4>Card Front</h4>';
                                    echo '<img src="' . $order_dir . $front_image . '" alt="Card Front">';
                                    echo '</div>';
                                }
                            } elseif (file_exists($order_dir . 'front.png')) {
                                echo '<div class="order-image">';
                                echo '<h4>Card Front</h4>';
                                echo '<img src="' . $order_dir . 'front.png" alt="Card Front">';
                                echo '</div>';
                            }

                            // Check for back image
                            if (!empty($current_order['back_image'])) {
                                $back_image = basename($current_order['back_image']);
                                if (file_exists($order_dir . $back_image)) {
                                    echo '<div class="order-image">';
                                    echo '<h4>Card Back</h4>';
                                    echo '<img src="' . $order_dir . $back_image . '" alt="Card Back">';
                                    echo '</div>';
                                }
                            } elseif (file_exists($order_dir . 'back.png')) {
                                echo '<div class="order-image">';
                                echo '<h4>Card Back</h4>';
                                echo '<img src="' . $order_dir . 'back.png" alt="Card Back">';
                                echo '</div>';
                            }

                            // Check for logo image
                            if (!empty($current_order['logo_image'])) {
                                $logo_image = basename($current_order['logo_image']);
                                if (file_exists($order_dir . $logo_image)) {
                                    echo '<div class="order-image">';
                                    echo '<h4>Card Logo</h4>';
                                    echo '<img src="' . $order_dir . $logo_image . '" alt="Card Logo">';
                                    echo '</div>';
                                }
                            } elseif (file_exists($order_dir . 'logo.png')) {
                                echo '<div class="order-image">';
                                echo '<h4>Card Logo</h4>';
                                echo '<img src="' . $order_dir . 'logo.png" alt="Card Logo">';
                                echo '</div>';
                            }

                            // Check for payment proof
                            if (!empty($current_order['payment_proof'])) {
                                $payment_image = basename($current_order['payment_proof']);
                                if (file_exists($order_dir . $payment_image)) {
                                    echo '<div class="order-image">';
                                    echo '<h4>Payment Screenshot</h4>';
                                    echo '<img src="' . $order_dir . $payment_image . '" alt="Payment Screenshot">';
                                    echo '</div>';
                                }
                            } elseif (file_exists($order_dir . 'payment.png')) {
                                echo '<div class="order-image">';
                                echo '<h4>Payment Screenshot</h4>';
                                echo '<img src="' . $order_dir . 'payment.png" alt="Payment Screenshot">';
                                echo '</div>';
                            } elseif (file_exists($order_dir . 'payment_proof.jpg')) {
                                echo '<div class="order-image">';
                                echo '<h4>Payment Screenshot</h4>';
                                echo '<img src="' . $order_dir . 'payment_proof.jpg" alt="Payment Screenshot">';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Orders List View -->
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Payment Method</th>
                            <th>Transaction ID</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">No orders found</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?php echo $order['order_id'] ?? 'N/A'; ?></td>
                                    <td><?php echo $order['date'] ?? 'N/A'; ?></td>
                                    <td><?php echo $order['person_name'] ?? 'N/A'; ?></td>
                                    <td><?php echo $order['payment_method'] ?? 'N/A'; ?></td>
                                    <td><?php echo $order['transaction_id'] ?? 'N/A'; ?></td>
                                    <td><?php echo ($order['currency'] ?? '') . ' ' . ($order['total'] ?? 'N/A'); ?></td>
                                    <td class="status-<?php echo strtolower($order['status'] ?? 'pending'); ?>">
                                        <?php echo $order['status'] ?? 'Pending'; ?>
                                    </td>
                                    <td>
                                        <a href="?order_id=<?php echo $order['order_id']; ?>" class="btn">View Details</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>