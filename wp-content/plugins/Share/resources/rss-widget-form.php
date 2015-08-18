<?php echo 'test'; ?>

<p>Title: <input class="widefat" 
                 name="<?php echo $widget->get_field_name('title');?>"
                 type="text" 
                 value="<?php echo esc_attr($title); ?>"/>
</p>
<p>RSS Feed: <input class="widefat" name="<?php echo $widget->get_field_name('rss_feed'); ?>"
                    type="text" value="<?php echo esc_attr($rss_feed); ?>"/></p>
<p>Items to Display:
    <select name="<?php echo $widget->get_field_name('rss_items'); ?>">
        <option value="1" <?php selected($rss_items, 1); ?>>1</option>
        <option value="2" <?php selected($rss_items, 2); ?> >2</option>
        <option value="3" <?php selected($rss_items, 3); ?> >3</option>
        <option value="4" <?php selected($rss_items, 4); ?>>4</option> 
        <option value="5" <?php selected($rss_items, 5); ?>>5</option>
    </select>
</p>
<p>Show Date?: <input name="<?php echo $widget->get_field_name('rss_date'); ?>"type="checkbox" <?php checked($rss_date, 'on');?>/></p>
<p>Show Summary?: <input name="<?php echo $widget->get_field_name('rss_summary');?>" type="checkbox" <?php checked($rss_summary, 'on');?>/></p>
