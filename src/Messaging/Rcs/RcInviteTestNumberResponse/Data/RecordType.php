<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\RcInviteTestNumberResponse\Data;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case RCS_TEST_NUMBER_INVITE = 'rcs.test_number_invite';
}
