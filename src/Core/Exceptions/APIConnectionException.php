<?php

namespace Telnyx\Core\Exceptions;

class APIConnectionException extends APIException
{
    /** @var string */
    protected const DESC = 'Telnyx API Connection Error';
}
