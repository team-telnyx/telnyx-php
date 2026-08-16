<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research\ResearchNewResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\WebSearch\Research\ResearchNewResponse\Data\ResearchResponseAsync;
use Telnyx\WebSearch\Research\ResearchNewResponse\Data\ResearchResponseSync;

/**
 * Synchronous research response (when `background` is false or unset).
 *
 * @phpstan-import-type ResearchResponseSyncShape from \Telnyx\WebSearch\Research\ResearchNewResponse\Data\ResearchResponseSync
 * @phpstan-import-type ResearchResponseAsyncShape from \Telnyx\WebSearch\Research\ResearchNewResponse\Data\ResearchResponseAsync
 *
 * @phpstan-type DataVariants = ResearchResponseSync|ResearchResponseAsync
 * @phpstan-type DataShape = DataVariants|ResearchResponseSyncShape|ResearchResponseAsyncShape
 */
final class Data implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [ResearchResponseSync::class, ResearchResponseAsync::class];
    }
}
