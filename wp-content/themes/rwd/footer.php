<footer>
    	<div id="footer-widgets">
            <div class="clearfix container">
                    
                    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("footer") ) : ?>
                        <?php endif; ?>  
                    
            </div>
        </div>
        <div id="footer-bottom">
            <div class="clearfix container">
             	<p id="copyright"><?php echo get_option('footer_text'); ?></p>
            </div>
        </div>
        
    </footer>
	
    <?php wp_footer(); ?> 

</body>
</html>