		</div>
	</div>
</div>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
					$socialnetworks = array(
						'social_facebook' => 'fa-facebook',
						'social_twitter' => 'fa-twitter',
						'social_linkedin' => 'fa-linkedin',
						'social_behance' => 'fa-behance',
						'social_instagram' => 'fa-instagram',
					);
					$socialnetworks_html = '';
					foreach($socialnetworks as $v => $i):
						
						if ($link = get_field($v, 'options')):
							$socialnetworks_html .= '
							<li><a href="'.$link.'" target="_socialnetworks">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa '.$i.' fa-stack-1x fa-inverse"></i>
								</span>
							</a></li>
							';
						endif; 
					endforeach;
					
					if (!empty($socialnetworks_html)):
						echo '<ul class="social-network">'.$socialnetworks_html.'</ul>';
					endif; 
				?>
				  
				<?php
					$copyright_text = 'Copyright &copy; Your Website '.date('Y');
					if ($copyright = get_field('footer_copyright','options')):
						$copyright_text = $copyright;
					endif; 
				?>
				<p class="copyright text-muted"><?php echo $copyright_text; ?></p>
			</div>
		</div>
	</div>
</footer>

</div><!-- #content -->
 
<?php wp_footer(); ?>

</body>
</html>