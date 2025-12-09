<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse;

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
        $self = new self;

        $self['recordType'] = $recordType;

        null !== $id && $self['id'] = $id;
        null !== $actionType && $self['actionType'] = $actionType;
        null !== $assetID && $self['assetID'] = $assetID;
        null !== $cost && $self['cost'] = $cost;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currency && $self['currency'] = $currency;
        null !== $linkChannelID && $self['linkChannelID'] = $linkChannelID;
        null !== $linkChannelType && $self['linkChannelType'] = $linkChannelType;
        null !== $orgID && $self['orgID'] = $orgID;
        null !== $rate && $self['rate'] = $rate;
        null !== $rateMeasuredIn && $self['rateMeasuredIn'] = $rateMeasuredIn;
        null !== $status && $self['status'] = $status;
        null !== $userID && $self['userID'] = $userID;
        null !== $webhookID && $self['webhookID'] = $webhookID;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Unique identifier for the Media Storage Event.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Type of action performed against the Media Storage API.
     */
    public function withActionType(string $actionType): self
    {
        $self = clone $this;
        $self['actionType'] = $actionType;

        return $self;
    }

    /**
     * Asset id.
     */
    public function withAssetID(string $assetID): self
    {
        $self = clone $this;
        $self['assetID'] = $assetID;

        return $self;
    }

    /**
     * Currency amount for Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Event creation time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Link channel id.
     */
    public function withLinkChannelID(string $linkChannelID): self
    {
        $self = clone $this;
        $self['linkChannelID'] = $linkChannelID;

        return $self;
    }

    /**
     * Link channel type.
     */
    public function withLinkChannelType(string $linkChannelType): self
    {
        $self = clone $this;
        $self['linkChannelType'] = $linkChannelType;

        return $self;
    }

    /**
     * Organization owner id.
     */
    public function withOrgID(string $orgID): self
    {
        $self = clone $this;
        $self['orgID'] = $orgID;

        return $self;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $self = clone $this;
        $self['rateMeasuredIn'] = $rateMeasuredIn;

        return $self;
    }

    /**
     * Request status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * User id.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Webhook id.
     */
    public function withWebhookID(string $webhookID): self
    {
        $self = clone $this;
        $self['webhookID'] = $webhookID;

        return $self;
    }
}
