<?php
$nav_items = [
    'Introduction' => 'index.php',
    'Globals' => 'pages/globals.php',
    'Utilities' => 'pages/utilities.php',
    'Components' => 'pages/components.php',
    'Layout' => 'pages/layout.php',
];

$current_page = basename($_SERVER['PHP_SELF']);
?>

<sidebar class="flex flex-column">
    <nav class="flex flex-column p-10 gap-5">
        <logo>
            <img src="/assets/anto-labs.svg" alt="Anto Labs">
            <p>CSS Template</p>
        </logo>

        <?php foreach ($nav_items as $name => $url): ?>
            <a class="nav-btn <?php echo $current_page == basename($url) ? 'active' : ''; ?>" href="/<?php echo $url; ?>">
                <?php echo $name; ?>
            </a>
        <?php endforeach; ?>

        <a class="nav-btn nav-download flex align-center justify-center gap-3" href="/pages/download.php">
            <img src="/assets/icons/icon-download.svg" alt="Télécharger">
            Télécharger
        </a>
    </nav>
</sidebar>