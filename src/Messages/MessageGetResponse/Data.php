<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload;
use Telnyx\Messages\OutboundMessagePayload;

final class Data implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [OutboundMessagePayload::class, InboundMessagePayload::class];
    }
}
