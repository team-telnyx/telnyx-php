<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaStorageDetailRecordShape = array{
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
 * }
 */
final class MediaStorageDetailRecord implements BaseModel
{
    /** @use SdkModel<MediaStorageDetailRecordShape> */
    use SdkModel;

    #[Required('record_type')]
    public string $recordType;

    /**
     * Unique identifier for the Media Storage Event.
     */
    #[Optional]
    public ?string $id;

    /**
     * Type of action performed against the Media Storage API.
     */
    #[Optional('action_type')]
    public ?string $actionType;

    /**
     * Asset id.
     */
    #[Optional('asset_id')]
    public ?string $assetID;

    /**
     * Currency amount for Telnyx billing cost.
     */
    #[Optional]
    public ?string $cost;

    /**
     * Event creation time.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Link channel id.
     */
    #[Optional('link_channel_id')]
    public ?string $linkChannelID;

    /**
     * Link channel type.
     */
    #[Optional('link_channel_type')]
    public ?string $linkChannelType;

    /**
     * Organization owner id.
     */
    #[Optional('org_id')]
    public ?string $orgID;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional('rate_measured_in')]
    public ?string $rateMeasuredIn;

    /**
     * Request status.
     */
    #[Optional]
    public ?string $status;

    /**
     * User id.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Webhook id.
     */
    #[Optional('webhook_id')]
    public ?string $webhookID;

    /**
     * `new MediaStorageDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaStorageDetailRecord::with(recordType: ...)
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
        string $recordType = 'media_storage',
        ?string $id = null,
        ?string $actionType = null,
        ?string $assetID = null,
        ?string $cost = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $currency = null,
        ?string $linkChannelID = null,
        ?string $linkChannelType = null,
        ?string $orgID = null,
        ?string $rate = null,
        ?string $rateMeasuredIn = null,
        ?string $status = null,
        ?string $userID = null,
        ?string $webhookID = null,
    ): self {
        $obj = new self;

        $obj['recordType'] = $recordType;

        null !== $id && $obj['id'] = $id;
        null !== $actionType && $obj['actionType'] = $actionType;
        null !== $assetID && $obj['assetID'] = $assetID;
        null !== $cost && $obj['cost'] = $cost;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $currency && $obj['currency'] = $currency;
        null !== $linkChannelID && $obj['linkChannelID'] = $linkChannelID;
        null !== $linkChannelType && $obj['linkChannelType'] = $linkChannelType;
        null !== $orgID && $obj['orgID'] = $orgID;
        null !== $rate && $obj['rate'] = $rate;
        null !== $rateMeasuredIn && $obj['rateMeasuredIn'] = $rateMeasuredIn;
        null !== $status && $obj['status'] = $status;
        null !== $userID && $obj['userID'] = $userID;
        null !== $webhookID && $obj['webhookID'] = $webhookID;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

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
        $obj['actionType'] = $actionType;

        return $obj;
    }

    /**
     * Asset id.
     */
    public function withAssetID(string $assetID): self
    {
        $obj = clone $this;
        $obj['assetID'] = $assetID;

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
        $obj['createdAt'] = $createdAt;

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
        $obj['linkChannelID'] = $linkChannelID;

        return $obj;
    }

    /**
     * Link channel type.
     */
    public function withLinkChannelType(string $linkChannelType): self
    {
        $obj = clone $this;
        $obj['linkChannelType'] = $linkChannelType;

        return $obj;
    }

    /**
     * Organization owner id.
     */
    public function withOrgID(string $orgID): self
    {
        $obj = clone $this;
        $obj['orgID'] = $orgID;

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
        $obj['rateMeasuredIn'] = $rateMeasuredIn;

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
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * Webhook id.
     */
    public function withWebhookID(string $webhookID): self
    {
        $obj = clone $this;
        $obj['webhookID'] = $webhookID;

        return $obj;
    }
}
