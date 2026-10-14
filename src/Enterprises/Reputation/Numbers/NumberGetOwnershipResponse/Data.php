<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers\NumberGetOwnershipResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetOwnershipResponse\Data\History;
use Telnyx\Enterprises\Reputation\Numbers\ReputationNumberSource;
use Telnyx\Enterprises\Reputation\Numbers\ReputationOwnershipStatus;

/**
 * @phpstan-import-type HistoryShape from \Telnyx\Enterprises\Reputation\Numbers\NumberGetOwnershipResponse\Data\History
 *
 * @phpstan-type DataShape = array{
 *   baselineCarrier?: string|null,
 *   baselineRecordedAt?: \DateTimeInterface|null,
 *   confirmBy?: \DateTimeInterface|null,
 *   flagReason?: string|null,
 *   history?: list<History|HistoryShape>|null,
 *   lastCheckedAt?: \DateTimeInterface|null,
 *   ownershipStatus?: null|ReputationOwnershipStatus|value-of<ReputationOwnershipStatus>,
 *   phoneNumber?: string|null,
 *   source?: null|ReputationNumberSource|value-of<ReputationNumberSource>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Service provider ID (SPID) of the carrier that held the number when its ownership was last established.
     */
    #[Optional('baseline_carrier', nullable: true)]
    public ?string $baselineCarrier;

    #[Optional('baseline_recorded_at', nullable: true)]
    public ?\DateTimeInterface $baselineRecordedAt;

    #[Optional('confirm_by', nullable: true)]
    public ?\DateTimeInterface $confirmBy;

    #[Optional('flag_reason', nullable: true)]
    public ?string $flagReason;

    /**
     * Ownership events, most recent first.
     *
     * @var list<History>|null $history
     */
    #[Optional(list: History::class)]
    public ?array $history;

    /**
     * When ownership of the number was last checked.
     */
    #[Optional('last_checked_at', nullable: true)]
    public ?\DateTimeInterface $lastCheckedAt;

    /**
     * Result of ongoing ownership checks. `verified`: the number is with the carrier on record. `pending_confirmation`: the number's carrier changed, or a periodic ownership re-verification is due; confirm you still own it before `confirm_by`. `flagged`: a periodic re-verification went unanswered; the number stays monitored and is not removed, but confirm ownership (`POST .../ownership_confirm`) to return it to `verified`. `removed`: the number is no longer monitored; returned by `POST .../ownership_confirm` with `still_own: false`, and when listing numbers with `filter[ownership_status]=removed`.
     *
     * @var value-of<ReputationOwnershipStatus>|null $ownershipStatus
     */
    #[Optional('ownership_status', enum: ReputationOwnershipStatus::class)]
    public ?string $ownershipStatus;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Where the phone number is hosted. `telnyx`: in your Telnyx inventory. `external`: a number you own that is hosted with another provider.
     *
     * @var value-of<ReputationNumberSource>|null $source
     */
    #[Optional(enum: ReputationNumberSource::class)]
    public ?string $source;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<History|HistoryShape>|null $history
     * @param ReputationOwnershipStatus|value-of<ReputationOwnershipStatus>|null $ownershipStatus
     * @param ReputationNumberSource|value-of<ReputationNumberSource>|null $source
     */
    public static function with(
        string|Omitted|null $baselineCarrier = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $baselineRecordedAt = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $confirmBy = Omitted::VALUE,
        string|Omitted|null $flagReason = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $lastCheckedAt = Omitted::VALUE,
        ?array $history = null,
        ReputationOwnershipStatus|string|null $ownershipStatus = null,
        ?string $phoneNumber = null,
        ReputationNumberSource|string|null $source = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $baselineCarrier && $self['baselineCarrier'] = $baselineCarrier;
        Omitted::VALUE !== $baselineRecordedAt && $self['baselineRecordedAt'] = $baselineRecordedAt;
        Omitted::VALUE !== $confirmBy && $self['confirmBy'] = $confirmBy;
        Omitted::VALUE !== $flagReason && $self['flagReason'] = $flagReason;
        null !== $history && $self['history'] = $history;
        Omitted::VALUE !== $lastCheckedAt && $self['lastCheckedAt'] = $lastCheckedAt;
        null !== $ownershipStatus && $self['ownershipStatus'] = $ownershipStatus;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $source && $self['source'] = $source;

        return $self;
    }

    /**
     * Service provider ID (SPID) of the carrier that held the number when its ownership was last established.
     */
    public function withBaselineCarrier(?string $baselineCarrier): self
    {
        $self = clone $this;
        $self['baselineCarrier'] = $baselineCarrier;

        return $self;
    }

    public function withBaselineRecordedAt(
        ?\DateTimeInterface $baselineRecordedAt
    ): self {
        $self = clone $this;
        $self['baselineRecordedAt'] = $baselineRecordedAt;

        return $self;
    }

    public function withConfirmBy(?\DateTimeInterface $confirmBy): self
    {
        $self = clone $this;
        $self['confirmBy'] = $confirmBy;

        return $self;
    }

    public function withFlagReason(?string $flagReason): self
    {
        $self = clone $this;
        $self['flagReason'] = $flagReason;

        return $self;
    }

    /**
     * Ownership events, most recent first.
     *
     * @param list<History|HistoryShape> $history
     */
    public function withHistory(array $history): self
    {
        $self = clone $this;
        $self['history'] = $history;

        return $self;
    }

    /**
     * When ownership of the number was last checked.
     */
    public function withLastCheckedAt(?\DateTimeInterface $lastCheckedAt): self
    {
        $self = clone $this;
        $self['lastCheckedAt'] = $lastCheckedAt;

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

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

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
