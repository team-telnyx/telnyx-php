<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Stats\UnionMember1;

/**
 * Raw stats payload emitted by the Voice SDK and stored without normalization. The exact shape can vary by SDK platform and version. Live responses commonly return an array of interval snapshots, but object-shaped stats payloads are also allowed for compatibility.
 *
 * @phpstan-import-type UnionMember1Shape from \Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListResponse\Stats\UnionMember1
 *
 * @phpstan-type StatsVariants = list<array<string,mixed>>|UnionMember1
 * @phpstan-type StatsShape = StatsVariants|UnionMember1Shape
 */
final class Stats implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [new ListOf(new MapOf('mixed')), UnionMember1::class];
    }
}
