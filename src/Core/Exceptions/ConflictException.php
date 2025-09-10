<?php

namespace Telnyx\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Telnyx Conflict Exception';
}
