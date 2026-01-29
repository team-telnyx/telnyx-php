<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type ScheduledPhoneCallEventResponseShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse
 * @phpstan-import-type ScheduledSMSEventResponseShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse
 *
 * @phpstan-type ScheduledEventListResponseVariants = ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse
 * @phpstan-type ScheduledEventListResponseShape = ScheduledEventListResponseVariants|ScheduledPhoneCallEventResponseShape|ScheduledSMSEventResponseShape
 */
final class ScheduledEventListResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            ScheduledPhoneCallEventResponse::class, ScheduledSMSEventResponse::class,
        ];
    }
}
