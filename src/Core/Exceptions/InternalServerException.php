<?php

namespace Telnyx\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Telnyx Internal Server Exception';
}
