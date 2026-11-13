<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationListParams\Filter;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\OutboundVoiceProfileID\Eq;

/**
 * If present, only applications associated with the given outbound voice profile will be returned. Matching is exact.
 *
 * @phpstan-import-type EqShape from \Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\OutboundVoiceProfileID\Eq
 *
 * @phpstan-type OutboundVoiceProfileIDVariants = string|Eq
 * @phpstan-type OutboundVoiceProfileIDShape = OutboundVoiceProfileIDVariants|EqShape
 */
final class OutboundVoiceProfileID implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', Eq::class];
    }
}
