<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReport;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReport\Stats\VoiceSDKCallReportStatsObject;

/**
 * Raw stats payload emitted by the Voice SDK and stored without normalization. The exact shape can vary by SDK platform and version. Live responses commonly return an array of interval snapshots, but object-shaped stats payloads are also allowed for compatibility.
 *
 * @phpstan-import-type VoiceSDKCallReportStatsObjectShape from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReport\Stats\VoiceSDKCallReportStatsObject
 *
 * @phpstan-type StatsVariants = list<array<string,mixed>>|VoiceSDKCallReportStatsObject
 * @phpstan-type StatsShape = StatsVariants|VoiceSDKCallReportStatsObjectShape
 */
final class Stats implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            new ListOf(new MapOf('mixed')), VoiceSDKCallReportStatsObject::class,
        ];
    }
}
