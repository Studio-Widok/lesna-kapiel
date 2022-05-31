<?php
// apartamenty
if (is_tax('tags', pll_get_term(8))) {
  wp_redirect(get_the_permalink(pll_get_post(884)));
}
// domki
else if (is_tax('tags', pll_get_term(9))) {
  wp_redirect(get_the_permalink(pll_get_post(914)));
} else {
  wp_redirect(get_home_url());
}
exit;
