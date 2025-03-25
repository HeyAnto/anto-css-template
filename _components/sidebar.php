<?php
$nav_items = [
    'Introduction' => '/',
    'Globals' => '/globals',
    'Utilities' => '/utilities',
    'Components' => '/components',
    'Layout' => '/layout',
];

$current_route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<sidebar class="flex flex-column">
    <nav class="flex flex-column p-10 gap-5">
        <logo>
            <img src="/assets/anto-labs.svg" alt="Anto Labs">
            <p>CSS Template</p>
        </logo>

        <?php foreach ($nav_items as $name => $route): ?>
            <a class="nav-btn <?php echo $current_route === $route ? 'active' : ''; ?>" href="<?php echo $route; ?>"
                data-route>
                <?php echo $name; ?>
            </a>
        <?php endforeach; ?>
    </nav>
</sidebar>