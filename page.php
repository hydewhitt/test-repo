<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package corponotch_pro
 */

get_header(); 
$enable_front_page = corponotch_pro_theme_option( 'enable_front_page' );

$query = new WP_Query(
	array(
		'post_type'              => 'page',
		'title'                  => 'Start Your Case',
		'post_status'            => 'all',
		'posts_per_page'         => 1,
		'no_found_rows'          => true,
		'ignore_sticky_posts'    => true,
		'update_post_term_cache' => false,
		'update_post_meta_cache' => false,
		'orderby'                => 'post_date ID',
		'order'                  => 'ASC',
	)
);

if ( ! empty( $query->post ) ) {
	$page_got_by_title = $query->post;
} else {
	$page_got_by_title = null;
}
$page_id = $page_got_by_title->ID;
$start_your_case_url = get_permalink( $page_id );


if ( ( is_front_page() && $enable_front_page ) || ! is_front_page() ) : ?>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<div class="single-template-wrapper wrapper page-section">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				<?php if(is_page("Contact Us")) : 
					$phone = get_template_directory_uri() . '/assets/uploads/trial-tribe-phone.png';
					$office = get_template_directory_uri() . '/assets/uploads/trial-tribe-office.png';
					$instagram = get_template_directory_uri() . '/assets/uploads/trial-tribe-instagram.png';
					$email = get_template_directory_uri() . '/assets/uploads/trial-tribe-email.png';
					$youtube = get_template_directory_uri() . '/assets/uploads/trial-tribe-youtube.png';

					?>
					<hr>
					<div class="contact-container">
						<div class="contact-element">
							<div class="contact-element-icon">
								<a href="tel:(817)400-5000">
									<img src="<?php echo esc_url( $phone ); ?>"> 	                		
								</a>
							</div>
							<div class="contact-element-label">
								<a href="tel:(817)400-5000">
									<h3 class="contact-element-label">(817) 400-5000</h3>
								</a>
								<a href="tel:(817)400-5000">
									<li class="call-or-text">Call or Text</li>
									<li class="call-or-text">Available 24 7 365</li>
								</a>
							</div>
						</div>
						<div class="contact-element">
							<div class="contact-element-icon">
								<a href="mailto:info@trialtribe.com">
								<img src="<?php echo esc_url( $email ); ?>"> 	                		
							</a>
							</div>
							<div class="contact-element-label">
								<a href="mailto:info@trialtribe.com">
									<h3 class="contact-element-label">Info@TrialTribe.com</h3>
								</a>
							</div>
						</div>
						<div class="contact-element">
							<div class="contact-element-icon">
								
								<img src="<?php echo esc_url( $office ); ?>"> 	                		
								
							</div>
							<div class="contact-element-label">
								<h3 class="contact-element-label-address">600 W. 6th St.</h3>
								<h3 class="contact-element-label-address">Ste. 400</h3>
								<h3 class="contact-element-label-address">Fort Worth, TX 76102</h3>
							</div>
						</div>
					</div>
					<hr>
					<div class="social-container">
						<h2 class="social-label">Follow Us</h2>
						<div class="social-contact-container">
							<div class="social-contact">
								<a href="https://www.instagram.com/trialtribe/" class="customize-unpreviewable">
									<span class="screen-reader-text">instagram</span>
									<img class="social-element-icon" src="<?php echo esc_url( $instagram ); ?>"> 	                		
								</a>
								<a href="https://www.instagram.com/trialtribe/" class="customize-unpreviewable">
									<h3 class="social-contact-label">trialtribe</h3>
								</a>
							</div>
							<div class="social-contact">
								<a href="https://www.youtube.com/@HydeTrialTribe/featured" class="customize-unpreviewable social-link-contact-us">
									<span class="screen-reader-text" >youtube</span>
									<img class="social-element-icon" src="<?php echo esc_url( $youtube ); ?>"> 	                		
								</a>
								<a href="https://www.youtube.com/@HydeTrialTribe/featured" class="customize-unpreviewable">
									<h3 class="social-contact-label">hydetrialtribe</h3>
								</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="state-container">
						<h2 class="states-header">Find a Personal Injury Attorney By State</h2>
						<hr class="states-break">
						<p class="states-info-text">We can Assist You In Finding Local Counsel If We Do Not Practice In Your State</p>
						<div class="states">
							<div class="state-column">
								<ul>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Alabama</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Alaska</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Arizona</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Arkansas</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> California</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Colorado</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Connecticut</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Delaware</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Florida</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Georgia</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Hawaii</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Idaho</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Illinois</li>
									</a>
								</ul>
							</div>
							<div class="state-column">
							<ul>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Indiana</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Iowa</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Kansas</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Kentucky</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Louisiana</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Maine</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Maryland</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Massachusetts</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Michigan</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Minnesota</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Mississippi</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Missouri</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Montana</li>
									</a>
								</ul>
							</div>
							<div class="state-column">
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Nebraska</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Nevada</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Hampshire</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Jersey</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Mexico</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New York</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> North Carolina</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> North Dakota</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Ohio</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Oklahoma</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Oregon</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Pennsylvania</li>
								</a>
							</div>
							<div class="state-column">
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Rhode Island</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> South Carolina</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> South Dakota</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Tennessee</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Texas</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Utah</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Vermont</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Virginia</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Washington</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> West Virginia</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Wisconsin</li>
								</a>
								<a class="state-link" href="<?php echo $start_your_case_url ?>">
								<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Wyoming</li>
								</a>
							</div>
						</div>
						<div class="states-mobile">
							<div class="state-column-mobile">
								<ul>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Alabama</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Alaska</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Arizona</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Arkansas</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> California</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Colorado</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Connecticut</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Delaware</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Florida</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Georgia</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Hawaii</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Idaho</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Illinois</li>
									</a>
								
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Indiana</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Iowa</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Kansas</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Kentucky</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Louisiana</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Maine</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Maryland</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Massachusetts</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Michigan</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Minnesota</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Mississippi</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Missouri</li>
									</a>
									
							</div>
							<div class="state-column-mobile">
								<ul>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Montana</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Nebraska</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Nevada</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Hampshire</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Jersey</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New Mexico</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> New York</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> North Carolina</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> North Dakota</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Ohio</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Oklahoma</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Oregon</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Pennsylvania</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Rhode Island</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> South Carolina</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> South Dakota</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Tennessee</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Texas</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Utah</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Vermont</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Virginia</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Washington</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> West Virginia</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Wisconsin</li>
									</a>
									<a class="state-link" href="<?php echo $start_your_case_url ?>">
									<li class="state"><svg class="icon icon-location-o " aria-hidden="true" role="img"> <use href="#icon-location-o" xlink:href="#icon-location-o"></use> </svg> Wyoming</li>
									</a>
							</div>
						</div>
					</div>	
				<?php
				endif;
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
<?php endif;

get_footer();
