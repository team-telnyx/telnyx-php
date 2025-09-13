<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\Data;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\AmdDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\ConferenceDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\ConferenceParticipantDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MediaStorageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\SimCardUsageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\VerifyDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Meta;

/**
 * @phpstan-type detail_record_list_response = array{
 *   data?: list<MessageDetailRecord|ConferenceDetailRecord|ConferenceParticipantDetailRecord|AmdDetailRecord|VerifyDetailRecord|SimCardUsageDetailRecord|MediaStorageDetailRecord>,
 *   meta?: Meta,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class DetailRecordListResponse implements BaseModel
{
    /** @use SdkModel<detail_record_list_response> */
    use SdkModel;

    /**
     * @var list<MessageDetailRecord|ConferenceDetailRecord|ConferenceParticipantDetailRecord|AmdDetailRecord|VerifyDetailRecord|SimCardUsageDetailRecord|MediaStorageDetailRecord>|null $data
     */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MessageDetailRecord|ConferenceDetailRecord|ConferenceParticipantDetailRecord|AmdDetailRecord|VerifyDetailRecord|SimCardUsageDetailRecord|MediaStorageDetailRecord> $data
     */
    public static function with(?array $data = null, ?Meta $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<MessageDetailRecord|ConferenceDetailRecord|ConferenceParticipantDetailRecord|AmdDetailRecord|VerifyDetailRecord|SimCardUsageDetailRecord|MediaStorageDetailRecord> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
