<?php
$errors = [];
$sucess = "";
$get_user_id = $user->data()->id;
// if user clicks the solicitar button in legals_form page
if (isset($_POST['request_legals'])) {
	createRequestLegals($_POST);
}
if (isset($_POST['request_accounting'])) {
	createRequestAccounting($_POST);
}
if (isset($_POST['request_psychological'])) {
	createRequestPsychological($_POST);
}
if (isset($_POST['request_recreation'])) {
	createRequestRecreation($_POST);
}
if (isset($_POST['request_events'])) {
	createRequestEvents($_POST);
}



function createRequestLegals($request_values){
	global $get_user_id, $errors, $sucess;
  $db = DB::getInstance();
	$name = strtolower($request_values['name']);
	$email = strtolower($request_values['email']);
	$date = $request_values['date_legals'];
	$tlf = $request_values['tlf'];
	$contact = $request_values['contact'];
  $message = strtolower($request_values['message']);
  $category = $request_values['categories'];


	// form validation: ensure that the form is correctly filled
	if (empty($name)) { array_push($errors, "Uhmm...Vamos a necesitar su nombre."); }
	if (empty($email)) { array_push($errors, "Oops.. El email esta faltando"); }
	if (empty($tlf)) { array_push($errors, "Oops.. El telefono esta faltando"); }
	if (empty($date)) { array_push($errors, "* La fecha la necesitamos saber");}
	if (empty($message)) { array_push($errors, "uh-oh Olvidaste escribir el mensaje"); }
	if (empty($contact)) { array_push($errors, "uh-oh Olvidaste escribir por cual medio le gustaria ser contactado"); }

	$regex = '/^\d{4}[-]{1}\d{7}$/';
	if (!preg_match($regex, $tlf)) {
		array_push($errors, "El telefono no esta en el formato correcto. Ej: 0412-1234567");
	}
	// register user if there are no errors in the form
	if (count($errors) == 0) {
    $query = $db->query("INSERT INTO requests_legals (name, email, date, tlf, contact, category, message, status, user_id, created_at, updated_at)
				  VALUES('$name', '$email', '$date', '$tlf', '$contact', '$category', '$message', 'Pendiente',$get_user_id, now(), now())");
    $sucess = "Se ha enviado exitosamente su solicitud para Asesoria Legal, en breve le responderemos.";
	}
}

function createRequestAccounting($request_values){
	global $get_user_id, $errors, $sucess;
  $db = DB::getInstance();
	$name = strtolower($request_values['name']);
	$email = strtolower($request_values['email']);
	$date = $request_values['date_legals'];
	$tlf = $request_values['tlf'];
	$contact = $request_values['contact'];
  $message = strtolower($request_values['message']);


	// form validation: ensure that the form is correctly filled
	if (empty($name)) { array_push($errors, "Uhmm...Vamos a necesitar su nombre."); }
	if (empty($email)) { array_push($errors, "Oops.. El email esta faltando"); }
	if (empty($tlf)) { array_push($errors, "Oops.. El telefono esta faltando"); }
	if (empty($date)) { array_push($errors, "* La fecha la necesitamos saber");}
	if (empty($message)) { array_push($errors, "uh-oh Olvidaste escribir el mensaje"); }
	if (empty($contact)) { array_push($errors, "uh-oh Olvidaste escribir por cual medio le gustaria ser contactado"); }

	$regex = '/^\d{4}[-]{1}\d{7}$/';
	if (!preg_match($regex, $tlf)) {
		array_push($errors, "El telefono no esta en el formato correcto. Ej: 0412-1234567");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
    $query = $db->query("INSERT INTO requests_accounting (name, email, date, tlf, contact, message, status, user_id, created_at, updated_at)
				  VALUES('$name', '$email', '$date', '$tlf', '$contact', '$message', 'Pendiente',$get_user_id, now(), now())");
    $sucess = "Se ha enviado exitosamente su solicitud para Asesoria Contable, en breve le responderemos.";
	}
}

function createRequestPsychological($request_values){
	global $get_user_id, $errors, $sucess;
  $db = DB::getInstance();
	$name = strtolower($request_values['name']);
	$email = strtolower($request_values['email']);
	$date = $request_values['date_legals'];
	$tlf = $request_values['tlf'];
	$contact = $request_values['contact'];
  $message = strtolower($request_values['message']);


	// form validation: ensure that the form is correctly filled
	if (empty($name)) { array_push($errors, "Uhmm...Vamos a necesitar su nombre."); }
	if (empty($email)) { array_push($errors, "Oops.. El email esta faltando"); }
	if (empty($tlf)) { array_push($errors, "Oops.. El telefono esta faltando"); }
	if (empty($date)) { array_push($errors, "* La fecha la necesitamos saber");}
	if (empty($message)) { array_push($errors, "uh-oh Olvidaste escribir el mensaje"); }
	if (empty($contact)) { array_push($errors, "uh-oh Olvidaste escribir por cual medio le gustaria ser contactado"); }

	$regex = '/^\d{4}[-]{1}\d{7}$/';
	if (!preg_match($regex, $tlf)) {
		array_push($errors, "El telefono no esta en el formato correcto. Ej: 0412-1234567");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
    $query = $db->query("INSERT INTO requests_psychological (name, email, date, tlf, contact, message, status, user_id, created_at, updated_at)
				  VALUES('$name', '$email', '$date', '$tlf', '$contact', '$message', 'Pendiente',$get_user_id, now(), now())");
    $sucess = "Se ha enviado exitosamente su solicitud para Consulta Psicologica, en breve le responderemos.";
	}
}

function createRequestRecreation($request_values){
	global $get_user_id, $errors, $sucess;
  $db = DB::getInstance();
	$name = strtolower($request_values['name']);
	$email = strtolower($request_values['email']);
	$date = $request_values['date_legals'];
	$tlf = $request_values['tlf'];
	$contact = $request_values['contact'];
	$place = $request_values['place'];
	$schedule = $request_values['schedule'];
	$population = implode(",", $request_values['population']);
	$people = $request_values['people'];

  $message = strtolower($request_values['message']);


	// form validation: ensure that the form is correctly filled
	if (empty($name)) { array_push($errors, "Uhmm...Vamos a necesitar su nombre."); }
	if (empty($email)) { array_push($errors, "Oops.. El email esta faltando"); }
	if (empty($tlf)) { array_push($errors, "Oops.. El telefono esta faltando"); }
	if (empty($date)) { array_push($errors, "* La fecha la necesitamos saber");}
	if (empty($place)) { array_push($errors, "Oops.. El lugar esta faltando"); }
	if (empty($schedule)) { array_push($errors, "Oops.. El horario esta faltando"); }
	if (empty($population)) { array_push($errors, "Oops.. La poblacion esta faltando"); }
	if (empty($people)) { array_push($errors, "Oops.. La cantidad de personas esta faltando"); }
	if (empty($message)) { array_push($errors, "uh-oh Olvidaste escribir el mensaje"); }
	if (empty($contact)) { array_push($errors, "uh-oh Olvidaste escribir por cual medio le gustaria ser contactado"); }

	$regex = '/^\d{4}[-]{1}\d{7}$/';
	if (!preg_match($regex, $tlf)) {
		array_push($errors, "El telefono no esta en el formato correcto. Ej: 0412-1234567");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
    $query = $db->query("INSERT INTO requests_recreation (name, email, date, tlf, place, schedule, population, people, contact, message, status, user_id, created_at, updated_at)
				  VALUES('$name', '$email', '$date', '$tlf', '$place', '$schedule', '$population', '$people', '$contact', '$message', 'Pendiente',$get_user_id, now(), now())");
    $sucess = "Se ha enviado exitosamente su solicitud de Recreadores, en breve le responderemos.";
	}
}

function createRequestEvents($request_values){
	global $get_user_id, $errors, $sucess;
  $db = DB::getInstance();
	$name = strtolower($request_values['name']);
	$email = strtolower($request_values['email']);
	$date = $request_values['date_legals'];
	$tlf = $request_values['tlf'];
	$contact = $request_values['contact'];
	$place = $request_values['place'];
	$schedule = $request_values['schedule'];
	$population = implode(",", $request_values['population']);
	$support = implode(",", $request_values['support']);
	$people = $request_values['people'];

  $message = strtolower($request_values['message']);


	// form validation: ensure that the form is correctly filled
	if (empty($name)) { array_push($errors, "Uhmm...Vamos a necesitar su nombre."); }
	if (empty($email)) { array_push($errors, "Oops.. El email esta faltando"); }
	if (empty($tlf)) { array_push($errors, "Oops.. El telefono esta faltando"); }
	if (empty($date)) { array_push($errors, "* La fecha la necesitamos saber");}
	if (empty($place)) { array_push($errors, "Oops.. El lugar esta faltando"); }
	if (empty($schedule)) { array_push($errors, "Oops.. El horario esta faltando"); }
	if (empty($population)) { array_push($errors, "Oops.. La poblacion esta faltando"); }
	if (empty($support)) { array_push($errors, "Oops.. El Apoyo esta faltando"); }
	if (empty($people)) { array_push($errors, "Oops.. La cantidad de personas esta faltando"); }
	if (empty($message)) { array_push($errors, "uh-oh Olvidaste escribir el mensaje"); }
	if (empty($contact)) { array_push($errors, "uh-oh Olvidaste escribir por cual medio le gustaria ser contactado"); }

	$regex = '/^\d{4}[-]{1}\d{7}$/';
	if (!preg_match($regex, $tlf)) {
		array_push($errors, "El telefono no esta en el formato correcto. Ej: 0412-1234567");
	} 

	// register user if there are no errors in the form
	if (count($errors) == 0) {
    $query = $db->query("INSERT INTO requests_events (name, email, date, tlf, place, schedule, population, people, support, contact, message, status, user_id, created_at, updated_at)
				  VALUES('$name', '$email', '$date', '$tlf', '$place', '$schedule', '$population', '$people', '$support', '$contact', '$message', 'Pendiente',$get_user_id, now(), now())");
    $sucess = "Se ha enviado exitosamente su solicitud de Logistica y Eventos, en breve le responderemos.";
	}
}
