<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateButtonsComponent\Button;

enum Type: string
{
    case URL = 'URL';

    case PHONE_NUMBER = 'PHONE_NUMBER';

    case QUICK_REPLY = 'QUICK_REPLY';

    case OTP = 'OTP';

    case COPY_CODE = 'COPY_CODE';

    case FLOW = 'FLOW';
}
