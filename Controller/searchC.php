<?php

// Récupération des données de la base de données
$stmt = $pdo->query('SELECT * FROM publication');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recherche d'une publication en PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        // Fonction de recherche
        $('#search').keyup(function() {
          var query = $(this).val();
          $.ajax({
            url: 'search.php',
            method: 'POST',
            data: {query: query},
            success: function(data) {
              $('#table-body').html(data);
            }
          });
        });
      });
    </script>
  </head>
  <body>
    <h1>Recherche d'une publication en PHP</h1>
    <div id="search-container">
      <label for="search">Rechercher :</label>
      <input type="text" id="search" name="search">
    </div>
    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Age</th>
        </tr>
      </thead>
      <tbody id="table-body">
        <?php foreach ($rows as $row): ?>
        <tr>
          <td><?php echo $row['nom']; ?></td>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['contenu']; ?></td>
          <td><?php echo $row['titre']; ?></td>
          <td><?php echo $row['id_user']; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>