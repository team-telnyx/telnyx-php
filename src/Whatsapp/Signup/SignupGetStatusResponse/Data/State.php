<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Signup\SignupGetStatusResponse\Data;

/**
 * Current provisioning step, or the step that failed. `REGISTER_PHONE_NUMBER` is skipped for coexistence signups.
 */
enum State: string
{
    case SUBSCRIBE_WEBHOOKS = 'SUBSCRIBE_WEBHOOKS';

    case ASSIGNED_USERS = 'ASSIGNED_USERS';

    case SHARE_CREDIT_LINE = 'SHARE_CREDIT_LINE';

    case REGISTER_PHONE_NUMBER = 'REGISTER_PHONE_NUMBER';

    case ADD_WABA_TO_DB = 'ADD_WABA_TO_DB';

    case ADD_PHONE_NUMBERS_TO_DB = 'ADD_PHONE_NUMBERS_TO_DB';

    case COMPLETE = 'COMPLETE';
}
