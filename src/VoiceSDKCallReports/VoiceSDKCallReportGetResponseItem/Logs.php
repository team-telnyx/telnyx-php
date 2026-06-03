<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs\Entries;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs\UnionMember0;

/**
 * Raw logs payload emitted by the Voice SDK and stored without normalization. Live responses commonly return an array of log entries, but object-shaped log payloads are also allowed for compatibility.
 *
 * @phpstan-import-type UnionMember0Shape from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs\UnionMember0
 * @phpstan-import-type EntriesShape from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportGetResponseItem\Logs\Entries
 *
 * @phpstan-type LogsVariants = list<UnionMember0>|Entries
 * @phpstan-type LogsShape = LogsVariants|list<UnionMember0Shape>|EntriesShape
 */
final class Logs implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new ListOf(UnionMember0::class), Entries::class];
    }
}
