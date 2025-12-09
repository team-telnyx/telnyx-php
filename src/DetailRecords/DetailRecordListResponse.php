<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\Data;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\AmdDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\AmdDetailRecord\Feature;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\ConferenceDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\ConferenceParticipantDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MediaStorageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord\Direction;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord\MessageType;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\MessageDetailRecord\Status;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\SimCardUsageDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\VerifyDetailRecord;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\VerifyDetailRecord\VerifyChannelType;
use Telnyx\DetailRecords\DetailRecordListResponse\Meta;

/**
 * @phpstan-type DetailRecordListResponseShape = array{
 *   data?: list<MessageDetailRecord|ConferenceDetailRecord|ConferenceParticipantDetailRecord|AmdDetailRecord|VerifyDetailRecord|SimCardUsageDetailRecord|MediaStorageDetailRecord>|null,
 *   meta?: Meta|null,
 * }
 */
final class DetailRecordListResponse implements BaseModel
{
    /** @use SdkModel<DetailRecordListResponseShape> */
    use SdkModel;

    /**
     * @var list<MessageDetailRecord|ConferenceDetailRecord|ConferenceParticipantDetailRecord|AmdDetailRecord|VerifyDetailRecord|SimCardUsageDetailRecord|MediaStorageDetailRecord>|null $data
     */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
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
     * @param list<MessageDetailRecord|array{
     *   recordType: string,
     *   carrier?: string|null,
     *   carrierFee?: string|null,
     *   cld?: string|null,
     *   cli?: string|null,
     *   completedAt?: \DateTimeInterface|null,
     *   cost?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   deliveryStatus?: string|null,
     *   deliveryStatusFailoverURL?: string|null,
     *   deliveryStatusWebhookURL?: string|null,
     *   direction?: value-of<Direction>|null,
     *   errors?: list<string>|null,
     *   fteu?: bool|null,
     *   mcc?: string|null,
     *   messageType?: value-of<MessageType>|null,
     *   mnc?: string|null,
     *   onNet?: bool|null,
     *   parts?: int|null,
     *   profileID?: string|null,
     *   profileName?: string|null,
     *   rate?: string|null,
     *   sentAt?: \DateTimeInterface|null,
     *   sourceCountryCode?: string|null,
     *   status?: value-of<Status>|null,
     *   tags?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   uuid?: string|null,
     * }|ConferenceDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   callLegID?: string|null,
     *   callSec?: int|null,
     *   callSessionID?: string|null,
     *   connectionID?: string|null,
     *   endedAt?: \DateTimeInterface|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   isTelnyxBillable?: bool|null,
     *   name?: string|null,
     *   participantCallSec?: int|null,
     *   participantCount?: int|null,
     *   region?: string|null,
     *   startedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     * }|ConferenceParticipantDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   billedSec?: int|null,
     *   callLegID?: string|null,
     *   callSec?: int|null,
     *   callSessionID?: string|null,
     *   conferenceID?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   destinationNumber?: string|null,
     *   isTelnyxBillable?: bool|null,
     *   joinedAt?: \DateTimeInterface|null,
     *   leftAt?: \DateTimeInterface|null,
     *   originatingNumber?: string|null,
     *   rate?: string|null,
     *   rateMeasuredIn?: string|null,
     *   userID?: string|null,
     * }|AmdDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   billingGroupName?: string|null,
     *   callLegID?: string|null,
     *   callSessionID?: string|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   feature?: value-of<Feature>|null,
     *   invokedAt?: \DateTimeInterface|null,
     *   isTelnyxBillable?: bool|null,
     *   rate?: string|null,
     *   rateMeasuredIn?: string|null,
     *   tags?: string|null,
     * }|VerifyDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   deliveryStatus?: string|null,
     *   destinationPhoneNumber?: string|null,
     *   rate?: string|null,
     *   rateMeasuredIn?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   verificationStatus?: string|null,
     *   verifyChannelID?: string|null,
     *   verifyChannelType?: value-of<VerifyChannelType>|null,
     *   verifyProfileID?: string|null,
     *   verifyUsageFee?: string|null,
     * }|SimCardUsageDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   closedAt?: \DateTimeInterface|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   dataCost?: float|null,
     *   dataRate?: string|null,
     *   dataUnit?: string|null,
     *   downlinkData?: float|null,
     *   imsi?: string|null,
     *   ipAddress?: string|null,
     *   mcc?: string|null,
     *   mnc?: string|null,
     *   phoneNumber?: string|null,
     *   simCardID?: string|null,
     *   simCardTags?: string|null,
     *   simGroupID?: string|null,
     *   simGroupName?: string|null,
     *   uplinkData?: float|null,
     * }|MediaStorageDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   actionType?: string|null,
     *   assetID?: string|null,
     *   cost?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   linkChannelID?: string|null,
     *   linkChannelType?: string|null,
     *   orgID?: string|null,
     *   rate?: string|null,
     *   rateMeasuredIn?: string|null,
     *   status?: string|null,
     *   userID?: string|null,
     *   webhookID?: string|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MessageDetailRecord|array{
     *   recordType: string,
     *   carrier?: string|null,
     *   carrierFee?: string|null,
     *   cld?: string|null,
     *   cli?: string|null,
     *   completedAt?: \DateTimeInterface|null,
     *   cost?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   deliveryStatus?: string|null,
     *   deliveryStatusFailoverURL?: string|null,
     *   deliveryStatusWebhookURL?: string|null,
     *   direction?: value-of<Direction>|null,
     *   errors?: list<string>|null,
     *   fteu?: bool|null,
     *   mcc?: string|null,
     *   messageType?: value-of<MessageType>|null,
     *   mnc?: string|null,
     *   onNet?: bool|null,
     *   parts?: int|null,
     *   profileID?: string|null,
     *   profileName?: string|null,
     *   rate?: string|null,
     *   sentAt?: \DateTimeInterface|null,
     *   sourceCountryCode?: string|null,
     *   status?: value-of<Status>|null,
     *   tags?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   uuid?: string|null,
     * }|ConferenceDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   callLegID?: string|null,
     *   callSec?: int|null,
     *   callSessionID?: string|null,
     *   connectionID?: string|null,
     *   endedAt?: \DateTimeInterface|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   isTelnyxBillable?: bool|null,
     *   name?: string|null,
     *   participantCallSec?: int|null,
     *   participantCount?: int|null,
     *   region?: string|null,
     *   startedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     * }|ConferenceParticipantDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   billedSec?: int|null,
     *   callLegID?: string|null,
     *   callSec?: int|null,
     *   callSessionID?: string|null,
     *   conferenceID?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   destinationNumber?: string|null,
     *   isTelnyxBillable?: bool|null,
     *   joinedAt?: \DateTimeInterface|null,
     *   leftAt?: \DateTimeInterface|null,
     *   originatingNumber?: string|null,
     *   rate?: string|null,
     *   rateMeasuredIn?: string|null,
     *   userID?: string|null,
     * }|AmdDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   billingGroupName?: string|null,
     *   callLegID?: string|null,
     *   callSessionID?: string|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   feature?: value-of<Feature>|null,
     *   invokedAt?: \DateTimeInterface|null,
     *   isTelnyxBillable?: bool|null,
     *   rate?: string|null,
     *   rateMeasuredIn?: string|null,
     *   tags?: string|null,
     * }|VerifyDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   deliveryStatus?: string|null,
     *   destinationPhoneNumber?: string|null,
     *   rate?: string|null,
     *   rateMeasuredIn?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   verificationStatus?: string|null,
     *   verifyChannelID?: string|null,
     *   verifyChannelType?: value-of<VerifyChannelType>|null,
     *   verifyProfileID?: string|null,
     *   verifyUsageFee?: string|null,
     * }|SimCardUsageDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   closedAt?: \DateTimeInterface|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   dataCost?: float|null,
     *   dataRate?: string|null,
     *   dataUnit?: string|null,
     *   downlinkData?: float|null,
     *   imsi?: string|null,
     *   ipAddress?: string|null,
     *   mcc?: string|null,
     *   mnc?: string|null,
     *   phoneNumber?: string|null,
     *   simCardID?: string|null,
     *   simCardTags?: string|null,
     *   simGroupID?: string|null,
     *   simGroupName?: string|null,
     *   uplinkData?: float|null,
     * }|MediaStorageDetailRecord|array{
     *   recordType: string,
     *   id?: string|null,
     *   actionType?: string|null,
     *   assetID?: string|null,
     *   cost?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   linkChannelID?: string|null,
     *   linkChannelType?: string|null,
     *   orgID?: string|null,
     *   rate?: string|null,
     *   rateMeasuredIn?: string|null,
     *   status?: string|null,
     *   userID?: string|null,
     *   webhookID?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
