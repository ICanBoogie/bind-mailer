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
use ICanBoogie\Mailer\BeforeMailEvent;
use ICanBoogie\Mailer\Mailer;
use ICanBoogie\Mailer\MailEvent;
use ICanBoogie\Mailer\Message;

/**
 * Hooks
 */
class Hooks
{
	/**
	 * Returns a {@link Mailer} instance.
	 *
	 * @param Core|CoreBindings $app
	 *
	 * @return Mailer
	 */
	static public function get_mailer(Core $app)
	{
		$config = $app->configs['mailer'];
		$mailer = $config['mailer'];
		$deliverer = $config['deliverer'];

		$deliverer = class_exists($deliverer, true)
			? new $deliverer
			: $deliverer($app);

		$mailer = class_exists($mailer, true)
			? new $mailer($deliverer)
			: $mailer($deliverer);

		return $mailer;
	}

	/**
	 * Sends a message using the mailer available at `$app->mailer`. The message may be specified
	 * as an array of attributes to create a {@link Message} instance, or directly
	 * a {@link Message} instance.
	 *
	 * @param Core|CoreBindings $app
	 * @param array|Message $message A message source suitable for {@link Message::from()}.
	 * @param array $options
	 *
	 * @return mixed
	 */
	static public function mail(Core $app, $message, array $options = [])
	{
		$options += [

			'sender' => null

		];

		$mailer = $app->mailer;
		$message = Message::from($message);
		$sender = $options['sender'];

		if ($sender)
		{
			new BeforeMailEvent($sender, $message, $mailer);
		}

		$rc = $mailer($message);

		if ($sender)
		{
			new MailEvent($sender, $rc, $message, $mailer);
		}

		return $rc;
	}
}
