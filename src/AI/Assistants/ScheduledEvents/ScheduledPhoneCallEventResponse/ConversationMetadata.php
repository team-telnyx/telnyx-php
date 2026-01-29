<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type ConversationMetadataVariants = string|int|bool
 * @phpstan-type ConversationMetadataShape = ConversationMetadataVariants
 */
final class ConversationMetadata implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'int', 'bool'];
    }
}
