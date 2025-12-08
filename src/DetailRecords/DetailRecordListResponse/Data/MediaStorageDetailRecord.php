<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaStorageDetailRecordShape = array{
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
 * }
 */
final class MediaStorageDetailRecord implements BaseModel
{
    /** @use SdkModel<MediaStorageDetailRecordShape> */
    use SdkModel;

    #[Required]
    public string $record_type;

    /**
     * Unique identifier for the Media Storage Event.
     */
    #[Optional]
    public ?string $id;

    /**
     * Type of action performed against the Media Storage API.
     */
    #[Optional]
    public ?string $action_type;

    /**
     * Asset id.
     */
    #[Optional]
    public ?string $asset_id;

    /**
     * Currency amount for Telnyx billing cost.
     */
    #[Optional]
    public ?string $cost;

    /**
     * Event creation time.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Link channel id.
     */
    #[Optional]
    public ?string $link_channel_id;

    /**
     * Link channel type.
     */
    #[Optional]
    public ?string $link_channel_type;

    /**
     * Organization owner id.
     */
    #[Optional]
    public ?string $org_id;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate_measured_in;

    /**
     * Request status.
     */
    #[Optional]
    public ?string $status;

    /**
     * User id.
     */
    #[Optional]
    public ?string $user_id;

    /**
     * Webhook id.
     */
    #[Optional]
    public ?string $webhook_id;

    /**
     * `new MediaStorageDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaStorageDetailRecord::with(record_type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaStorageDetailRecord)->withRecordType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $record_type = 'media_storage',
        ?string $id = null,
        ?string $action_type = null,
        ?string $asset_id = null,
        ?string $cost = null,
        ?\DateTimeInterface $created_at = null,
        ?string $currency = null,
        ?string $link_channel_id = null,
        ?string $link_channel_type = null,
        ?string $org_id = null,
        ?string $rate = null,
        ?string $rate_measured_in = null,
        ?string $status = null,
        ?string $user_id = null,
        ?string $webhook_id = null,
    ): self {
        $obj = new self;

        $obj['record_type'] = $record_type;

        null !== $id && $obj['id'] = $id;
        null !== $action_type && $obj['action_type'] = $action_type;
        null !== $asset_id && $obj['asset_id'] = $asset_id;
        null !== $cost && $obj['cost'] = $cost;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $currency && $obj['currency'] = $currency;
        null !== $link_channel_id && $obj['link_channel_id'] = $link_channel_id;
        null !== $link_channel_type && $obj['link_channel_type'] = $link_channel_type;
        null !== $org_id && $obj['org_id'] = $org_id;
        null !== $rate && $obj['rate'] = $rate;
        null !== $rate_measured_in && $obj['rate_measured_in'] = $rate_measured_in;
        null !== $status && $obj['status'] = $status;
        null !== $user_id && $obj['user_id'] = $user_id;
        null !== $webhook_id && $obj['webhook_id'] = $webhook_id;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Unique identifier for the Media Storage Event.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Type of action performed against the Media Storage API.
     */
    public function withActionType(string $actionType): self
    {
        $obj = clone $this;
        $obj['action_type'] = $actionType;

        return $obj;
    }

    /**
     * Asset id.
     */
    public function withAssetID(string $assetID): self
    {
        $obj = clone $this;
        $obj['asset_id'] = $assetID;

        return $obj;
    }

    /**
     * Currency amount for Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
    }

    /**
     * Event creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Link channel id.
     */
    public function withLinkChannelID(string $linkChannelID): self
    {
        $obj = clone $this;
        $obj['link_channel_id'] = $linkChannelID;

        return $obj;
    }

    /**
     * Link channel type.
     */
    public function withLinkChannelType(string $linkChannelType): self
    {
        $obj = clone $this;
        $obj['link_channel_type'] = $linkChannelType;

        return $obj;
    }

    /**
     * Organization owner id.
     */
    public function withOrgID(string $orgID): self
    {
        $obj = clone $this;
        $obj['org_id'] = $orgID;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj['rate'] = $rate;

        return $obj;
    }

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $obj = clone $this;
        $obj['rate_measured_in'] = $rateMeasuredIn;

        return $obj;
    }

    /**
     * Request status.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * User id.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }

    /**
     * Webhook id.
     */
    public function withWebhookID(string $webhookID): self
    {
        $obj = clone $this;
        $obj['webhook_id'] = $webhookID;

        return $obj;
    }
}
