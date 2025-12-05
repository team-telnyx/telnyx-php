<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
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
final class DetailRecordListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DetailRecordListResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     * @param list<MessageDetailRecord|array{
     *   record_type: string,
     *   carrier?: string|null,
     *   carrier_fee?: string|null,
     *   cld?: string|null,
     *   cli?: string|null,
     *   completed_at?: \DateTimeInterface|null,
     *   cost?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   delivery_status?: string|null,
     *   delivery_status_failover_url?: string|null,
     *   delivery_status_webhook_url?: string|null,
     *   direction?: value-of<Direction>|null,
     *   errors?: list<string>|null,
     *   fteu?: bool|null,
     *   mcc?: string|null,
     *   message_type?: value-of<MessageType>|null,
     *   mnc?: string|null,
     *   on_net?: bool|null,
     *   parts?: int|null,
     *   profile_id?: string|null,
     *   profile_name?: string|null,
     *   rate?: string|null,
     *   sent_at?: \DateTimeInterface|null,
     *   source_country_code?: string|null,
     *   status?: value-of<Status>|null,
     *   tags?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   uuid?: string|null,
     * }|ConferenceDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   call_leg_id?: string|null,
     *   call_sec?: int|null,
     *   call_session_id?: string|null,
     *   connection_id?: string|null,
     *   ended_at?: \DateTimeInterface|null,
     *   expires_at?: \DateTimeInterface|null,
     *   is_telnyx_billable?: bool|null,
     *   name?: string|null,
     *   participant_call_sec?: int|null,
     *   participant_count?: int|null,
     *   region?: string|null,
     *   started_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     * }|ConferenceParticipantDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   billed_sec?: int|null,
     *   call_leg_id?: string|null,
     *   call_sec?: int|null,
     *   call_session_id?: string|null,
     *   conference_id?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   destination_number?: string|null,
     *   is_telnyx_billable?: bool|null,
     *   joined_at?: \DateTimeInterface|null,
     *   left_at?: \DateTimeInterface|null,
     *   originating_number?: string|null,
     *   rate?: string|null,
     *   rate_measured_in?: string|null,
     *   user_id?: string|null,
     * }|AmdDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   billing_group_name?: string|null,
     *   call_leg_id?: string|null,
     *   call_session_id?: string|null,
     *   connection_id?: string|null,
     *   connection_name?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   feature?: value-of<Feature>|null,
     *   invoked_at?: \DateTimeInterface|null,
     *   is_telnyx_billable?: bool|null,
     *   rate?: string|null,
     *   rate_measured_in?: string|null,
     *   tags?: string|null,
     * }|VerifyDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   delivery_status?: string|null,
     *   destination_phone_number?: string|null,
     *   rate?: string|null,
     *   rate_measured_in?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   verification_status?: string|null,
     *   verify_channel_id?: string|null,
     *   verify_channel_type?: value-of<VerifyChannelType>|null,
     *   verify_profile_id?: string|null,
     *   verify_usage_fee?: string|null,
     * }|SimCardUsageDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   closed_at?: \DateTimeInterface|null,
     *   created_at?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   data_cost?: float|null,
     *   data_rate?: string|null,
     *   data_unit?: string|null,
     *   downlink_data?: float|null,
     *   imsi?: string|null,
     *   ip_address?: string|null,
     *   mcc?: string|null,
     *   mnc?: string|null,
     *   phone_number?: string|null,
     *   sim_card_id?: string|null,
     *   sim_card_tags?: string|null,
     *   sim_group_id?: string|null,
     *   sim_group_name?: string|null,
     *   uplink_data?: float|null,
     * }|MediaStorageDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   action_type?: string|null,
     *   asset_id?: string|null,
     *   cost?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   link_channel_id?: string|null,
     *   link_channel_type?: string|null,
     *   org_id?: string|null,
     *   rate?: string|null,
     *   rate_measured_in?: string|null,
     *   status?: string|null,
     *   user_id?: string|null,
     *   webhook_id?: string|null,
     * }> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<MessageDetailRecord|array{
     *   record_type: string,
     *   carrier?: string|null,
     *   carrier_fee?: string|null,
     *   cld?: string|null,
     *   cli?: string|null,
     *   completed_at?: \DateTimeInterface|null,
     *   cost?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   delivery_status?: string|null,
     *   delivery_status_failover_url?: string|null,
     *   delivery_status_webhook_url?: string|null,
     *   direction?: value-of<Direction>|null,
     *   errors?: list<string>|null,
     *   fteu?: bool|null,
     *   mcc?: string|null,
     *   message_type?: value-of<MessageType>|null,
     *   mnc?: string|null,
     *   on_net?: bool|null,
     *   parts?: int|null,
     *   profile_id?: string|null,
     *   profile_name?: string|null,
     *   rate?: string|null,
     *   sent_at?: \DateTimeInterface|null,
     *   source_country_code?: string|null,
     *   status?: value-of<Status>|null,
     *   tags?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   uuid?: string|null,
     * }|ConferenceDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   call_leg_id?: string|null,
     *   call_sec?: int|null,
     *   call_session_id?: string|null,
     *   connection_id?: string|null,
     *   ended_at?: \DateTimeInterface|null,
     *   expires_at?: \DateTimeInterface|null,
     *   is_telnyx_billable?: bool|null,
     *   name?: string|null,
     *   participant_call_sec?: int|null,
     *   participant_count?: int|null,
     *   region?: string|null,
     *   started_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     * }|ConferenceParticipantDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   billed_sec?: int|null,
     *   call_leg_id?: string|null,
     *   call_sec?: int|null,
     *   call_session_id?: string|null,
     *   conference_id?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   destination_number?: string|null,
     *   is_telnyx_billable?: bool|null,
     *   joined_at?: \DateTimeInterface|null,
     *   left_at?: \DateTimeInterface|null,
     *   originating_number?: string|null,
     *   rate?: string|null,
     *   rate_measured_in?: string|null,
     *   user_id?: string|null,
     * }|AmdDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   billing_group_name?: string|null,
     *   call_leg_id?: string|null,
     *   call_session_id?: string|null,
     *   connection_id?: string|null,
     *   connection_name?: string|null,
     *   cost?: string|null,
     *   currency?: string|null,
     *   feature?: value-of<Feature>|null,
     *   invoked_at?: \DateTimeInterface|null,
     *   is_telnyx_billable?: bool|null,
     *   rate?: string|null,
     *   rate_measured_in?: string|null,
     *   tags?: string|null,
     * }|VerifyDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   delivery_status?: string|null,
     *   destination_phone_number?: string|null,
     *   rate?: string|null,
     *   rate_measured_in?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   verification_status?: string|null,
     *   verify_channel_id?: string|null,
     *   verify_channel_type?: value-of<VerifyChannelType>|null,
     *   verify_profile_id?: string|null,
     *   verify_usage_fee?: string|null,
     * }|SimCardUsageDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   closed_at?: \DateTimeInterface|null,
     *   created_at?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   data_cost?: float|null,
     *   data_rate?: string|null,
     *   data_unit?: string|null,
     *   downlink_data?: float|null,
     *   imsi?: string|null,
     *   ip_address?: string|null,
     *   mcc?: string|null,
     *   mnc?: string|null,
     *   phone_number?: string|null,
     *   sim_card_id?: string|null,
     *   sim_card_tags?: string|null,
     *   sim_group_id?: string|null,
     *   sim_group_name?: string|null,
     *   uplink_data?: float|null,
     * }|MediaStorageDetailRecord|array{
     *   record_type: string,
     *   id?: string|null,
     *   action_type?: string|null,
     *   asset_id?: string|null,
     *   cost?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   currency?: string|null,
     *   link_channel_id?: string|null,
     *   link_channel_type?: string|null,
     *   org_id?: string|null,
     *   rate?: string|null,
     *   rate_measured_in?: string|null,
     *   status?: string|null,
     *   user_id?: string|null,
     *   webhook_id?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
