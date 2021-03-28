<?php

return [
  // Widget Body
  'jstitle'    => 'Traslado via Jumpseat',
  'jsdropdown' => 'Por favor seleccione su destino',
  'jsbutton'   => 'Viajar',
  'iconfree'   => 'Viaje gratuito',
  'iconfixed'  => 'Precio del billete fijo:',
  'iconauto'   => 'Cálculo automático del precio del billete',
  // Success Response Messages
  'successfree'  => 'Traslado completado, estás ahora en: :location .',
  'successfixed' => 'Traslado completado, estás ahora en: :location . El coste del billete fue de: :price',
  'successauto'  => 'Traslado completado, estás ahora en: :location . El coste del billete calculado fue de: :price para :distance nm',
  // Error Response Messages
  'errordest'  => '¡No es posible trasladarse sin un destino válido!',
  'errorfunds' => '¡No es posible trasladarse, no hay fondos suficientes! Necesitas al menos: :price',
];
