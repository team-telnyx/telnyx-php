<?php

namespace Telnyx\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Telnyx Unprocessable Entity Exception';
}
