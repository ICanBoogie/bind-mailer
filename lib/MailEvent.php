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

use ICanBoogie\Event;
use ICanBoogie\Mailer\Mailer;
use ICanBoogie\Mailer\Message;

/**
 * Event class for the `<class>::mail` event.
 *
 * Third parties may use this event to the result returned by the mailer.
 */
class MailEvent extends Event
{
	/**
	 * Reference to the result returned by the mailer.
	 *
	 * @var mixed
	 */
	public $rc;

	/**
	 * Reference to the message that was sent.
	 *
	 * @var Message
	 */
	public $message;

	/**
	 * Reference to the mailer that was used to send the message.
	 *
	 * @var Mailer
	 */
	public $mailer;

	/**
	 * The event is constructed with the type `mail`.
	 *
	 * @param object $target The sender of the message.
	 * @param Message $message Reference to the message about to be sent.
	 * @param Mailer $mailer Reference to the mailer that will be used to send the message.
	 */
	public function __construct($target, &$rc, Message &$message, Mailer &$mailer)
	{
		$this->rc = &$rc;
		$this->message = &$message;
		$this->mailer = &$mailer;

		parent::__construct($target, 'mail');
	}
}
