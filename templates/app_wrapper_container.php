<?php
/**
 * Template for the demonstration app wrapper
 * Template parameters available
 * @param string $component Whatever template is used for the component(s) in this app.\
 */
$component = empty($component) ? '' : $component;
?>
<div id="app">
    <?php echo $component; ?>
</div>