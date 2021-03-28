<?php

return [
  // Widget Body
  'jstitle'    => 'JumpSeat Travel',
  'jsdropdown' => 'Please select your destination',
  'jsbutton'   => 'Travel',
  'iconfree'   => 'Free Travel',
  'iconfixed'  => 'Fixed Ticket Price:',
  'iconauto'   => 'Automatic Ticket Price Calculation',
  // Success Response Messages
  'successfree'  => 'JumpSeat travel completed, you are at :location now.',
  'successfixed' => 'JumpSeat travel completed, you are at :location now. Ticket price was :price',
  'successauto'  => 'JumpSeat travel completed, you are at :location now. Calculated ticket price was :price for :distance nm',
  // Error Response Messages
  'errordest'    => 'JumpSeat travel not possible without a valid destination!',
  'errorfunds'   => 'JumpSeat travel not possible, not enough funds! You need at least :price',
];
