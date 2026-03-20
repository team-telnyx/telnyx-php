<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button;

enum OtpType: string
{
    case COPY_CODE = 'COPY_CODE';

    case ONE_TAP = 'ONE_TAP';
}
