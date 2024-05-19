		</main>
			<footer class="site-footer">

				<div class="footer-one">
					<div class="footer-logo">
						<?php the_custom_logo(); ?>
					</div>
					
				</div>

				<div class="footer-two">
					<div class="footer-gegevens">
						<ul class="gegevens">
							<li class="item"><p>Gegevens</p></li>
							<li class="item"><p>Gegevens</p></li>
							<li class="item"><p>Gegevens</p></li>
						</ul>
					</div>
				</div>

				<div class="legal">
					<p class='powered'> <?php echo date("Y"); ?> || Powered by <a href='https://web-work.be' target='_blank'> WEB.WORK </a> </p>
					<span class='legal-items'>
						<?php wp_nav_menu(array('menu' => 'Legal')); ?>
						<a class='login' href='<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>'>
							<img src='/wp-content/themes/Flavus/assets/images/icons8-login-50.png'>
						</a>
					</span>
				</div>

			</footer>
		</div>

		<?php wp_footer(); ?>

	</body>
</html>
