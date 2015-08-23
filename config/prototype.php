<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\Mailer;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Core::class . '::lazy_get_mailer' => $hooks . 'get_mailer',
	ICanBoogie\Core::class . '::mail' => $hooks . 'mail',

];
