<h2><?php echo $title; ?></h2>

<ul>
<?php foreach ($contact_list as $item): ?>

    <li>
        <?php echo $item->naam; ?>
        <?php echo $item->email; ?>
    </li>
<?php endforeach; ?>
</ul>