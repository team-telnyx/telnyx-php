<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Numbers\ReputationNumberSource;
use Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data\Payload\FlagReason;
use Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data\Payload\OwnershipStatus;
use Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data\Payload\RecordType;

/**
 * @phpstan-type PayloadShape = array{
 *   confirmBy: \DateTimeInterface,
 *   enterpriseID: string,
 *   flagReason: FlagReason|value-of<FlagReason>,
 *   ownershipStatus: OwnershipStatus|value-of<OwnershipStatus>,
 *   phoneNumber: string,
 *   recordType: \Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data\Payload\RecordType|value-of<\Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data\Payload\RecordType>,
 *   source: ReputationNumberSource|value-of<ReputationNumberSource>,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Confirm ownership before this time or the number is removed (carrier change) or flagged (re-verification).
     */
    #[Required('confirm_by')]
    public \DateTimeInterface $confirmBy;

    #[Required('enterprise_id')]
    public string $enterpriseID;

    /**
     * `carrier_changed`: the number moved to a different carrier. `reverification_due`: the periodic ownership re-verification is due.
     *
     * @var value-of<FlagReason> $flagReason
     */
    #[Required('flag_reason', enum: FlagReason::class)]
    public string $flagReason;

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
     *   confirmBy: ...,
     *   enterpriseID: ...,
     *   flagReason: ...,
     *   ownershipStatus: ...,
     *   phoneNumber: ...,
     *   recordType: ...,
     *   source: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payload)
     *   ->withConfirmBy(...)
     *   ->withEnterpriseID(...)
     *   ->withFlagReason(...)
     *   ->withOwnershipStatus(...)
     *   ->withPhoneNumber(...)
     *   ->withRecordType(...)
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
     * @param FlagReason|value-of<FlagReason> $flagReason
     * @param OwnershipStatus|value-of<OwnershipStatus> $ownershipStatus
     * @param RecordType|value-of<RecordType> $recordType
     * @param ReputationNumberSource|value-of<ReputationNumberSource> $source
     */
    public static function with(
        \DateTimeInterface $confirmBy,
        string $enterpriseID,
        FlagReason|string $flagReason,
        OwnershipStatus|string $ownershipStatus,
        string $phoneNumber,
        RecordType|string $recordType,
        ReputationNumberSource|string $source,
    ): self {
        $self = new self;

        $self['confirmBy'] = $confirmBy;
        $self['enterpriseID'] = $enterpriseID;
        $self['flagReason'] = $flagReason;
        $self['ownershipStatus'] = $ownershipStatus;
        $self['phoneNumber'] = $phoneNumber;
        $self['recordType'] = $recordType;
        $self['source'] = $source;

        return $self;
    }

    /**
     * Confirm ownership before this time or the number is removed (carrier change) or flagged (re-verification).
     */
    public function withConfirmBy(\DateTimeInterface $confirmBy): self
    {
        $self = clone $this;
        $self['confirmBy'] = $confirmBy;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * `carrier_changed`: the number moved to a different carrier. `reverification_due`: the periodic ownership re-verification is due.
     *
     * @param FlagReason|value-of<FlagReason> $flagReason
     */
    public function withFlagReason(FlagReason|string $flagReason): self
    {
        $self = clone $this;
        $self['flagReason'] = $flagReason;

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
