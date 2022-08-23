<footer class="dark-wrapper column-outer">
  <div class="rmin"></div>
  <div class="flex flex-wrap rel uppercase">
    <a href="<?=get_the_permalink(pll_get_post(3))?>">
      <div class="foot-link column-inner"><?=get_the_title(pll_get_post(3))?>
      </div>
    </a>
    <a href="<?=get_the_permalink(pll_get_post(1199))?>">
      <div class="foot-link column-inner"><?=get_the_title(pll_get_post(1199))?>
      </div>
    </a>
    <div class="foot-link column-inner">copyrights: leśna kąpiel</div>
  </div>
  <div class="r less-1050"></div>
  <div class="rmin"></div>
</footer>
<script>
const baseUrl = '<?=get_template_directory_uri()?>';
</script>
<?php wp_footer();?>
</body>

</html>
