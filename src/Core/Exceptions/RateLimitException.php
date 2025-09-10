<?php

namespace Telnyx\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Telnyx Rate Limit Exception';
}
