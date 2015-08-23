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

use ICanBoogie\Mailer\Mailer;

/**
 * {@link \ICanBoogie\Core} prototype bindings.
 *
 * @method bool mail(mixed $message_or_attributes, array $options = [])
 *     Sends a message using the mailer available at `$app->mailer`. The message may be specified
 *     as an array of attributes to create a {@link Message} instance, or directly
 *     a {@link Message} instance.
 *
 * @property Mailer $mailer
 */
trait CoreBindings
{

}
