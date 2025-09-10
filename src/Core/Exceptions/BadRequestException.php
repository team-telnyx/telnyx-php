<?php

namespace Telnyx\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Telnyx Bad Request Exception';
}
