<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bontekoe Bestellingen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="navbar">
    <h1>Bontekoe Bestellingen</h1>
</header>

<main class="container">

    <section class="form-section">
        <h2>Nieuwe Bestelling</h2>
        <form action="create.php" method="post">
            <label>Naam:
                <input type="text" name="klant_naam" required>
            </label>
            <label>Aantal aardbeien:
                <input type="number" name="aantal" required>
            </label>
            <label>Dag ophalen:
                <select name="dag" required>
                    <option value="Vrijdag">Vrijdag</option>
                    <option value="Zaterdag">Zaterdag</option>
                    <option value="Zondag">Zondag</option>
                </select>
            </label>

            <label>Tijd ophalen:
                <select name="tijd" required>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                </select>
            </label>

            <button type="submit">Bestellen</button>
        </form>
    </section>

    <section class="orders">
        <h2>Overzicht Bestellingen</h2>
        <table>
            <thead>
            <tr>
                <th>Naam</th>
                <th>Aantal</th>
                <th>Dag</th>
                <th>Tijd</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM bestellingen ORDER BY dag, tijd");

            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['klant_naam']) . "</td>";
                echo "<td>" . htmlspecialchars($row['aantal']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dag']) . "</td>";
                echo "<td>" . htmlspecialchars($row['tijd']) . "</td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'>Verwijder</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </section>

</main>
<footer class="footer">
    <p>&copy; 2025 Bontekoe Chocolade Aardbeien</p>
    <p>Hoogstraat 78, Schiedam</p>
    <p>Instagram <strong>@De Bonte Koe</strong></p>
    <p>Tiktok <strong>@De Bonte Koe</strong></p>
</footer>
</body>
</html>
