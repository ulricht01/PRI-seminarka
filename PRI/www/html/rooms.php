<?php
require '/var/www/prolog.php'; // Zahrnutí prologu
require INC . '/begin.php';
require INC . '/db.php';
$data = infoPokoje($conn);
$i = 1;
?>
<body>
<div class="wrapper">
    <div class="grid-container">
        <?php foreach ($data as $item): ?>
        <a class="grid-item" href="room.php?roomNumber=<?php echo $i++ ?>">
            <div class="room-number">Pokoj:<?php echo htmlspecialchars($item['cislo_pokoje']); ?></div>
            <div class="floor">Patro:<?php echo htmlspecialchars($item['patro']); ?></div>
            <div class="status">
                <div class="cleaned">Uklizeno:<?php if ($item['uklizeno'] == 'Y')
                    {
                        echo "Ano";
                    }
                    else 
                    {
                        echo "Ne";
                    }?>
                </div>
                <div class="occupied">Obsazeno:<?php if($item['obsazeno'] == 'Y')
                    {
                        echo "Ano";
                    }
                    else
                    {
                        echo "Ne";
                    }?>
                </div>  
            </div>
        </a>
        <?php endforeach; ?>
    </di>
</div>  
</body>
</html>


<?php require INC . '/end.php';