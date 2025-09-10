<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\AmdDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\ConferenceDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\ConferenceParticipantDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MediaStorageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\SimCardUsageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\VerifyDetailRecord;

/**
 * An object following one of the schemas published in https://developers.telnyx.com/docs/api/v2/detail-records.
 */
final class Data implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            MessageDetailRecord::class,
            ConferenceDetailRecord::class,
            ConferenceParticipantDetailRecord::class,
            AmdDetailRecord::class,
            VerifyDetailRecord::class,
            SimCardUsageDetailRecord::class,
            MediaStorageDetailRecord::class,
        ];
    }
}
