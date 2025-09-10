<?php

namespace Telnyx\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Telnyx Authentication Exception';
}
