<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallForwarding;

enum ForwardingType: string
{
    case ALWAYS = 'always';

    case ON_FAILURE = 'on-failure';
}
