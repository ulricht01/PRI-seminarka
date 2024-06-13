<?php
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';
require INC . '/db.php';

$roomNumber = isset($_GET['roomNumber']) ? $_GET['roomNumber'] : null;

$data = getInfoPokoje($conn, $roomNumber);

if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $cleaned = isset($_POST['cleaned']) ? 'Y' : 'N';
    $occupied = isset($_POST['occupied']) ? 'Y' : 'N';
    updateInfoRoom($conn, $cleaned, $occupied, $roomNumber);
    $data = getInfoPokoje($conn, $roomNumber);
}

?>
<body>
<div class="wrapper">
    <?php if ($data): ?>
        <div class="room-details">
            <div class="room-number">Pokoj: <?php echo htmlspecialchars($data[0]['cislo_pokoje']); ?></div>
            <div class="floor">Patro: <?php echo htmlspecialchars($data[0]['patro']); ?></div>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="cleaned">
                        <input type="checkbox" id="cleaned" name="cleaned" <?php echo $data[0]['uklizeno'] == 'Y' ? 'checked' : ''; ?>>
                        Uklizeno
                    </label>
                </div>
                <div class="form-group">
                    <label for="occupied">
                        <input type="checkbox" id="occupied" name="occupied" <?php echo $data[0]['obsazeno'] == 'Y' ? 'checked' : ''; ?>>
                        Obsazeno
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit">Uložit</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="error">Pokoj nenalezen.</div>
    <?php endif; ?>
</div>
</body>
</html>

<?php require INC . '/end.php'; ?>