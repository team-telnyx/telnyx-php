<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\ExternalVerification;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type ExternalVerificationShape = array{
 *   documentIDs?: list<string>|null,
 *   enterpriseID?: string|null,
 *   phoneNumbers?: list<string>|null,
 *   rejectionReason?: string|null,
 *   reviewedAt?: \DateTimeInterface|null,
 *   status?: null|ExternalVerificationStatus|value-of<ExternalVerificationStatus>,
 *   submittedAt?: \DateTimeInterface|null,
 * }
 */
final class ExternalVerification implements BaseModel
{
    /** @use SdkModel<ExternalVerificationShape> */
    use SdkModel;

    /**
     * The ownership-proof documents on file.
     *
     * @var list<string>|null $documentIDs
     */
    #[Optional('document_ids', list: 'string')]
    public ?array $documentIDs;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * The phone numbers you listed with the documents.
     *
     * @var list<string>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: 'string')]
    public ?array $phoneNumbers;

    /**
     * Why the proof was rejected. Set only when `status` is `rejected`.
     */
    #[Optional('rejection_reason', nullable: true)]
    public ?string $rejectionReason;

    #[Optional('reviewed_at', nullable: true)]
    public ?\DateTimeInterface $reviewedAt;

    /**
     * Review state of the ownership proof that allows adding phone numbers hosted with another provider.
     *
     * @var value-of<ExternalVerificationStatus>|null $status
     */
    #[Optional(enum: ExternalVerificationStatus::class)]
    public ?string $status;

    #[Optional('submitted_at', nullable: true)]
    public ?\DateTimeInterface $submittedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $documentIDs
     * @param list<string>|null $phoneNumbers
     * @param ExternalVerificationStatus|value-of<ExternalVerificationStatus>|null $status
     */
    public static function with(
        string|Omitted|null $rejectionReason = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $reviewedAt = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $submittedAt = Omitted::VALUE,
        ?array $documentIDs = null,
        ?string $enterpriseID = null,
        ?array $phoneNumbers = null,
        ExternalVerificationStatus|string|null $status = null,
    ): self {
        $self = new self;

        null !== $documentIDs && $self['documentIDs'] = $documentIDs;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        Omitted::VALUE !== $rejectionReason && $self['rejectionReason'] = $rejectionReason;
        Omitted::VALUE !== $reviewedAt && $self['reviewedAt'] = $reviewedAt;
        null !== $status && $self['status'] = $status;
        Omitted::VALUE !== $submittedAt && $self['submittedAt'] = $submittedAt;

        return $self;
    }

    /**
     * The ownership-proof documents on file.
     *
     * @param list<string> $documentIDs
     */
    public function withDocumentIDs(array $documentIDs): self
    {
        $self = clone $this;
        $self['documentIDs'] = $documentIDs;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * The phone numbers you listed with the documents.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Why the proof was rejected. Set only when `status` is `rejected`.
     */
    public function withRejectionReason(?string $rejectionReason): self
    {
        $self = clone $this;
        $self['rejectionReason'] = $rejectionReason;

        return $self;
    }

    public function withReviewedAt(?\DateTimeInterface $reviewedAt): self
    {
        $self = clone $this;
        $self['reviewedAt'] = $reviewedAt;

        return $self;
    }

    /**
     * Review state of the ownership proof that allows adding phone numbers hosted with another provider.
     *
     * @param ExternalVerificationStatus|value-of<ExternalVerificationStatus> $status
     */
    public function withStatus(ExternalVerificationStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubmittedAt(?\DateTimeInterface $submittedAt): self
    {
        $self = clone $this;
        $self['submittedAt'] = $submittedAt;

        return $self;
    }
}
