<footer class="dark-wrapper column-outer">
  <div class="rmin"></div>
  <div class="flex rel uppercase">
    <a href="<?=get_the_permalink(3)?>">
      <div class="foot-link column-inner"><?=get_the_title(3)?></div>
    </a>
    <a href="<?=get_the_permalink(813)?>">
      <div class="foot-link column-inner"><?=get_the_title(813)?></div>
    </a>
    <div class="foot-link column-inner">copyrights: leśna kąpiel</div>
  </div>
  <div class="r"></div>
</footer>
<script>
const baseUrl = '<?=get_template_directory_uri()?>';
</script>
<?php wp_footer();?>
</body>

</html>
