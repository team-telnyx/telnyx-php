<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\DetailRecords\DetailRecordListResponse\AmdDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\ConferenceDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\ConferenceParticipantDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\MediaStorageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\MessageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\SimCardUsageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\VerifyDetailRecord;

/**
 * An object following one of the schemas published in https://developers.telnyx.com/docs/api/v2/detail-records.
 *
 * @phpstan-import-type MessageDetailRecordShape from \Telnyx\DetailRecords\DetailRecordListResponse\MessageDetailRecord
 * @phpstan-import-type ConferenceDetailRecordShape from \Telnyx\DetailRecords\DetailRecordListResponse\ConferenceDetailRecord
 * @phpstan-import-type ConferenceParticipantDetailRecordShape from \Telnyx\DetailRecords\DetailRecordListResponse\ConferenceParticipantDetailRecord
 * @phpstan-import-type AmdDetailRecordShape from \Telnyx\DetailRecords\DetailRecordListResponse\AmdDetailRecord
 * @phpstan-import-type VerifyDetailRecordShape from \Telnyx\DetailRecords\DetailRecordListResponse\VerifyDetailRecord
 * @phpstan-import-type SimCardUsageDetailRecordShape from \Telnyx\DetailRecords\DetailRecordListResponse\SimCardUsageDetailRecord
 * @phpstan-import-type MediaStorageDetailRecordShape from \Telnyx\DetailRecords\DetailRecordListResponse\MediaStorageDetailRecord
 *
 * @phpstan-type DetailRecordListResponseShape = MessageDetailRecordShape|ConferenceDetailRecordShape|ConferenceParticipantDetailRecordShape|AmdDetailRecordShape|VerifyDetailRecordShape|SimCardUsageDetailRecordShape|MediaStorageDetailRecordShape
 */
final class DetailRecordListResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
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
