<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Unused Tags</h2>


    <?php if ($UnusedTags): ?>
        <p>You currently have <?php count($UnusedTags) ?> unused
            tags:</p>
        <ol>
            <?php foreach ($UnusedTags as $tag): ?>
<!--                $id = $tag->term_id;
                $name = esc_attr( $tag->name );-->
                <?php $delete_url= add_query_arg(
                array($actionName=>'delete','id'=>$tag->term_id) );
                $nonced_url= wp_nonce_url( $delete_url,
                $actionName.$id ); ?>

                <li>
                    <form action="" method="post">
                        <?php wp_nonce_field('ala'); ?>
                        <input type="hidden" name="<?php echo $actionName?>" value="rename" />
                        <input type="hidden" name="id" value="<?php echo $tag->term_id ?>" />
                        <input type="text" name="name" value="<?php echo $tag->name; ?>" />
                        <input type="submit" value="Rename" /> or
                        <a href="<?php echo $nonced_url; ?>">delete</a> this tag
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You have no unused tags.</p>
        <?php endif; ?>
    </ol>
</div>