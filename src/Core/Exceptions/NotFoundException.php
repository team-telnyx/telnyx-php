<?php

namespace Telnyx\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Telnyx Not Found Exception';
}
