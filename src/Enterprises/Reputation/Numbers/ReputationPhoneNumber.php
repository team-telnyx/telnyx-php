<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber\RemovalReason;
use Telnyx\ReputationData;

/**
 * @phpstan-import-type ReputationDataShape from \Telnyx\ReputationData
 *
 * @phpstan-type ReputationPhoneNumberShape = array{
 *   id?: string|null,
 *   confirmBy?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   enterpriseID?: string|null,
 *   flagReason?: string|null,
 *   ownershipStatus?: null|ReputationOwnershipStatus|value-of<ReputationOwnershipStatus>,
 *   phoneNumber?: string|null,
 *   removalReason?: null|RemovalReason|value-of<RemovalReason>,
 *   removedAt?: \DateTimeInterface|null,
 *   reputationData?: null|ReputationData|ReputationDataShape,
 *   source?: null|ReputationNumberSource|value-of<ReputationNumberSource>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class ReputationPhoneNumber implements BaseModel
{
    /** @use SdkModel<ReputationPhoneNumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Deadline to confirm you still own the number. Set only while `ownership_status` is `pending_confirmation`.
     */
    #[Optional('confirm_by', nullable: true)]
    public ?\DateTimeInterface $confirmBy;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * Why the number's ownership was flagged. `carrier_changed` when an ownership check found the number with a different carrier.
     */
    #[Optional('flag_reason', nullable: true)]
    public ?string $flagReason;

    /**
     * Result of ongoing ownership checks. `verified`: the number is with the carrier on record. `pending_confirmation`: the number's carrier changed, or a periodic ownership re-verification is due; confirm you still own it before `confirm_by`. `flagged`: a periodic re-verification went unanswered; the number stays monitored and is not removed, but confirm ownership (`POST .../ownership_confirm`) to return it to `verified`. `removed`: the number is no longer monitored; returned by `POST .../ownership_confirm` with `still_own: false`, and when listing numbers with `filter[ownership_status]=removed`.
     *
     * @var value-of<ReputationOwnershipStatus>|null $ownershipStatus
     */
    #[Optional('ownership_status', enum: ReputationOwnershipStatus::class)]
    public ?string $ownershipStatus;

    /**
     * E.164 with leading `+`.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Why a number was removed. `ported_away`: you confirmed the number left your control after a carrier change. `unconfirmed_ownership`: a carrier change was not confirmed before the deadline. `reassigned`: the number was reported as permanently disconnected. `customer_reported`: you reported that you no longer own the number. `customer_removed`: you removed the number.
     *
     * @var value-of<RemovalReason>|null $removalReason
     */
    #[Optional('removal_reason', enum: RemovalReason::class, nullable: true)]
    public ?string $removalReason;

    /**
     * When the number was removed. Set only for removed numbers.
     */
    #[Optional('removed_at', nullable: true)]
    public ?\DateTimeInterface $removedAt;

    /**
     * Reputation snapshot for a phone number. Each metric is a 0–100 score; `spam_risk` is a coarse bucket. Field set may grow over time - read by key.
     */
    #[Optional('reputation_data', nullable: true)]
    public ?ReputationData $reputationData;

    /**
     * Where the phone number is hosted. `telnyx`: in your Telnyx inventory. `external`: a number you own that is hosted with another provider.
     *
     * @var value-of<ReputationNumberSource>|null $source
     */
    #[Optional(enum: ReputationNumberSource::class)]
    public ?string $source;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|RemovalReason|value-of<RemovalReason>|null $removalReason
     * @param Omitted|ReputationData|ReputationDataShape|null $reputationData
     * @param ReputationOwnershipStatus|value-of<ReputationOwnershipStatus>|null $ownershipStatus
     * @param ReputationNumberSource|value-of<ReputationNumberSource>|null $source
     */
    public static function with(
        \DateTimeInterface|Omitted|null $confirmBy = Omitted::VALUE,
        string|Omitted|null $flagReason = Omitted::VALUE,
        Omitted|RemovalReason|string|null $removalReason = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $removedAt = Omitted::VALUE,
        Omitted|ReputationData|array|null $reputationData = Omitted::VALUE,
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $enterpriseID = null,
        ReputationOwnershipStatus|string|null $ownershipStatus = null,
        ?string $phoneNumber = null,
        ReputationNumberSource|string|null $source = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        Omitted::VALUE !== $confirmBy && $self['confirmBy'] = $confirmBy;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        Omitted::VALUE !== $flagReason && $self['flagReason'] = $flagReason;
        null !== $ownershipStatus && $self['ownershipStatus'] = $ownershipStatus;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        Omitted::VALUE !== $removalReason && $self['removalReason'] = $removalReason;
        Omitted::VALUE !== $removedAt && $self['removedAt'] = $removedAt;
        Omitted::VALUE !== $reputationData && $self['reputationData'] = $reputationData;
        null !== $source && $self['source'] = $source;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Deadline to confirm you still own the number. Set only while `ownership_status` is `pending_confirmation`.
     */
    public function withConfirmBy(?\DateTimeInterface $confirmBy): self
    {
        $self = clone $this;
        $self['confirmBy'] = $confirmBy;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * Why the number's ownership was flagged. `carrier_changed` when an ownership check found the number with a different carrier.
     */
    public function withFlagReason(?string $flagReason): self
    {
        $self = clone $this;
        $self['flagReason'] = $flagReason;

        return $self;
    }

    /**
     * Result of ongoing ownership checks. `verified`: the number is with the carrier on record. `pending_confirmation`: the number's carrier changed, or a periodic ownership re-verification is due; confirm you still own it before `confirm_by`. `flagged`: a periodic re-verification went unanswered; the number stays monitored and is not removed, but confirm ownership (`POST .../ownership_confirm`) to return it to `verified`. `removed`: the number is no longer monitored; returned by `POST .../ownership_confirm` with `still_own: false`, and when listing numbers with `filter[ownership_status]=removed`.
     *
     * @param ReputationOwnershipStatus|value-of<ReputationOwnershipStatus> $ownershipStatus
     */
    public function withOwnershipStatus(
        ReputationOwnershipStatus|string $ownershipStatus
    ): self {
        $self = clone $this;
        $self['ownershipStatus'] = $ownershipStatus;

        return $self;
    }

    /**
     * E.164 with leading `+`.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Why a number was removed. `ported_away`: you confirmed the number left your control after a carrier change. `unconfirmed_ownership`: a carrier change was not confirmed before the deadline. `reassigned`: the number was reported as permanently disconnected. `customer_reported`: you reported that you no longer own the number. `customer_removed`: you removed the number.
     *
     * @param RemovalReason|value-of<RemovalReason>|null $removalReason
     */
    public function withRemovalReason(
        RemovalReason|string|null $removalReason
    ): self {
        $self = clone $this;
        $self['removalReason'] = $removalReason;

        return $self;
    }

    /**
     * When the number was removed. Set only for removed numbers.
     */
    public function withRemovedAt(?\DateTimeInterface $removedAt): self
    {
        $self = clone $this;
        $self['removedAt'] = $removedAt;

        return $self;
    }

    /**
     * Reputation snapshot for a phone number. Each metric is a 0–100 score; `spam_risk` is a coarse bucket. Field set may grow over time - read by key.
     *
     * @param ReputationData|ReputationDataShape|null $reputationData
     */
    public function withReputationData(
        ReputationData|array|null $reputationData
    ): self {
        $self = clone $this;
        $self['reputationData'] = $reputationData;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
