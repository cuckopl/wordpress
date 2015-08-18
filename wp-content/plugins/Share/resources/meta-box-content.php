Please fill out the information below
<p>Name: <input type="text" name="boj_mbe_name"
                value="<?php echo esc_attr($boj_mbe_name); ?>" /></p>
<p>Costume:
    <select name="boj_mbe_costume">
        <option value="vampire" <?php
        selected(
                $boj_mbe_costume, 'vampire');
        ?>>
            Vampire
        </option>
        <option value="zombie" <?php
        selected(
                $boj_mbe_costume, 'zombie');
        ?>>
            Zombie
        </option>
        <option value="smurf" <?php
        selected(
                $boj_mbe_costume, 'smurf');
        ?>>
            Smurf
        </option>
    </select>
</p>

