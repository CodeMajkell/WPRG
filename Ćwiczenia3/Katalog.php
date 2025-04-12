<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Operacje na katalogach</title>
</head>
<body>
    <h2>Formularz operacji na katalogu</h2>

    <form method="GET">
        <label>Ścieżka (np. ./php/images/):</label><br>
        <input type="text" name="path" required><br><br>

        <label>Nazwa katalogu:</label><br>
        <input type="text" name="dirname" required><br><br>

        <label>Rodzaj operacji:</label><br>
        <select name="operation">
            <option value="read">read (domyślnie)</option>
            <option value="create">create</option>
            <option value="delete">delete</option>
        </select><br><br>

        <input type="submit" value="Wykonaj">
    </form>

    <?php
    
    function handleDirectory($path, $dirname, $operation = 'read') {
        
        if (substr($path, -1) !== '/') {
            $path .= '/';
        }

        $fullPath = $path . $dirname;

        switch ($operation) {
            case 'create':
                if (file_exists($fullPath)) {
                    return "Katalog już istnieje: <strong>$fullPath</strong>";
                }
                if (mkdir($fullPath, 0777, true)) {
                    return "✅ Katalog został utworzony: <strong>$fullPath</strong>";
                } else {
                    return "❌ Nie udało się utworzyć katalogu: <strong>$fullPath</strong>";
                }

            case 'delete':
                if (!file_exists($fullPath)) {
                    return "❌ Katalog nie istnieje: <strong>$fullPath</strong>";
                }
                if (!is_dir($fullPath)) {
                    return "❌ To nie jest katalog: <strong>$fullPath</strong>";
                }
                if (count(scandir($fullPath)) > 2) {
                    return "❌ Katalog nie jest pusty: <strong>$fullPath</strong>";
                }
                if (rmdir($fullPath)) {
                    return "✅ Katalog został usunięty: <strong>$fullPath</strong>";
                } else {
                    return "❌ Nie udało się usunąć katalogu: <strong>$fullPath</strong>";
                }

            case 'read':
            default:
                if (!file_exists($fullPath)) {
                    return "❌ Katalog nie istnieje: <strong>$fullPath</strong>";
                }
                if (!is_dir($fullPath)) {
                    return "❌ To nie jest katalog: <strong>$fullPath</strong>";
                }
                $elements = scandir($fullPath);
                $filtered = array_diff($elements, ['.', '..']);

                if (empty($filtered)) {
                    return "📁 Katalog jest pusty: <strong>$fullPath</strong>";
                } else {
                    $list = "<ul>";
                    foreach ($filtered as $el) {
                        $list .= "<li>$el</li>";
                    }
                    $list .= "</ul>";
                    return "📁 Zawartość katalogu <strong>$fullPath</strong>:<br>" . $list;
                }
        }
    }

    
    if (isset($_GET['path']) && isset($_GET['dirname'])) {
        $path = trim($_GET['path']);
        $dirname = trim($_GET['dirname']);
        $operation = $_GET['operation'] ?? 'read';

        echo "<hr>";
        echo handleDirectory($path, $dirname, $operation);
    }
    ?>
</body>
</html>