<?php

declare(strict_types=1);

namespace Telnyx\AzureVoiceSettings;

/**
 * Audio effect to apply.
 */
enum Effect: string
{
    case EQ_CAR = 'eq_car';

    case EQ_TELECOMHP8K = 'eq_telecomhp8k';
}
