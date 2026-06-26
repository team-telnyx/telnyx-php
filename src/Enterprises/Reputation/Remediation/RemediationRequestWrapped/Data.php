<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation\RemediationRequestWrapped;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Remediation\RemediationRequestWrapped\Data\Results;
use Telnyx\Enterprises\Reputation\Remediation\RemediationStatus;

/**
 * Full detail of a remediation request, returned on submit and GET by id.
 *
 * @phpstan-import-type ResultsShape from \Telnyx\Enterprises\Reputation\Remediation\RemediationRequestWrapped\Data\Results
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   callPurpose: string,
 *   createdAt: \DateTimeInterface,
 *   phoneNumbersCount: int,
 *   phoneNumbersIneligible: int,
 *   phoneNumbersSubmitted: int,
 *   status: RemediationStatus|value-of<RemediationStatus>,
 *   updatedAt: \DateTimeInterface,
 *   contactEmail?: string|null,
 *   results?: null|Results|ResultsShape,
 *   tier1CompletedAt?: \DateTimeInterface|null,
 *   tier2CompletedAt?: \DateTimeInterface|null,
 *   webhookURL?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('call_purpose')]
    public string $callPurpose;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Total phone numbers in this batch, including any later cancelled. May exceed the sum of the per-category result buckets, which omit cancelled numbers.
     */
    #[Required('phone_numbers_count')]
    public int $phoneNumbersCount;

    /**
     * Numbers rejected before submission (e.g. cooldown).
     */
    #[Required('phone_numbers_ineligible')]
    public int $phoneNumbersIneligible;

    /**
     * Numbers accepted for remediation, i.e. not rejected as ineligible. Counts numbers still queued (pending) as well as processed ones.
     */
    #[Required('phone_numbers_submitted')]
    public int $phoneNumbersSubmitted;

    /**
     * Customer-facing status of a remediation request.
     *
     * @var value-of<RemediationStatus> $status
     */
    #[Required(enum: RemediationStatus::class)]
    public string $status;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Optional('contact_email', nullable: true)]
    public ?string $contactEmail;

    /**
     * Per-category buckets. Populated once results are available. Null while the request is still pending.
     */
    #[Optional(nullable: true)]
    public ?Results $results;

    #[Optional('tier1_completed_at', nullable: true)]
    public ?\DateTimeInterface $tier1CompletedAt;

    #[Optional('tier2_completed_at', nullable: true)]
    public ?\DateTimeInterface $tier2CompletedAt;

    #[Optional('webhook_url', nullable: true)]
    public ?string $webhookURL;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   callPurpose: ...,
     *   createdAt: ...,
     *   phoneNumbersCount: ...,
     *   phoneNumbersIneligible: ...,
     *   phoneNumbersSubmitted: ...,
     *   status: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withCallPurpose(...)
     *   ->withCreatedAt(...)
     *   ->withPhoneNumbersCount(...)
     *   ->withPhoneNumbersIneligible(...)
     *   ->withPhoneNumbersSubmitted(...)
     *   ->withStatus(...)
     *   ->withUpdatedAt(...)
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
     * @param RemediationStatus|value-of<RemediationStatus> $status
     * @param Results|ResultsShape|null $results
     */
    public static function with(
        string $id,
        string $callPurpose,
        \DateTimeInterface $createdAt,
        int $phoneNumbersCount,
        int $phoneNumbersIneligible,
        int $phoneNumbersSubmitted,
        RemediationStatus|string $status,
        \DateTimeInterface $updatedAt,
        ?string $contactEmail = null,
        Results|array|null $results = null,
        ?\DateTimeInterface $tier1CompletedAt = null,
        ?\DateTimeInterface $tier2CompletedAt = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['callPurpose'] = $callPurpose;
        $self['createdAt'] = $createdAt;
        $self['phoneNumbersCount'] = $phoneNumbersCount;
        $self['phoneNumbersIneligible'] = $phoneNumbersIneligible;
        $self['phoneNumbersSubmitted'] = $phoneNumbersSubmitted;
        $self['status'] = $status;
        $self['updatedAt'] = $updatedAt;

        null !== $contactEmail && $self['contactEmail'] = $contactEmail;
        null !== $results && $self['results'] = $results;
        null !== $tier1CompletedAt && $self['tier1CompletedAt'] = $tier1CompletedAt;
        null !== $tier2CompletedAt && $self['tier2CompletedAt'] = $tier2CompletedAt;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCallPurpose(string $callPurpose): self
    {
        $self = clone $this;
        $self['callPurpose'] = $callPurpose;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Total phone numbers in this batch, including any later cancelled. May exceed the sum of the per-category result buckets, which omit cancelled numbers.
     */
    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $self = clone $this;
        $self['phoneNumbersCount'] = $phoneNumbersCount;

        return $self;
    }

    /**
     * Numbers rejected before submission (e.g. cooldown).
     */
    public function withPhoneNumbersIneligible(
        int $phoneNumbersIneligible
    ): self {
        $self = clone $this;
        $self['phoneNumbersIneligible'] = $phoneNumbersIneligible;

        return $self;
    }

    /**
     * Numbers accepted for remediation, i.e. not rejected as ineligible. Counts numbers still queued (pending) as well as processed ones.
     */
    public function withPhoneNumbersSubmitted(int $phoneNumbersSubmitted): self
    {
        $self = clone $this;
        $self['phoneNumbersSubmitted'] = $phoneNumbersSubmitted;

        return $self;
    }

    /**
     * Customer-facing status of a remediation request.
     *
     * @param RemediationStatus|value-of<RemediationStatus> $status
     */
    public function withStatus(RemediationStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withContactEmail(?string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

        return $self;
    }

    /**
     * Per-category buckets. Populated once results are available. Null while the request is still pending.
     *
     * @param Results|ResultsShape|null $results
     */
    public function withResults(Results|array|null $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTier1CompletedAt(
        ?\DateTimeInterface $tier1CompletedAt
    ): self {
        $self = clone $this;
        $self['tier1CompletedAt'] = $tier1CompletedAt;

        return $self;
    }

    public function withTier2CompletedAt(
        ?\DateTimeInterface $tier2CompletedAt
    ): self {
        $self = clone $this;
        $self['tier2CompletedAt'] = $tier2CompletedAt;

        return $self;
    }

    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
