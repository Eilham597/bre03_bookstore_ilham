<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auteurs et Livres</title>
</head>

<body>
    <h1>Auteurs et Livres</h1>

    <!-- Formulaire pour filtrer par auteur -->
    <form method="GET" action="">
        <label for="author">Filtrer par auteur :</label>
        <select id="author" name="author">
            <option value="">Tous les auteurs</option>
            <?php foreach ($authors as $author): ?>
                <option value="<?= htmlspecialchars($author->getId()) ?>" <?= isset($_GET['author']) && $_GET['author'] == $author->getId() ? 'selected' : '' ?>>
                    <?= htmlspecialchars($author->getFullName()) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filtrer</button>
    </form>

    <!-- Affichage des livres si un auteur est sélectionné -->
    <?php if (!empty($books)): ?>
        <h2>Livres de <?= htmlspecialchars($authors[array_search($_GET['author'], array_column($authors, 'id'))]->getFullName()) ?> :</h2>
        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Résumé</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= htmlspecialchars($book->getId()) ?></td>
                        <td><?= htmlspecialchars($book->getTitle()) ?></td>
                        <td><?= htmlspecialchars($authors[array_search($book->getAuthorId(), array_column($authors, 'id'))]->getFullName()) ?></td>
                        <td><?= htmlspecialchars($book->getExcerpt()) ?></td>
                        <td><?= htmlspecialchars($book->getPrice()) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>

</html>