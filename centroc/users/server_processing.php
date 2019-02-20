<?php
require_once 'init.php';
$db = DB::getInstance();
$status="Pendiente";
$reports=false;

if(isset($_GET['view'])){
    $table=Input::get('view');
}
if(isset($_GET['reports'])){
    $reports=true;
}
if ($reports) {
$results = $db->query("SELECT * FROM requests_".$table." WHERE date >= DATE_SUB(NOW(),INTERVAL 2 YEAR) ORDER BY date DESC");
}
else {
$results = $db->query("SELECT * FROM requests_".$table." WHERE status=? ORDER BY created_at",[$status]);
}

$requests = $results->results();

$i=0;
$itemCount=sizeof($requests);

foreach ($requests as &$item) {
  $date1 = new DateTime($item->date);
  $date2 = new DateTime($item->created_at);
  $item->date=date_format($date1, 'd/m/y');
  $item->created_at=date_format($date1, 'd/m/y');
  $user_result = $db->query("SELECT * FROM users WHERE id=?",[$item->user_id]);
  $user = $user_result->first();
  $item->user_id=$user->username;

      if (isset($item->category)) {
        switch ($item->category) {
          case "AAG":
            $item->category = "Actas de Asamblea General";
            break;
          case "IC":
          $item->category = "Inscripción a Culto";
            break;
          case "AC":
            $item->category = "Actas Constitutivas";
            break;
          case "VB":
            $item->category = "Visto Bueno";
            break;
          default:
            $item->category = "No Especificado";
          }
      }
      if (isset($item->people)) {
        switch ($item->people) {
          case "1":
            $item->people = "Menos de 50";
            break;
            case "2":
            $item->people = "Entre 50 y 200";
            break;
            case "3":
            $item->people = "Mas de 200";
            break;
        }
      }
      if (isset($item->place)) {
      switch ($item->place) {
        case "E":
          $item->place = "Escuela";
          break;
        case "I":
          $item->place = "Iglesia";
          break;
        case "L":
          $item->place = "Lugar de esparcimiento";
          break;
        case "C":
          $item->place = "Cancha techada";
          break;
        case "P":
          $item->place = "Piscina";
          break;
        case "O":
          $item->place = "Otro";
          break;
        }
      }

      if (isset($item->population)) {
        $item->population=str_replace(","," ",$item->population);
      }
      if (isset($item->support)) {
        $item->support=str_replace(","," ",$item->support);
      }


    switch ($item->contact) {
      case "T":
        $item->contact = "Telefonica";
        break;
      case "E":
        $item->contact = "Email";
        break;
      default:
        $item->contact = "Telefonica";
      }

      $i++;
    }

echo json_encode($requests);
