<?php

declare(strict_types=1);

namespace Telnyx\InfringementClaims\InfringementClaimGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One round of customer contest evidence on an infringement claim. The aggregated documents across rounds live on the parent claim's `contest_documents`; this submission record carries only the per-round notes and document count.
 *
 * @phpstan-type ContestHistoryShape = array{
 *   documentCount?: int|null,
 *   notes?: string|null,
 *   submittedAt?: \DateTimeInterface|null,
 * }
 */
final class ContestHistory implements BaseModel
{
    /** @use SdkModel<ContestHistoryShape> */
    use SdkModel;

    #[Optional('document_count')]
    public ?int $documentCount;

    #[Optional]
    public ?string $notes;

    #[Optional('submitted_at')]
    public ?\DateTimeInterface $submittedAt;

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
        ?int $documentCount = null,
        ?string $notes = null,
        ?\DateTimeInterface $submittedAt = null,
    ): self {
        $self = new self;

        null !== $documentCount && $self['documentCount'] = $documentCount;
        null !== $notes && $self['notes'] = $notes;
        null !== $submittedAt && $self['submittedAt'] = $submittedAt;

        return $self;
    }

    public function withDocumentCount(int $documentCount): self
    {
        $self = clone $this;
        $self['documentCount'] = $documentCount;

        return $self;
    }

    public function withNotes(string $notes): self
    {
        $self = clone $this;
        $self['notes'] = $notes;

        return $self;
    }

    public function withSubmittedAt(\DateTimeInterface $submittedAt): self
    {
        $self = clone $this;
        $self['submittedAt'] = $submittedAt;

        return $self;
    }
}
