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

use ICanBoogie\Core;
use ICanBoogie\Mailer\Mailer;

class HooksTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Core|CoreBindings
	 */
	static private $app;

	static public function setupBeforeClass()
	{
		self::$app = \ICanBoogie\app();
	}

	public function test_get_mailer()
	{
		$this->assertInstanceOf(Mailer::class, self::$app->mailer);
	}
}
