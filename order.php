<?php
// Template handling
$card_template = isset($_GET['template']) ? htmlspecialchars($_GET['template']) : 'simple';
$card_template_title = isset($_GET['template'])
	? ucwords(str_replace('-', ' ', $_GET['template']))
	: 'Carbon Skin';

// Color handling
$selected_color = isset($_GET['color']) ? strtolower($_GET['color']) : 'black';
?>

<!DOCTYPE html>
<html>
<!-- /order/ Fri, 29 Aug 2025 18:51:59 GMT -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

	<meta charset="utf-8">
	<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
	<link rel="manifest" href="../site.webmanifest">
	<link rel="mask-icon" href="../favicon.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#ffc40d">
	<meta name="theme-color" content="#ffffff">

	<meta property="og:title" content="Order">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://eliteflyerbd.com/order/">
	<meta property="og:image" content="assets/images/og_img.jpg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">



	<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
	<style>
		img:is([sizes="auto" i], [sizes^="auto," i]) {
			contain-intrinsic-size: 3000px 1500px
		}
	</style>


	<title>Order - Carbon</title>
	<link rel="canonical" href="order.php">


	<link rel="stylesheet" id="slick-css" href="assets/css/slick.css?ver=v0.0.0" type="text/css" media="all">
	<link rel="stylesheet" id="styles-css" href="assets/css/styles.css?ver=v0.0.1681323036" type="text/css" media="all">
	<link rel="stylesheet" id="order-css" href="assets/css/order.css?ver=v0.0.1681458056" type="text/css" media="all">

	<style>
		:root {
			--lazy-loader-animation-duration: 300ms;
		}

		.lazyload {
			display: block;
		}

		.lazyload,
		.lazyloading {
			opacity: 0;
		}


		.lazyloaded {
			opacity: 1;
			transition: opacity 300ms;
			transition: opacity var(--lazy-loader-animation-duration);
		}

		.lazyloading {
			color: transparent;
			opacity: 1;
			transition: opacity 300ms;
			transition: opacity var(--lazy-loader-animation-duration);
			background: url("data:image/svg+xml,%3Csvg%20width%3D%2244%22%20height%3D%2244%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20stroke%3D%22%23cccccc%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%20stroke-width%3D%222%22%3E%3Ccircle%20cx%3D%2222%22%20cy%3D%2222%22%20r%3D%221%22%3E%3Canimate%20attributeName%3D%22r%22%20begin%3D%220s%22%20dur%3D%221.8s%22%20values%3D%221%3B%2020%22%20calcMode%3D%22spline%22%20keyTimes%3D%220%3B%201%22%20keySplines%3D%220.165%2C%200.84%2C%200.44%2C%201%22%20repeatCount%3D%22indefinite%22%2F%3E%3Canimate%20attributeName%3D%22stroke-opacity%22%20begin%3D%220s%22%20dur%3D%221.8s%22%20values%3D%221%3B%200%22%20calcMode%3D%22spline%22%20keyTimes%3D%220%3B%201%22%20keySplines%3D%220.3%2C%200.61%2C%200.355%2C%201%22%20repeatCount%3D%22indefinite%22%2F%3E%3C%2Fcircle%3E%3Ccircle%20cx%3D%2222%22%20cy%3D%2222%22%20r%3D%221%22%3E%3Canimate%20attributeName%3D%22r%22%20begin%3D%22-0.9s%22%20dur%3D%221.8s%22%20values%3D%221%3B%2020%22%20calcMode%3D%22spline%22%20keyTimes%3D%220%3B%201%22%20keySplines%3D%220.165%2C%200.84%2C%200.44%2C%201%22%20repeatCount%3D%22indefinite%22%2F%3E%3Canimate%20attributeName%3D%22stroke-opacity%22%20begin%3D%22-0.9s%22%20dur%3D%221.8s%22%20values%3D%221%3B%200%22%20calcMode%3D%22spline%22%20keyTimes%3D%220%3B%201%22%20keySplines%3D%220.3%2C%200.61%2C%200.355%2C%201%22%20repeatCount%3D%22indefinite%22%2F%3E%3C%2Fcircle%3E%3C%2Fg%3E%3C%2Fsvg%3E") no-repeat;
			background-size: 2em 2em;
			background-position: center center;
		}

		.lazyloaded {
			animation-name: loaded;
			animation-duration: 300ms;
			animation-duration: var(--lazy-loader-animation-duration);
			transition: none;
		}

		@keyframes loaded {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}
	</style><noscript>
		<style>
			.lazyload {
				display: none;
			}

			.lazyload[class*="lazy-loader-background-element-"] {
				display: block;
				opacity: 1;
			}
		</style>
	</noscript> <!-- mobile -->
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">

</head>

