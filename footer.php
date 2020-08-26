
 <?php $footer = get_field('footer', 2); ?>
    <?php get_part('footer-video', array('source' => $footer['video'], 'text' => $footer['text']));?>

<?php wp_footer();?>
</body>

</html>
