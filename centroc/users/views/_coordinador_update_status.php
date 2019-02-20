<?php

if(isset($_GET['view'])){
    $page=Input::get('view');
}
if(isset($_POST['cancel_request'])){
    $id=Input::get('id-cancel');
    $page=Input::get('view');
    $mail=Input::get('mail');
    $table='requests_'.$page;
    if ($mail=="true") {
      $body=Input::get('message-email');
      $result = $db->query("SELECT * FROM ".$table." WHERE id=?",[$id]);
      $subject="Solicitud Rechazada";
      $to = $result->first();
      $mail_result=email($to->email,$subject,$body);
      if($mail_result){
            echo '<div class="alert alert-success" role="alert">Mail sent successfully</div><br/>';
      }else{
            echo '<div class="alert alert-danger" role="alert">Mail ERROR</div><br/>';
      }
      $db->update($table,$id,['status'=>'Rechazado']);
    }

}

if(isset($_GET['id'])){
    $id=Input::get('id');
    $action=Input::get('action');
    if($action=='cancel'){
        $db->update('requests_legals',$id,['status'=>'Rechazado']);
    }
    if($action=='approve'){
        $db->update('requests_legals',$id,['status'=>'Procesado']);
    }

}
