<?php
/**
* Recibe por método POST los ids del servicio y el conductor para cambiar los estados en base de datos
* y posteriormente envía una notificación al usuario. Devuelve un objeto tipo json con la respuesta
*
* @return (json Object)
*/
public function post_confirm()	{

	$id = Input::get('service_id');
	$driverid = Input::get('driver_id');
	$servicio = Service::find($id);

	if ($servicio == NULL)	{
		return Response::json(array('error' => '3'));
	}
	if ($servicio->status_id == '6') {
		return Response::json(array('error' => '2'));
	}
	if($servicio->driver_id != NULL || $ $servicio->status_id != '1') {
		return Response::json(array('error' => '1'));
	}

	$servicio = Service::update($id, array(
			'driver_id' => $driverid,
			'status_id' => '2'
		));

	Driver::update($driverid, array(
		"available" => '0'
	));

	$driverTmp = Driver::find($driverid);
	Service::update($id, array(
		'car_id' => $driverTmp->car_id
	));

	$pushMessage = 'Tu servicio ha sido confirmado!';

	$servicio = Service::find($id);
	$push = Push::make();

	if ($servicio->user->uuid != '') {
		if ($servicio->user->type == '1') {//iPhone
			$result = $push->ios($servicio->user->uuid, $pushMessage, 1, 'honk.wav', 'Open', array('serviceId' => $servicio->id));
		} else {//Android
			$result = $push->android2($servicio->user->uuid, $pushMessage, 1, 'default', 'Open', array('serviceId' => $servicio->id));
		}
	}
	return Response::json(array('error' => '0'));
}
?>