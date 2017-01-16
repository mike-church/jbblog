<div class="slidable-sidebar">
    <i class="fa fa-times close-slidable-sidebar"></i>
    <aside class="sidebar">
        <?php
        if ( is_active_sidebar( 'slidable-sidebar' ) ) {
            dynamic_sidebar( 'slidable-sidebar' );
        }
        ?>
    </aside>
</div>