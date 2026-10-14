<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Numbers\ReputationNumberSource;
use Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data\Payload\OwnershipStatus;
use Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data\Payload\RecordType;
use Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data\Payload\RemovalReason;

/**
 * @phpstan-type PayloadShape = array{
 *   enterpriseID: string,
 *   ownershipStatus: OwnershipStatus|value-of<OwnershipStatus>,
 *   phoneNumber: string,
 *   recordType: \Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data\Payload\RecordType|value-of<\Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data\Payload\RecordType>,
 *   removalReason: RemovalReason|value-of<RemovalReason>,
 *   removedAt: \DateTimeInterface,
 *   source: ReputationNumberSource|value-of<ReputationNumberSource>,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    #[Required('enterprise_id')]
    public string $enterpriseID;

    /** @var value-of<OwnershipStatus> $ownershipStatus */
    #[Required('ownership_status', enum: OwnershipStatus::class)]
    public string $ownershipStatus;

    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * @var value-of<RecordType> $recordType
     */
    #[Required(
        'record_type',
        enum: RecordType::class,
    )]
    public string $recordType;

    /**
     * `ported_away`: you confirmed you no longer own it after a carrier change. `unconfirmed_ownership`: the confirmation deadline passed. `reassigned`: the number was reported as permanently disconnected. `customer_reported`: you reported that you no longer own it. Removing a number yourself with `DELETE` sends no event.
     *
     * @var value-of<RemovalReason> $removalReason
     */
    #[Required('removal_reason', enum: RemovalReason::class)]
    public string $removalReason;

    #[Required('removed_at')]
    public \DateTimeInterface $removedAt;

    /**
     * Where the phone number is hosted. `telnyx`: in your Telnyx inventory. `external`: a number you own that is hosted with another provider.
     *
     * @var value-of<ReputationNumberSource> $source
     */
    #[Required(enum: ReputationNumberSource::class)]
    public string $source;

    /**
     * `new Payload()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Payload::with(
     *   enterpriseID: ...,
     *   ownershipStatus: ...,
     *   phoneNumber: ...,
     *   recordType: ...,
     *   removalReason: ...,
     *   removedAt: ...,
     *   source: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payload)
     *   ->withEnterpriseID(...)
     *   ->withOwnershipStatus(...)
     *   ->withPhoneNumber(...)
     *   ->withRecordType(...)
     *   ->withRemovalReason(...)
     *   ->withRemovedAt(...)
     *   ->withSource(...)
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
     *
     * @param OwnershipStatus|value-of<OwnershipStatus> $ownershipStatus
     * @param RecordType|value-of<RecordType> $recordType
     * @param RemovalReason|value-of<RemovalReason> $removalReason
     * @param ReputationNumberSource|value-of<ReputationNumberSource> $source
     */
    public static function with(
        string $enterpriseID,
        OwnershipStatus|string $ownershipStatus,
        string $phoneNumber,
        RecordType|string $recordType,
        RemovalReason|string $removalReason,
        \DateTimeInterface $removedAt,
        ReputationNumberSource|string $source,
    ): self {
        $self = new self;

        $self['enterpriseID'] = $enterpriseID;
        $self['ownershipStatus'] = $ownershipStatus;
        $self['phoneNumber'] = $phoneNumber;
        $self['recordType'] = $recordType;
        $self['removalReason'] = $removalReason;
        $self['removedAt'] = $removedAt;
        $self['source'] = $source;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * @param OwnershipStatus|value-of<OwnershipStatus> $ownershipStatus
     */
    public function withOwnershipStatus(
        OwnershipStatus|string $ownershipStatus
    ): self {
        $self = clone $this;
        $self['ownershipStatus'] = $ownershipStatus;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(
        RecordType|string $recordType,
    ): self {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * `ported_away`: you confirmed you no longer own it after a carrier change. `unconfirmed_ownership`: the confirmation deadline passed. `reassigned`: the number was reported as permanently disconnected. `customer_reported`: you reported that you no longer own it. Removing a number yourself with `DELETE` sends no event.
     *
     * @param RemovalReason|value-of<RemovalReason> $removalReason
     */
    public function withRemovalReason(RemovalReason|string $removalReason): self
    {
        $self = clone $this;
        $self['removalReason'] = $removalReason;

        return $self;
    }

    public function withRemovedAt(\DateTimeInterface $removedAt): self
    {
        $self = clone $this;
        $self['removedAt'] = $removedAt;

        return $self;
    }

    /**
     * Where the phone number is hosted. `telnyx`: in your Telnyx inventory. `external`: a number you own that is hosted with another provider.
     *
     * @param ReputationNumberSource|value-of<ReputationNumberSource> $source
     */
    public function withSource(ReputationNumberSource|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }
}
