<?php

namespace Telnyx\Exception;

/**
 * IdempotencyException is thrown in cases where an idempotency key was used
 * improperly.
 *
 * @package Telnyx\Exception
 */
class IdempotencyException extends ApiErrorException
{
}