<body data-rsssl=1 class="white_page">

	<header class="header">
		<div class="header__blured">
			<div class="container">
				<div class="header__visible">
					<a href="../index.php" class="logo img header_logo_img">
						<img class="header_logo_white skip-lazy" src="assets/images/logo_white.svg" alt>
						<img class="header_logo_black skip-lazy" src="assets/images/logo_black.svg" alt>
					</a>
					<div class="header_currency_input_box input_box">
						<input type="text" name="currency" value="USD" class="hide" autocomplete="off">
						<div class="dropdown">
							<div class="parent_drop"><span class="flag_img"><img class="skip-lazy" src="assets/images/flags/us.png" alt></span>USD</div>
							<div class="child_drop">
								<ul>
									<li><span class="flag_img"><img class="skip-lazy" src="assets/images/flags/au.png" alt></span>AUD</li>
									<li><span class="flag_img"><img class="skip-lazy" src="assets/images/flags/us.png" alt></span>USD</li>
									<li><span class="flag_img"><img class="skip-lazy" src="assets/images/flags/gb.png" alt></span>GBP</li>
									<li><span class="flag_img"><img class="skip-lazy" src="assets/images/flags/eu.png" alt></span>EUR</li>
									<li><span class="flag_img"><img class="skip-lazy" src="assets/images/flags/sg.png" alt></span>SGD</li>
									<li><span class="flag_img"><img class="skip-lazy" src="assets/images/flags/ca.png" alt></span>CAD</li>
									<li><span class="flag_img"><img class="skip-lazy" src="assets/images/flags/no.png" alt></span>NOK</li>
								</ul>
								<div class="header_currency_hint">
									These are the currencies that we accept as payment. <br>
									Your card currency will remain the same as your current card.
								</div>
							</div>
						</div>
					</div>
					<div class="open_menu toggle_menu_button">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
			</div>
			<div class="hidden_menu">
				<div class="-scrollbar menu_scroll">
					<div class="container hidden_menu__container">
						<ul class="menu__list -opacity_hover">
							<li><a href="index.php">Design My Own</a></li>
							<li><a href="best-sellers.php">Pre-made designs</a></li>
							<li><a href="how-it-works.php">How it works</a></li>
							<li><a href="contact-us.php">Contact</a></li>
							<li><a href="faq.php">FAQ</a></li>
						</ul>
						<div class="hidden_menu__footer">
							<div class="social_icon__list"><a title="Tiktok" target="_blank" href="https://www.tiktok.com/@eliteflyerbd" class="img social_icon -opacity_hover"><noscript><img src="assets/images/social_tiktok.svg" alt="Tiktok"></noscript><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Tiktok" data-src="/assets/images/social_tiktok.svg" class=" lazyload"></a>
								<a title="Facebook" target="_blank" href="https://www.facebook.com/eliteflyerbd" class="img social_icon -opacity_hover"><noscript><img src="assets/images/social_fb.svg" alt="Facebook"></noscript><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Facebook" data-src="/assets/images/social_fb.svg" class=" lazyload"></a>
								<a title="Instagram" target="_blank" href="https://www.instagram.com/eliteflyerbd/" class="img social_icon -opacity_hover"><noscript><img src="assets/images/social_insta.svg" alt="Instagram"></noscript><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Instagram" data-src="/assets/images/social_insta.svg" class=" lazyload"></a>
							</div>
							<div class="separator"></div>
							<a href="terms-and-conditions.php" class="terms_use -opacity_hover">Terms and conditions</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main>

		<?php if (isset($_GET['template'])): ?>
			<script>
				window.card_bg = {
					black: "/assets/images/uploads/mclub-b.jpg",
					gold: "/assets/images/uploads/mclub-g.jpg",
					silver: "/assets/images/uploads/mclub-s.jpg",
					rose: "/assets/images/uploads/mclub-r.jpg",
					blackgold: "/assets/images/uploads/mclub-bg.jpg",
					rainbow: "/assets/images/uploads/mclub-rb.jpg",
				};
			</script>
		<?php endif; ?>

		<section class="card__pre_view-section">
			<div class="container">
				<div class="card__pre_view-content">
					<div class="card_front_side">
						<canvas id="card_front_side_canvas"></canvas>
					</div>
					<div class="card_back_side">
						<canvas id="card_back_side_canvas"></canvas>
					</div>
					<canvas id="temp_img_draw_canvas" style="display: none;"></canvas>
				</div>
			</div>
		</section>

		<section class="card__settings_section">

			<div class="mob_content">
				<header class="card__settings_header -grey_border-bottom" id="swiper_close">
					<div class="card__settings_container">
						<h2 class="title_2 -bold">
							Credit Card settings
						</h2>
						<a href="../index.php" class="white_button -black -gray">
							Need help?
						</a>
					</div>
				</header>

				<div class="card__settings_navigation -grey_border-bottom">
					<div class="card__settings_container">
						<ul class="card__settings_nav_block">
							<li class="nav__item active">
								Edit Card Info
							</li>
							<li class="nav__item">
								Choose Metal
							</li>
							<li class="nav__item">
								Add Logo / Text
							</li>
						</ul>
					</div>
				</div>

				<div class="mobile_swiped">

					<div class="card__settings_tab card_settings_tab_block">
						<div class="card__settings_container card_settings_tab_container">

							<div class="card__settings_item active first_chooze">
								<form autocomplete="off" class="card_settings_cardinfo_form">
									<div class="input_box card_settings_cardholdername_input_box">
										<div class="pre_input_text">
											Card Holder Name (<span class="field">0</span>/<span class="max_field">26</span>)
										</div>
										<input type="text" class="field_show input_cardhoder_name" name="cardhoder_name" placeholder="(Name Here)" maxlength="26" value>
									</div>
									<div class="input_box input_box_carddropdown card_settings_cardnumberon_input_box">
										<input type="text" name="where_cardnumberon" value="Front" class="hide" autocomplete="off">
										<div class="pre_input_text">
											Card Number On:
										</div>
										<div class="dropdown">
											<div class="parent_drop"><span class="flag_img card_img"><img class="skip-lazy" src="assets/images/card_front.svg" alt></span>Front</div>
											<div class="child_drop">
												<ul>
													<li class="active"><span class="flag_img card_img"><img class="skip-lazy" src="assets/images/card_front.svg" alt></span>Front</li>
													<li><span class="flag_img card_img"><img class="skip-lazy" src="assets/images/card_back.svg" alt></span>Back</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="input_box input_box_carddropdown card_settings_cardholdernameon_input_box">
										<input type="text" name="where_cardholdernameon" value="Front" class="hide" autocomplete="off">
										<div class="pre_input_text">
											Card Name On:
										</div>
										<div class="dropdown">
											<div class="parent_drop"><span class="flag_img card_img"><img class="skip-lazy" src="assets/images/card_front.svg" alt></span>Front</div>
											<div class="child_drop">
												<ul>
													<li class="active"><span class="flag_img card_img"><img class="skip-lazy" src="assets/images/card_front.svg" alt></span>Front</li>
													<li><span class="flag_img card_img"><img class="skip-lazy" src="assets/images/card_back.svg" alt></span>Back</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="input_box card_settings_comment_input_box">
										<div class="pre_input_text">
											Comment
										</div>
										<textarea type="text" class="message" name="order_comment" placeholder="Add comment"></textarea>
									</div>
								</form>
							</div>

							<div class="card__settings_item">
								<form autocomplete="off">
									<input type="hidden" name="card_template" value="<?= $card_template ?>">
									<input type="hidden" name="card_template_title" value="<?= $card_template_title ?>">

									<div class="double_input_box radio__double_list">
										<div class="input_box">
											<div class="pre_input_text">
												Color
											</div>
											<div class="radio_list">
												<div class="radio_box">
													<input type="radio" name="color_radio" id="color_radio_black" data-title="Black" value="black" <?= $selected_color === 'black' ? 'checked' : '' ?>>
													<label for="color_radio_black">
														<div class="img"><img class="skip-lazy" src="assets/images/card-circles/black.png" alt></div>
														<span class="price_block_container"><span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value price_card_color_black_value">NaN</span><span class="currency_suffix"></span></span></span>
													</label>
												</div>
												<div class="radio_box">
													<input type="radio" name="color_radio" id="color_radio_gold" data-title="Gold" value="gold" <?= $selected_color === 'gold' ? 'checked' : '' ?>>
													<label for="color_radio_gold">
														<div class="img"><img class="skip-lazy" src="assets/images/card-circles/gold.png" alt></div>
														<span class="price_block_container"><span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value price_card_color_gold_value">NaN</span><span class="currency_suffix"></span></span></span>
													</label>
												</div>
												<div class="radio_box">
													<input type="radio" name="color_radio" id="color_radio_silver" data-title="Silver" value="silver" <?= $selected_color === 'silver' ? 'checked' : '' ?>>
													<label for="color_radio_silver">
														<div class="img"><img class="skip-lazy" src="assets/images/card-circles/silver.png" alt></div>
														<span class="price_block_container"><span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value price_card_color_silver_value">NaN</span><span class="currency_suffix"></span></span></span>
													</label>
												</div>
												<div class="radio_box">
													<input type="radio" name="color_radio" id="color_radio_rose" data-title="Rose" value="rose" <?= $selected_color === 'rose' ? 'checked' : '' ?>>
													<label for="color_radio_rose">
														<div class="img"><img class="skip-lazy" src="assets/images/card-circles/rose.png" alt></div>
														<span class="price_block_container"><span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value price_card_color_rose_value">NaN</span><span class="currency_suffix"></span></span></span>
													</label>
												</div>
												<div class="radio_box">
													<input type="radio" name="color_radio" id="color_radio_blackgold" data-title="BlackGold" value="blackgold" <?= $selected_color === 'blackgold' ? 'checked' : '' ?>>
													<label for="color_radio_blackgold">
														<div class="img"><img class="skip-lazy" src="assets/images/card-circles/blackgold.png" alt></div>
														<span class="price_block_container"><span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value price_card_color_blackgold_value">NaN</span><span class="currency_suffix"></span></span></span>
													</label>
												</div>
												<div class="radio_box">
													<input type="radio" name="color_radio" id="color_radio_rainbow" data-title="Rainbow" value="rainbow" <?= $selected_color === 'rainbow' ? 'checked' : '' ?>>
													<label for="color_radio_rainbow">
														<div class="img"><img class="skip-lazy" src="assets/images/card-circles/rainbow.png" alt></div>
														<span class="price_block_container"><span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value price_card_color_rainbow_value">NaN</span><span class="currency_suffix"></span></span></span>
													</label>
												</div>
											</div>
										</div>
										<div class="input_box">
											<div class="pre_input_text">
												Border
											</div>
											<div class="check_list check_list_border">
												<div class="radio_box">
													<input type="checkbox" name="card_border_frame_1" id="checkbox_frame_1" data-frame="frame_1">
													<label for="checkbox_frame_1">
														<div class="border_img"><noscript><img class="border_img_icon" src="assets/images/cards/background-border-1-icon.svg"></noscript><img class="border_img_icon lazyload" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="assets/images/cards/background-border-1-icon.svg"></div>
														<span class="price_block_container"><span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value">0</span><span class="currency_suffix"></span></span></span>
													</label>
												</div>
												<div class="radio_box">
													<input type="checkbox" name="card_border_frame_2" id="checkbox_frame_2" data-frame="frame_2">
													<label for="checkbox_frame_2">
														<div class="border_img"><noscript><img class="border_img_icon" src="assets/images/cards/background-border-2-iconc4ca.svg?1"></noscript><img class="border_img_icon lazyload" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="assets/images/cards/background-border-2-iconc4ca.svg?1"></div>
														<span class="price_block_container"><span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value">0</span><span class="currency_suffix"></span></span></span>
													</label>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>

							<div class="card__settings_item editor_card">
								<form autocomplete="off">
									<div class="adding_block card_logo_text_add_container">
										<div class="text_editor card_editor add_css text_icon text_to_card_editor" style="display: none;">
											<div class="card_editor_top">
												<div class="icon"></div>
												<div class="text">
													<p>
														<strong>Custom Text</strong>
													</p>
													<p>Add / Edit text</p>
												</div>
												<div class="trash_img text_to_card_editor_cancel">
													<svg fill="none" viewBox="0 0 21 26">
														<path d="M20.58 3.55v1.26a.63.63 0 01-.63.63H1.05a.63.63 0 01-.63-.63V3.55a.63.63 0 01.63-.63h5.67V1.66C6.72.963 7.284.4 7.98.4h5.04c.696 0 1.26.564 1.26 1.26v1.26h5.67a.63.63 0 01.63.63zM2.776 23.255a2.52 2.52 0 002.52 2.343H15.73a2.52 2.52 0 002.52-2.343l1.07-15.297H1.68l1.097 15.297z" fill="#171717" fill-opacity=".5" />
													</svg>
												</div>
											</div>
											<div class="separator"></div>
											<div class="card_editor_bottom">
												<div class="input_box">
													<div class="pre_input_text">
														Text (<span class="field">0</span>/<span class="max_field">26</span>)
													</div>
													<input type="text" class="field_show" name="text_to_card_editor_text" placeholder="(Enter Text)" maxlength="26" data-value value>
												</div>
												<div class="input_box number_box">
													<div class="pre_input_text">
														Font Size
													</div>
													<div class="number">
														<input type="number" class="num minNumbered" name="text_to_card_editor_font_size" min="15" max="1000" value="15">
														<div class="number_controls">
															<div class="nc-plus"></div>
															<div class="nc-minus nonactive"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="adding_button_container">
											<div class="add_text adding_button add_css text_icon add_text_to_card">
												<div class="icon"></div>
												<div class="text">
													<p>
														<strong>Add custom Text</strong>
													</p>
													<p>Add / Edit text</p>
												</div>
											</div>
										</div>
										<div class="img_editor card_editor add_css img_icon logo_to_card_editor" style="display: none;">
											<div class="card_editor_top">
												<div class="logo_to_card_file_event" style="display: none;">
													<input id="logo_to_card_file" type="file" name="logo_to_card_file" class="hide file">
												</div>
												<div class="icon"></div>
												<div class="text">
													<p>
														<strong class="logo_to_card_editor_title">Add custom logo</strong>
													</p>
													<p class="logo_to_card_editor_resolution">Recommended resolution: 1200 px * 2080 px</p>
												</div>
												<div class="trash_img logo_to_card_editor_cancel">
													<svg fill="none" viewBox="0 0 21 26">
														<path d="M20.58 3.55v1.26a.63.63 0 01-.63.63H1.05a.63.63 0 01-.63-.63V3.55a.63.63 0 01.63-.63h5.67V1.66C6.72.963 7.284.4 7.98.4h5.04c.696 0 1.26.564 1.26 1.26v1.26h5.67a.63.63 0 01.63.63zM2.776 23.255a2.52 2.52 0 002.52 2.343H15.73a2.52 2.52 0 002.52-2.343l1.07-15.297H1.68l1.097 15.297z" fill="#171717" fill-opacity=".5" />
													</svg>
												</div>
											</div>
											<div class="separator"></div>
											<div class="card_editor_bottom editor_img_bottom first_setting">
												<div class="input_box dropdown_box">
													<div class="pre_input_text -hint">
														Select type of logo you want to upload:
														<div class="hint_icon">
															<svg fill="none" viewBox="0 0 15 16">
																<path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 14a6 6 0 100-12 6 6 0 000 12zm0 1.5a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" fill="#171717" fill-opacity=".5" />
																<path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 4.25a.75.75 0 100 1.5.75.75 0 000-1.5zm0 3a.75.75 0 00-.75.75v3a.75.75 0 001.5 0V8a.75.75 0 00-.75-.75z" fill="#171717" fill-opacity=".5" />
															</svg>
														</div>
														<div class="hint_child">
															Please select the background colour of your logo
														</div>
													</div>
													<input name="logo_to_card_bg_color" type="text" class="hide">
													<div class="dropdown">
														<div class="parent_drop">
															Choose Background Color
														</div>
														<div class="child_drop">
															<ul class="-scrollbar">
																<li><span class="color_buble" data-color="transparent"></span>No Background</li>
																<li><span class="color_buble" data-color="black"></span>Black Background</li>
																<li><span class="color_buble" data-color="white"></span>White Background</li>
															</ul>
														</div>
													</div>
												</div>
												<label for="logo_to_card_file" class="choose_file submit nonactive">
													Add Logo
												</label>
											</div>
											<div class="card_editor_bottom editor_img_bottom second_setting none">
												<div class="inputs_row">
													<div class="input_box sizes">
														<div class="pre_input_text">Height</div>
														<div class="input"><input type="number" name="logo_to_card_height" class="num height" min="1" max="100" value="50"></div>
													</div>
													<div class="input_box sizes">
														<div class="pre_input_text">Width</div>
														<div class="input"><input type="number" name="logo_to_card_width" class="num width" min="1" max="100" value="50"></div>
													</div>
													<div class="input_box orderToggleActiveContainer">
														<input type="checkbox" name="logo_to_card_proportions" value="lock">
														<div class="pre_input_text">Proportions</div>
														<div class="proportions_button orderToggleActive"></div>
													</div>
												</div>
												<div class="inverse_box orderToggleActiveContainer">
													<input type="checkbox" name="logo_to_card_inversion" value="enable">
													<div class="pre_input_text">Invers</div>
													<div class="inverse_button orderToggleActive"></div>
												</div>
											</div>
										</div>
										<div class="adding_button_container">
											<div class="add_img adding_button add_css img_icon add_logo_to_card">
												<div class="icon"></div>
												<div class="text">
													<p>
														<strong>Add custom logo</strong>
													</p>
													<p>
														Recommended resolution: 1200 px * 2080 px
													</p>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>

						</div>

						<div class="card__settings_container card_settings_total_container">
							<div class="col step_content-price_col">
								<div class="price_col card_settings_price_col">
									<ul>
										<li>
											<p class="price_col_title">Mirror Card</p>
											<p class="price_col_value"><span class="price_plus">+</span> <span class="currency"><span class="currency_prefix">$</span></span><span class="price total_mirror_price">NaN</span><span class="currency"><span class="currency_suffix"></span></span> <span class="currency_code">None</span></p>
										</li>
										<li>
											<p class="price_col_title">Card</p>
											<p class="price_col_value"><span class="currency"><span class="currency_prefix">$</span></span><span class="price total_card_price">NaN</span><span class="currency"><span class="currency_suffix"></span></span> <span class="currency_code">None</span></p>
										</li>
										<li class="total">
											<p class="price_col_title">Total (<span class="currency_code">None</span>)</p>
											<p class="price_col_value price_col_total_value"><span class="currency"><span class="currency_prefix">$</span></span><span class="price total_mcsum_price">NaN</span><span class="currency"><span class="currency_suffix"></span></span> <span class="currency_code">None</span></p>
										</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>

				<footer class="card__settings_footer -grey_border-top">
					<div class="card__settings_container">
						<div class="white_button -black order_button open_order_modal order_create_form_button">
							Create Order
						</div>
					</div>
				</footer>
			</div>
		</section>

		<div class="modal__wrapper">
			<div class="modal_content order_modal">
				<div class="top_modal_row">
					<h2 class="title_2">
						Create Order
					</h2>
					<div class="close_modal"></div>
				</div>
				<div class="current_step_row">
					<ol>
						<li>Add Shipping Information</li>
						<li>Confirm Order</li>
						<li>Payment Order</li>
					</ol>
				</div>
				<div class="step_section -scrollbar">
					<form autocomplete="off" action>
						<div class="step step_1">
							<div class="double_input_box">
								<div class="input_box">
									<div class="pre_input_text">
										Name
									</div>
									<input type="text" class="name" name="order_person_name" value>
								</div>
								<div class="input_box">
									<div class="pre_input_text">
										Email
									</div>
									<input type="email" class="email" name="order_person_email" value>
								</div>
							</div>
							<div class="double_input_box">
								<div class="input_box">
									<div class="pre_input_text">
										Country
									</div>
									<select name="order_address_country">
										<option value>Select your Country</option>
										<option value="AX">AALAND ISLANDS</option>
										<option value="AF">AFGHANISTAN</option>
										<option value="AL">ALBANIA</option>
										<option value="DZ">ALGERIA</option>
										<option value="AS">AMERICAN SAMOA</option>
										<option value="AD">ANDORRA</option>
										<option value="AO">ANGOLA</option>
										<option value="AI">ANGUILLA</option>
										<option value="AQ">ANTARCTICA</option>
										<option value="AG">ANTIGUA AND BARBUDA</option>
										<option value="AR">ARGENTINA</option>
										<option value="AM">ARMENIA</option>
										<option value="AW">ARUBA</option>
										<option value="AU">AUSTRALIA</option>
										<option value="AT">AUSTRIA</option>
										<option value="AZ">AZERBAIJAN</option>
										<option value="BS">BAHAMAS</option>
										<option value="BH">BAHRAIN</option>
										<option value="BD">BANGLADESH</option>
										<option value="BB">BARBADOS</option>
										<option value="BY">BELARUS</option>
										<option value="BE">BELGIUM</option>
										<option value="BZ">BELIZE</option>
										<option value="BJ">BENIN</option>
										<option value="BM">BERMUDA</option>
										<option value="BT">BHUTAN</option>
										<option value="BO">BOLIVIA</option>
										<option value="BA">BOSNIA AND HERZEGOWINA</option>
										<option value="BW">BOTSWANA</option>
										<option value="BV">BOUVET ISLAND</option>
										<option value="BR">BRAZIL</option>
										<option value="IO">BRITISH INDIAN OCEAN TERRITORY</option>
										<option value="BN">BRUNEI DARUSSALAM</option>
										<option value="BG">BULGARIA</option>
										<option value="BF">BURKINA FASO</option>
										<option value="BI">BURUNDI</option>
										<option value="KH">CAMBODIA</option>
										<option value="CM">CAMEROON</option>
										<option value="CA">CANADA</option>
										<option value="CV">CAPE VERDE</option>
										<option value="KY">CAYMAN ISLANDS</option>
										<option value="CF">CENTRAL AFRICAN REPUBLIC</option>
										<option value="TD">CHAD</option>
										<option value="CL">CHILE</option>
										<option value="CN">CHINA</option>
										<option value="CX">CHRISTMAS ISLAND</option>
										<option value="CO">COLOMBIA</option>
										<option value="KM">COMOROS</option>
										<option value="CK">COOK ISLANDS</option>
										<option value="CR">COSTA RICA</option>
										<option value="CI">COTE D'IVOIRE</option>
										<option value="CU">CUBA</option>
										<option value="CY">CYPRUS</option>
										<option value="CZ">CZECH REPUBLIC</option>
										<option value="DK">DENMARK</option>
										<option value="DJ">DJIBOUTI</option>
										<option value="DM">DOMINICA</option>
										<option value="DO">DOMINICAN REPUBLIC</option>
										<option value="EC">ECUADOR</option>
										<option value="EG">EGYPT</option>
										<option value="SV">EL SALVADOR</option>
										<option value="GQ">EQUATORIAL GUINEA</option>
										<option value="ER">ERITREA</option>
										<option value="EE">ESTONIA</option>
										<option value="ET">ETHIOPIA</option>
										<option value="FO">FAROE ISLANDS</option>
										<option value="FJ">FIJI</option>
										<option value="FI">FINLAND</option>
										<option value="FR">FRANCE</option>
										<option value="GF">FRENCH GUIANA</option>
										<option value="PF">FRENCH POLYNESIA</option>
										<option value="TF">FRENCH SOUTHERN TERRITORIES</option>
										<option value="GA">GABON</option>
										<option value="GM">GAMBIA</option>
										<option value="GE">GEORGIA</option>
										<option value="DE">GERMANY</option>
										<option value="GH">GHANA</option>
										<option value="GI">GIBRALTAR</option>
										<option value="GR">GREECE</option>
										<option value="GL">GREENLAND</option>
										<option value="GD">GRENADA</option>
										<option value="GP">GUADELOUPE</option>
										<option value="GU">GUAM</option>
										<option value="GT">GUATEMALA</option>
										<option value="GN">GUINEA</option>
										<option value="GW">GUINEA-BISSAU</option>
										<option value="GY">GUYANA</option>
										<option value="HT">HAITI</option>
										<option value="HM">HEARD AND MC DONALD ISLANDS</option>
										<option value="HN">HONDURAS</option>
										<option value="HK">HONG KONG</option>
										<option value="HU">HUNGARY</option>
										<option value="IS">ICELAND</option>
										<option value="IN">INDIA</option>
										<option value="ID">INDONESIA</option>
										<option value="IQ">IRAQ</option>
										<option value="IE">IRELAND</option>
										<option value="IL">ISRAEL</option>
										<option value="IT">ITALY</option>
										<option value="JM">JAMAICA</option>
										<option value="JP">JAPAN</option>
										<option value="JO">JORDAN</option>
										<option value="KZ">KAZAKHSTAN</option>
										<option value="KE">KENYA</option>
										<option value="KI">KIRIBATI</option>
										<option value="KW">KUWAIT</option>
										<option value="KG">KYRGYZSTAN</option>
										<option value="LA">LAO PEOPLE'S DEMOCRATIC REPUBLIC</option>
										<option value="LV">LATVIA</option>
										<option value="LB">LEBANON</option>
										<option value="LS">LESOTHO</option>
										<option value="LR">LIBERIA</option>
										<option value="LY">LIBYAN ARAB JAMAHIRIYA</option>
										<option value="LI">LIECHTENSTEIN</option>
										<option value="LT">LITHUANIA</option>
										<option value="LU">LUXEMBOURG</option>
										<option value="MO">MACAU</option>
										<option value="MG">MADAGASCAR</option>
										<option value="MW">MALAWI</option>
										<option value="MY">MALAYSIA</option>
										<option value="MV">MALDIVES</option>
										<option value="ML">MALI</option>
										<option value="MT">MALTA</option>
										<option value="MH">MARSHALL ISLANDS</option>
										<option value="MQ">MARTINIQUE</option>
										<option value="MR">MAURITANIA</option>
										<option value="MU">MAURITIUS</option>
										<option value="YT">MAYOTTE</option>
										<option value="MX">MEXICO</option>
										<option value="MC">MONACO</option>
										<option value="MN">MONGOLIA</option>
										<option value="MS">MONTSERRAT</option>
										<option value="MA">MOROCCO</option>
										<option value="MZ">MOZAMBIQUE</option>
										<option value="MM">MYANMAR</option>
										<option value="NA">NAMIBIA</option>
										<option value="NR">NAURU</option>
										<option value="NP">NEPAL</option>
										<option value="NL">NETHERLANDS</option>
										<option value="AN">NETHERLANDS ANTILLES</option>
										<option value="NC">NEW CALEDONIA</option>
										<option value="NZ">NEW ZEALAND</option>
										<option value="NI">NICARAGUA</option>
										<option value="NE">NIGER</option>
										<option value="NG">NIGERIA</option>
										<option value="NU">NIUE</option>
										<option value="NF">NORFOLK ISLAND</option>
										<option value="MP">NORTHERN MARIANA ISLANDS</option>
										<option value="NO">NORWAY</option>
										<option value="OM">OMAN</option>
										<option value="PK">PAKISTAN</option>
										<option value="PW">PALAU</option>
										<option value="PA">PANAMA</option>
										<option value="PG">PAPUA NEW GUINEA</option>
										<option value="PY">PARAGUAY</option>
										<option value="PE">PERU</option>
										<option value="PH">PHILIPPINES</option>
										<option value="PN">PITCAIRN</option>
										<option value="PL">POLAND</option>
										<option value="PT">PORTUGAL</option>
										<option value="PR">PUERTO RICO</option>
										<option value="QA">QATAR</option>
										<option value="RE">REUNION</option>
										<option value="RO">ROMANIA</option>
										<option value="RU">RUSSIAN FEDERATION</option>
										<option value="RW">RWANDA</option>
										<option value="SH">SAINT HELENA</option>
										<option value="KN">SAINT KITTS AND NEVIS</option>
										<option value="LC">SAINT LUCIA</option>
										<option value="PM">SAINT PIERRE AND MIQUELON</option>
										<option value="VC">SAINT VINCENT AND THE GRENADINES</option>
										<option value="WS">SAMOA</option>
										<option value="SM">SAN MARINO</option>
										<option value="ST">SAO TOME AND PRINCIPE</option>
										<option value="SA">SAUDI ARABIA</option>
										<option value="SN">SENEGAL</option>
										<option value="CS">SERBIA AND MONTENEGRO</option>
										<option value="SC">SEYCHELLES</option>
										<option value="SL">SIERRA LEONE</option>
										<option value="SG">SINGAPORE</option>
										<option value="SK">SLOVAKIA</option>
										<option value="SI">SLOVENIA</option>
										<option value="SB">SOLOMON ISLANDS</option>
										<option value="SO">SOMALIA</option>
										<option value="ZA">SOUTH AFRICA</option>
										<option value="GS">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
										<option value="ES">SPAIN</option>
										<option value="LK">SRI LANKA</option>
										<option value="SD">SUDAN</option>
										<option value="SR">SURINAME</option>
										<option value="SJ">SVALBARD AND JAN MAYEN ISLANDS</option>
										<option value="SZ">SWAZILAND</option>
										<option value="SE">SWEDEN</option>
										<option value="CH">SWITZERLAND</option>
										<option value="SY">SYRIAN ARAB REPUBLIC</option>
										<option value="TW">TAIWAN</option>
										<option value="TJ">TAJIKISTAN</option>
										<option value="TH">THAILAND</option>
										<option value="TL">TIMOR-LESTE</option>
										<option value="TG">TOGO</option>
										<option value="TK">TOKELAU</option>
										<option value="TO">TONGA</option>
										<option value="TT">TRINIDAD AND TOBAGO</option>
										<option value="TN">TUNISIA</option>
										<option value="TR">TURKEY</option>
										<option value="TM">TURKMENISTAN</option>
										<option value="TC">TURKS AND CAICOS ISLANDS</option>
										<option value="TV">TUVALU</option>
										<option value="UG">UGANDA</option>
										<option value="UA">UKRAINE</option>
										<option value="AE">UNITED ARAB EMIRATES</option>
										<option value="GB">UNITED KINGDOM</option>
										<option value="US">UNITED STATES</option>
										<option value="UM">UNITED STATES MINOR OUTLYING ISLANDS</option>
										<option value="UY">URUGUAY</option>
										<option value="UZ">UZBEKISTAN</option>
										<option value="VU">VANUATU</option>
										<option value="VE">VENEZUELA</option>
										<option value="VN">VIET NAM</option>
										<option value="WF">WALLIS AND FUTUNA ISLANDS</option>
										<option value="EH">WESTERN SAHARA</option>
										<option value="YE">YEMEN</option>
										<option value="ZM">ZAMBIA</option>
										<option value="ZW">ZIMBABWE</option>
									</select>
								</div>
								<div class="input_box">
									<div class="pre_input_text">
										State
									</div>
									<input type="text" name="order_address_state" value>
								</div>
							</div>
							<div class="double_input_box">
								<div class="input_box">
									<div class="pre_input_text">
										City
									</div>
									<input type="text" name="order_address_city" value>
								</div>
								<div class="input_box">
									<div class="pre_input_text">
										Postal / Zip Code
									</div>
									<input type="text" class="message" name="order_address_zipcode" value>
								</div>
							</div>
							<div class="input_box">
								<div class="pre_input_text">
									Address
								</div>
								<input type="text" class="message" name="order_address_street_house" value>
							</div>
							<div class="white_button -black order_button continue_button">
								<input type="submit" value>
								Continue
							</div>
						</div>
						<div class="step step_2">
							<div class="bordered_item">
								<div class="card_choosen_preview">
									<div class="img">
										<noscript><img class="order_card_preview_front" src alt></noscript><img class="order_card_preview_front lazyload" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt data-src>
										<noscript><img class="order_card_preview_back" src alt></noscript><img class="order_card_preview_back lazyload" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt data-src>
									</div>
									<div class="text">
										<p><strong><span class="order_card_title"></span></strong></p>
										<p>Custom skin</p>
									</div>
								</div>
								<div class="checkbox_box">
									<div class="checkbox">
										<input type="checkbox" id="care_check" name="card_care">
										<label for="care_check">
											Card Care (<span class="price_plus">+</span><span class="price_block"><span class="currency_prefix"></span><span class="price_value card_care_price_value">NaN</span><span class="currency_suffix"></span></span>)
										</label>
									</div>
									<p>
										If your metal card is lost or if it expires in the first 365 <br>
										days, we’ll replace it at the expense of the shipping.
									</p>
								</div>
								<div class="coupon_input">
									<div class="input">
										<input type="text" name="promo_code" placeholder="Input coupon" data-discount="0" data-value autocomlete="off">
									</div>
									<p class="alert">Coupon not found</p>
									<div class="promo_code_apply">Apply</div>
									<div class="promo_code_clear">Clear</div>
								</div>
							</div>
							<div class="step_content">
								<div class="col text contact_text">
									<p><strong>Shipping Information</strong></p>
									<div class="shipping_information_block"></div>
								</div>
								<div class="col radio_list text">
									<p><strong>Shipping Method</strong></p>
									<div class="card_shipping_container"><input type="radio" name="card_shipping" id="radio_order_free" value="free" data-price="NaN"><label for="radio_order_free">Free Express Shipping in Australia</label></div>
									<div class="card_shipping_container"><input type="radio" name="card_shipping" id="radio_order_standard" value="standard" data-price="NaN"><label for="radio_order_standard">International Standard Shipping</label></div>
									<div class="card_shipping_container"><input type="radio" name="card_shipping" id="radio_order_express" value="express" data-price="NaN"><label for="radio_order_express">International Express Shipping</label></div>
								</div>
								<div class="col step_content-price_col">
									<div class="price_col">
										<ul>
											<li>
												<p>Production</p>
												<p><span class="currency">(<span class="currency_code">None</span>) <span class="currency_prefix"></span></span><span class="price total_production_price">NaN</span><span class="currency"><span class="currency_suffix"></span></span></p>
											</li>
											<li style="display: none;">
												<p>Discount</p>
												<p><span class="currency">(<span class="currency_code">None</span>)&nbsp;&nbsp;-&nbsp;<span class="currency_prefix"></span></span><span class="price total_discount_price">NaN</span><span class="currency"><span class="currency_suffix"></span></span></p>
											</li>
											<li>
												<p>Shipping</p>
												<p><span class="currency">(<span class="currency_code">None</span>) <span class="currency_prefix"></span></span><span class="price total_shipping_price">NaN</span><span class="currency"><span class="currency_suffix"></span></span></p>
											</li>
											<li>
												<p>Tax</p>
												<p><span class="currency">(<span class="currency_code">None</span>) <span class="currency_prefix"></span></span><span class="price total_tax_price">NaN</span><span class="currency"><span class="currency_suffix"></span></span></p>
											</li>
											<li class="total">
												<p>Total</p>
												<p><span class="currency">(<span class="currency_code">None</span>) <span class="currency_prefix"></span></span><span class="price total_sum_price">NaN</span><span class="currency"><span class="currency_suffix"></span></span></p>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="bottom_button_row">
								<div class="white_button -black -gray back_step">
									Back
								</div>
								<div class="white_button -black order_button final_step final_step-applepay">
									Proceed to payment
								</div>
								<div class="order_agree_checkbox_container">
									<input type="checkbox" id="order_agree_checkbox_id">
									<label for="order_agree_checkbox_id">
										I&nbsp;have read and&nbsp;agree to the&nbsp;<a href="terms-and-conditions.php" target="_blank">Terms &amp;&nbsp;Conditions</a> and&nbsp;<a href="how-it-works.php" target="_blank">How It&nbsp;Works</a> page.
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal_content payment_modal">
				<div class="top_modal_row">
					<h2 class="title_2">
						Payment Order
					</h2>
					<div class="close_modal"></div>
				</div>
				<div class="message-info-block"></div>
				<form id="payment-form">
					<div class="payment-method-selection">
						<h3>Select Payment Method</h3>
						<div class="payment-methods">
							<div class="payment-method active">
								<input type="radio" id="cash-on-delivery" name="payment_method" value="cash-on-delivery" checked>
								<label for="cash-on-delivery">
									<img src="assets/images/cod.png" alt="">
									Cash on Delivery</label>
							</div>

							<div class="payment-method">
								<input type="radio" id="bank-transfer" name="payment_method" value="bank">
								<label for="bank-transfer">
									<img src="assets/images/bkash.png" alt="">
									Bank Transfer</label>
							</div>
							<div class="payment-method">
								<input type="radio" id="bkash" name="payment_method" value="bkash">

								<label for="bkash"><img src="assets/images/bkash.png" alt="">bKash Send Money</label>
							</div>
							<div class="payment-method">
								<input type="radio" id="nagad" name="payment_method" value="nagad">
								<label for="nagad">
									<img src="assets/images/nagad.png" alt="">
									Nagad Send Money</label>
							</div>
						</div>
					</div>

					<div class="payment-details" id="cash-on-delivery-details">
						<p>You will pay with cash upon delivery.</p>
					</div>
					<div class="payment-details" id="bank-details" style="display: none;">
						<h4>Bank Transfer Details</h4>
						<div class="account-info">
							<p><strong>Bank Name:</strong> ABC Bank</p>
							<p><strong>Account Name:</strong> Carbon Co Skins</p>
							<p><strong>Account Number:</strong> 1234567890</p>
							<p><strong>Branch:</strong> Main Branch</p>
						</div>
					</div>

					<div class="payment-details" id="bkash-details" style="display:none;">
						<h4>bKash Payment Details</h4>
						<div class="account-info">
							<p><strong>bKash Number:</strong> 01XXXXXXXXX</p>
							<p><strong>Account Type:</strong> Merchant</p>
							<p>Please send the exact amount to this number</p>
						</div>
					</div>

					<div class="payment-details" id="nagad-details" style="display:none;">
						<h4>Nagad Payment Details</h4>
						<div class="account-info">
							<p><strong>Nagad Number:</strong> 01XXXXXXXXX</p>
							<p><strong>Account Type:</strong> Merchant</p>
							<p>Please send the exact amount to this number</p>
						</div>
					</div>

					<div class="transaction-info" id="transaction-details-section" style="display:none;">
						<h4>Payment Confirmation</h4>
						<div class="input-group">
							<label for="transaction-id">Transaction ID / Reference Number</label>
							<input type="text" id="transaction-id" name="transaction_id" placeholder="Enter your transaction ID">
						</div>

						<div class="input-group">
							<label for="payment-screenshot">Payment Screenshot (Optional)</label>
							<input type="file" id="payment-screenshot" name="payment_screenshot" accept="image/*">
						</div>
					</div>

					<button id="submit">
						<div class="spinner hidden" id="spinner"></div>
						<span id="button-text">Confirm Payment</span>
					</button>
					<p id="card-error" role="alert"></p>

				</form>
			</div>
			<div class="modal_content email_submitting">
				<div class="top_modal_row">
					<h2 class="title_2">
						Payment Order
					</h2>
					<div class="close_modal"></div>
				</div>
				<div class="payment_verify_content">
					<div class="payment_verify_text">
						Payment is being verified. Please wait.
					</div>
					<noscript><img class="payment_verify_preloader" src="assets/images/circle-preloader.svg"></noscript><img class="payment_verify_preloader lazyload" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="assets/images/circle-preloader.svg">
					<div class="email_submitting_progress"></div>
				</div>
			</div>
			<div class="modal_content payment_success_modal">
				<div class="close_modal"></div>
				<div class="top_modal_row">
					<img class="skip-lazy" src="assets/images/order_success_icon.svg" alt>
				</div>
				<div class="top_modal_row">
					<h2 class="title_2">Thank you! Order Placed.<br>Your card comes to life.</h2>
				</div>
				<p>All data about your order has been sent to the mail that you specified at order.</p>
				<div class="white_button -black order_button payment_success-close">Close</div>
			</div>
			<div class="modal_content tutorial_modal">
				<div class="tutorial_modal_content">
					<div class="tutorial_modal_slider">
						<div class="tutorial_modal_slide">
							<div class="tutorial_modal_header">
								<h2 class="tutorial_modal_header_title">Welcome to Carbon Card Editor</h2>
							</div>
							<div class="tutorial_modal_video">
								<div class="tutorial_modal_video_img">
									<img class="skip-lazy" src="assets/video/order-tutorial/step_0c4ca.jpg?1">
								</div>
							</div>
							<div class="tutorial_modal_text">
								This editor allows you to&nbsp;create a&nbsp;unique custom design for your metal card. Follow these simple steps.
							</div>
						</div>
						<div class="tutorial_modal_slide">
							<div class="tutorial_modal_header">
								<h2 class="tutorial_modal_header_title">Adding Name</h2>
							</div>
							<div class="tutorial_modal_video">
								<video class="tutorial_modal_video_desktop" muted loop playsinline src="assets/video/order-tutorial/desktop/step_1.mp4" poster="assets/video/order-tutorial/desktop/step_1.jpg"></video>
								<video class="tutorial_modal_video_mobile" muted loop playsinline src="assets/video/order-tutorial/mobile/step_1.mp4" poster="assets/video/order-tutorial/mobile/step_1.jpg"></video>
							</div>
							<div class="tutorial_modal_text">
								Enter the Cardholder name you wish to&nbsp;appear on&nbsp;your card. You can drag your name into position or&nbsp;select to&nbsp;move it&nbsp;to&nbsp;the back side of&nbsp;the card.
							</div>
						</div>
						<div class="tutorial_modal_slide">
							<div class="tutorial_modal_header">
								<h2 class="tutorial_modal_header_title">﻿﻿Card Number</h2>
							</div>
							<div class="tutorial_modal_video">
								<video class="tutorial_modal_video_desktop" muted loop playsinline src="assets/video/order-tutorial/desktop/step_2.mp4" poster="assets/video/order-tutorial/desktop/step_2.jpg"></video>
								<video class="tutorial_modal_video_mobile" muted loop playsinline src="assets/video/order-tutorial/mobile/step_2.mp4" poster="assets/video/order-tutorial/mobile/step_2.jpg"></video>
							</div>
							<div class="tutorial_modal_text">
								No&nbsp;need to&nbsp;add your card number to&nbsp;the design, just choose if&nbsp;you prefer it&nbsp;on&nbsp;the front or&nbsp;back of&nbsp;the metal card.
							</div>
						</div>
						<div class="tutorial_modal_slide">
							<div class="tutorial_modal_header">
								<h2 class="tutorial_modal_header_title">Choose Card Colour and Border</h2>
							</div>
							<div class="tutorial_modal_video">
								<video class="tutorial_modal_video_desktop" muted loop playsinline src="assets/video/order-tutorial/desktop/step_3c4ca.mp4?1" poster="assets/video/order-tutorial/desktop/step_3.jpg"></video>
								<video class="tutorial_modal_video_mobile" muted loop playsinline src="assets/video/order-tutorial/mobile/step_3c4ca.mp4?1" poster="assets/video/order-tutorial/mobile/step_3.jpg"></video>
							</div>
							<div class="tutorial_modal_text">
								Select your favourite card colour and add your desired border (optional).
							</div>
						</div>
						<div class="tutorial_modal_slide">
							<div class="tutorial_modal_header">
								<h2 class="tutorial_modal_header_title">Add Custom Logo and Text</h2>
							</div>
							<div class="tutorial_modal_video">
								<video class="tutorial_modal_video_desktop" muted loop playsinline src="assets/video/order-tutorial/desktop/step_4.mp4" poster="assets/video/order-tutorial/desktop/step_4.jpg"></video>
								<video class="tutorial_modal_video_mobile" muted loop playsinline src="assets/video/order-tutorial/mobile/step_4.mp4" poster="assets/video/order-tutorial/mobile/step_4.jpg"></video>
							</div>
							<div class="tutorial_modal_text">
								To&nbsp;upload your own logo / image the editor, choose the background color of&nbsp;your file. You can then add any custom text. All added elements can be&nbsp;moved and resized.
							</div>
						</div>
						<div class="tutorial_modal_slide">
							<div class="tutorial_modal_header">
								<h2 class="tutorial_modal_header_title">﻿Checkout</h2>
							</div>
							<div class="tutorial_modal_video">
								<video class="tutorial_modal_video_desktop" muted loop playsinline src="assets/video/order-tutorial/desktop/step_5.mp4" poster="assets/video/order-tutorial/desktop/step_5.jpg"></video>
								<video class="tutorial_modal_video_mobile" muted loop playsinline src="assets/video/order-tutorial/mobile/step_5.mp4" poster="assets/video/order-tutorial/mobile/step_5.jpg"></video>
							</div>
							<div class="tutorial_modal_text">
								Once you are happy with your card design&nbsp;— click «Create Order» and follow the instructions.
							</div>
						</div>
					</div>
					<div class="tutorial_modal_slider_dots">
					</div>
					<div class="tutorial_modal_footer">
						<div class="white_button -black order_button tutorial_button_next" data-next="Next" data-final="Got it!">Next</div>
						<div class="white_button -black -gray-text tutorial_button_skipall">Skip all</div>
					</div>
				</div>
				<div class="tutorial_modal_close">
					<div class="close_modal"></div>
				</div>
			</div>
		</div>
		<div class="tutorial_fixed_icon">
			<a href="#" class="tutorial_fixed_icon_link"><img class="skip-lazy" src="assets/images/icon-question.svg"><span>Help</span></a>
		</div>
		<script>
			var currencies = {
				AUD: {
					prefix: '$',
					suffix: '',
				},
				USD: {
					prefix: '$',
					suffix: '',
				},
				GBP: {
					prefix: '£',
					suffix: '',
				},
				EUR: {
					prefix: '€',
					suffix: '',
				},
				SGD: {
					prefix: '$',
					suffix: '',
				},
				CAD: {
					prefix: '$',
					suffix: '',
				},
				NOK: {
					prefix: '',
					suffix: 'kr',
				},
			};
			var prices = {
				card: {
					AUD: 150,
					USD: 125,
					GBP: 90,
					EUR: 105,
					SGD: 170,
					CAD: 155,
					NOK: 1050,
				},
				metal: {
					silver: {
						AUD: 20,
						USD: 15,
						GBP: 10,
						EUR: 15,
						SGD: 20,
						CAD: 20,
						NOK: 135,
					},
					black: {
						AUD: 0,
						USD: 0,
						GBP: 0,
						EUR: 0,
						SGD: 0,
						CAD: 0,
						NOK: 0,
					},
					gold: {
						AUD: 20,
						USD: 15,
						GBP: 10,
						EUR: 15,
						SGD: 20,
						CAD: 20,
						NOK: 135,
					},
					blackgold: {
						AUD: 20,
						USD: 15,
						GBP: 10,
						EUR: 15,
						SGD: 20,
						CAD: 20,
						NOK: 135,
					},
					rose: {
						AUD: 20,
						USD: 15,
						GBP: 10,
						EUR: 15,
						SGD: 20,
						CAD: 20,
						NOK: 135,
					},
					rainbow: {
						AUD: 20,
						USD: 15,
						GBP: 10,
						EUR: 15,
						SGD: 20,
						CAD: 20,
						NOK: 135,
					},
				},
				shipping: {
					free: {
						AUD: 0,
					},
					standard: {
						AUD: 20,
						USD: 15,
						GBP: 10,
						EUR: 15,
						SGD: 20,
						CAD: 20,
						NOK: 135,
					},
					express: {
						AUD: 40,
						USD: 35,
						GBP: 25,
						EUR: 25,
						SGD: 40,
						CAD: 40,
						NOK: 270,
					},
				},
				card_care: {
					AUD: 60,
					USD: 45,
					GBP: 35,
					EUR: 40,
					SGD: 60,
					CAD: 60,
					NOK: 405,
				},
			};
			var taxes = {
				AUD: {
					percent: 10,
				},
				USD: {},
				GBP: {},
				EUR: {},
				SGD: {},
				CAD: {},
				NOK: {},
			};
			var frames_img = {
				frame_1: {
					title: 'Frame 1',
					icon: '/images/cards/background-border-1-icon.svg',
					color: {
						silver: '/images/cards/background-border-1.png',
						gold: '/images/cards/background-border-1-gold.png',
					},
				},
				frame_2: {
					title: 'Frame 2',
					icon: '/images/cards/background-border-2-icon.svg?1',
					color: {
						silver: '/images/cards/background-border-2.png?2',
						gold: '/images/cards/background-border-2-gold.png?2',
					},
				},
			};
		</script>
	</main>
	<script>
		window.template_directory_uri = "/assets";
	</script>

	<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js?ver=v3.4.1" id="jquery-3.4.1-js"></script>
	<script type="text/javascript" src="assets/js/slick.min.js?ver=v0.0.0" id="slick-js"></script>
	<script type="text/javascript" src="assets/js/jquery.touchSwipe.min.js?ver=v0.0.0" id="swipe-js"></script>
	<script type="text/javascript" src="assets/js/jquery.inputmask.js?ver=v0.0.0" id="mask-js"></script>
	<script type="text/javascript" src="assets/js/fabric.min.js?ver=v0.0.0" id="fabric-js"></script>
	<script type="text/javascript" src="assets/js/js.cookie.min.js?ver=v0.0.0" id="cookie-js"></script>
	<script type="text/javascript" src="assets/js/script.js?ver=v0.0.1664947985" id="script-js"></script>
	<script type="text/javascript" src="assets/js/order.js?ver=v0.0.1681337917" id="order-js"></script>
	<script type="text/javascript" src="assets/js/lazysizes.min.js?ver=1713152229" id="lazysizes-js"></script>
</body>

<!-- /order/ Fri, 29 Aug 2025 18:52:12 GMT -->

</html>