<?php

namespace Telnyx\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Telnyx Permission Denied Exception';
}
