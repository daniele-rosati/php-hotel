<?php 
  $hotels = [

      [
          'name' => 'Hotel Belvedere',
          'description' => 'Hotel Belvedere Descrizione',
          'parking' => true,
          'vote' => 4,
          'distance_to_center' => 10.4
      ],
      [
          'name' => 'Hotel Futuro',
          'description' => 'Hotel Futuro Descrizione',
          'parking' => true,
          'vote' => 2,
          'distance_to_center' => 2
      ],
      [
          'name' => 'Hotel Rivamare',
          'description' => 'Hotel Rivamare Descrizione',
          'parking' => false,
          'vote' => 1,
          'distance_to_center' => 1
      ],
      [
          'name' => 'Hotel Bellavista',
          'description' => 'Hotel Bellavista Descrizione',
          'parking' => false,
          'vote' => 5,
          'distance_to_center' => 5.5
      ],
      [
          'name' => 'Hotel Milano',
          'description' => 'Hotel Milano Descrizione',
          'parking' => true,
          'vote' => 2,
          'distance_to_center' => 50
      ],

  ];

  // se il searchPark è abilitato modifico il mio array hotels
  if (isset($_GET["searchPark"])) {
    foreach($hotels as $key => $value){
      // se ha il parcheggio lo metto nel mio array
      if ($value["parking"]) {
        $newArray[] = $value;
      }
    }
    $hotels = $newArray;
  }

  $searchVote = isset($_GET["searchVote"]) ? $_GET["searchVote"] : "0";

    // resetto il mio array temporaneo
    $newArray = [];


    foreach($hotels as $key => $value){
        // se ha un voto maggiore o uguale al mio searchVote
        if ($value["vote"] >=  $searchVote) {
          $newArray[] = $value;
        } else {
            // se non ha un voto maggio o uguale allora non compare
            $newArray[] = 0;
        }
      }
      $hotels = $newArray;
      
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>PHP Hotel</title>
</head>
<body>
  <div class="container">
    
    <h1>PHP Hotel</h1>

    <form action="index.php" method="get">
      <div class="row">
        <div class="col-auto d-flex align-items-center">
          <label  for="inputVote" >Vote</label>
          <input  type="number" name="searchVote" id="inputVote" min="1" max="5">
        </div>
        
        <div class="col-auto">
          <button type="submit">Filtra</button>
        </div>
      </div>

    </form>
  
    <table class="table">
      <thead>
        <tr>
          <th> Name </th>
          <th> Description </th>
          <th> Parking </th>
          <th> Vote </th>
          <th> Distance to center </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($hotels as $hotel):?>
        <tr>
          <td><?php echo $hotel["name"] ?></td>
          <td><?php echo $hotel["description"] ?></td>
          <td><?php echo $hotel["parking"] ? "Si" : "No" ?></td>
          <td><?php echo $hotel["vote"] ?></td>
          <td><?php echo $hotel["distance_to_center"] ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>
</body>
</html>