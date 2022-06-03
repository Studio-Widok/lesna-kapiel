<?php
// apartamenty
if (has_term(pll_get_term(8), 'tags', $post)) {
  wp_redirect(get_the_permalink(pll_get_post(884)));
}
// domki
else if (has_term(pll_get_term(9), 'tags', $post)) {
  wp_redirect(get_the_permalink(pll_get_post(914)));
} else {
  wp_redirect(get_home_url());
}
exit;
