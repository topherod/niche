<?php
/**
 * The submenu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

//replace strings with menu ids
$menu_name = '';
$dir = array();
$slugs = ['about', 'designation', 'patient-family', 'news-events', 'contact'];

//creating dir hash object with menu id and slugs
foreach ($slugs as $menuSlug) {
  $obj = wp_get_nav_menu_object($menuSlug);
  $id = $obj->term_id;
  $dir[$id] = $menuSlug;
}

foreach ($dir as $key => $value) {
  if(page_in_menu($key)){
    $menu_name = $value;
  	$obj = wp_get_nav_menu_object($value);
    $title = $obj->name;
    $switch = true;
    break;
  }else {
  	$switch = false;
  }
}

?>

<?php if($switch == true) : ?>
	<aside class="submenu-container">
		<div class="submenu-mobile-trigger js-submenu-mobile-trigger">
      <span class="js-active-level-menu"></span><span class='plus'>+</span>
      <span class="js-top-level-menu"><?php echo $title ?> Menu</span><span class="minus">&#8211;</span>
      </div>
    <div class="submenu-wrapper">
		<div class="submenu-mobile-target js-submenu-mobile-target"><?php custom_submenu_nav($menu_name); ?></div>
    </div>
	</aside>
<?php endif ?>
<?php if ($switch == false && 100 == $post->post_parent) { ?>
  <aside class="submenu-container">
    <div class="submenu-mobile-trigger js-submenu-mobile-trigger">
      <span class="js-active-level-menu"></span><span class='plus'>+</span>
      <span class="js-top-level-menu"><?php echo $title ?> Menu</span><span class="minus">&#8211;</span>
      </div>
    <div class="submenu-wrapper">
    <div class="submenu-mobile-target js-submenu-mobile-target"><?php custom_submenu_nav('patient-family'); ?></div>
    </div>
  </aside>
<?php } elseif($switch == false) { ?>
  <aside class="submenu-container">
  </aside>
<?php } ?>