<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallForwarding;

enum ForwardingType: string
{
    case ALWAYS = 'always';

    case ON_FAILURE = 'on-failure';
}
