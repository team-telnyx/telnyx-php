<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallGetResponse;

/**
 * The value of the answering machine detection result, if this feature was enabled for the call.
 */
enum AnsweredBy: string
{
    case HUMAN = 'human';

    case MACHINE = 'machine';

    case NOT_SURE = 'not_sure';
}
