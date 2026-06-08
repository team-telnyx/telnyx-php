<?php

declare(strict_types=1);

namespace Telnyx\InfringementClaims\InfringementClaimContestResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\ClaimType;
use Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\ContestDocument;
use Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\ContestHistory;
use Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\Dir;
use Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\Resolution;
use Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\Status;

/**
 * @phpstan-import-type ContestDocumentShape from \Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\ContestDocument
 * @phpstan-import-type ContestHistoryShape from \Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\ContestHistory
 * @phpstan-import-type DirShape from \Telnyx\InfringementClaims\InfringementClaimContestResponse\Data\Dir
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   claimDate?: \DateTimeInterface|null,
 *   claimDescription?: string|null,
 *   claimType?: null|ClaimType|value-of<ClaimType>,
 *   claimantContact?: string|null,
 *   claimantName?: string|null,
 *   contestDocuments?: list<ContestDocument|ContestDocumentShape>|null,
 *   contestHistory?: list<ContestHistory|ContestHistoryShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   dir?: null|Dir|DirShape,
 *   dirID?: string|null,
 *   enterpriseID?: string|null,
 *   resolution?: null|Resolution|value-of<Resolution>,
 *   resolutionDate?: \DateTimeInterface|null,
 *   resolutionNotes?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * When the claim was filed (set by the claimant's representative at file time).
     */
    #[Optional('claim_date')]
    public ?\DateTimeInterface $claimDate;

    #[Optional('claim_description')]
    public ?string $claimDescription;

    /**
     * Category of infringement being claimed.
     *
     * @var value-of<ClaimType>|null $claimType
     */
    #[Optional('claim_type', enum: ClaimType::class)]
    public ?string $claimType;

    #[Optional('claimant_contact')]
    public ?string $claimantContact;

    #[Optional('claimant_name')]
    public ?string $claimantName;

    /**
     * Aggregated across all customer contest submissions on this claim.
     *
     * @var list<ContestDocument>|null $contestDocuments
     */
    #[Optional('contest_documents', list: ContestDocument::class)]
    public ?array $contestDocuments;

    /**
     * Per-round submission audit trail. Each entry records one `POST /infringement_claims/{id}/contest` call (notes, timestamp, document count). Aggregated documents live on `contest_documents`.
     *
     * @var list<ContestHistory>|null $contestHistory
     */
    #[Optional('contest_history', list: ContestHistory::class)]
    public ?array $contestHistory;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Snapshot of the DIR the claim is filed against, embedded for convenience.
     */
    #[Optional]
    public ?Dir $dir;

    #[Optional('dir_id')]
    public ?string $dirID;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * Set only when `status` is `resolved`.
     *
     * @var value-of<Resolution>|null $resolution
     */
    #[Optional(enum: Resolution::class, nullable: true)]
    public ?string $resolution;

    #[Optional('resolution_date', nullable: true)]
    public ?\DateTimeInterface $resolutionDate;

    #[Optional('resolution_notes', nullable: true)]
    public ?string $resolutionNotes;

    /**
     * Lifecycle status. `pending` - newly filed; the DIR is auto-suspended. `contested` - you have submitted contest evidence; awaiting Telnyx review. `resolved` - final.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

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
     * @param ClaimType|value-of<ClaimType>|null $claimType
     * @param list<ContestDocument|ContestDocumentShape>|null $contestDocuments
     * @param list<ContestHistory|ContestHistoryShape>|null $contestHistory
     * @param Dir|DirShape|null $dir
     * @param Resolution|value-of<Resolution>|null $resolution
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $claimDate = null,
        ?string $claimDescription = null,
        ClaimType|string|null $claimType = null,
        ?string $claimantContact = null,
        ?string $claimantName = null,
        ?array $contestDocuments = null,
        ?array $contestHistory = null,
        ?\DateTimeInterface $createdAt = null,
        Dir|array|null $dir = null,
        ?string $dirID = null,
        ?string $enterpriseID = null,
        Resolution|string|null $resolution = null,
        ?\DateTimeInterface $resolutionDate = null,
        ?string $resolutionNotes = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $claimDate && $self['claimDate'] = $claimDate;
        null !== $claimDescription && $self['claimDescription'] = $claimDescription;
        null !== $claimType && $self['claimType'] = $claimType;
        null !== $claimantContact && $self['claimantContact'] = $claimantContact;
        null !== $claimantName && $self['claimantName'] = $claimantName;
        null !== $contestDocuments && $self['contestDocuments'] = $contestDocuments;
        null !== $contestHistory && $self['contestHistory'] = $contestHistory;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $dir && $self['dir'] = $dir;
        null !== $dirID && $self['dirID'] = $dirID;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $resolution && $self['resolution'] = $resolution;
        null !== $resolutionDate && $self['resolutionDate'] = $resolutionDate;
        null !== $resolutionNotes && $self['resolutionNotes'] = $resolutionNotes;
        null !== $status && $self['status'] = $status;
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
     * When the claim was filed (set by the claimant's representative at file time).
     */
    public function withClaimDate(\DateTimeInterface $claimDate): self
    {
        $self = clone $this;
        $self['claimDate'] = $claimDate;

        return $self;
    }

    public function withClaimDescription(string $claimDescription): self
    {
        $self = clone $this;
        $self['claimDescription'] = $claimDescription;

        return $self;
    }

    /**
     * Category of infringement being claimed.
     *
     * @param ClaimType|value-of<ClaimType> $claimType
     */
    public function withClaimType(ClaimType|string $claimType): self
    {
        $self = clone $this;
        $self['claimType'] = $claimType;

        return $self;
    }

    public function withClaimantContact(string $claimantContact): self
    {
        $self = clone $this;
        $self['claimantContact'] = $claimantContact;

        return $self;
    }

    public function withClaimantName(string $claimantName): self
    {
        $self = clone $this;
        $self['claimantName'] = $claimantName;

        return $self;
    }

    /**
     * Aggregated across all customer contest submissions on this claim.
     *
     * @param list<ContestDocument|ContestDocumentShape> $contestDocuments
     */
    public function withContestDocuments(array $contestDocuments): self
    {
        $self = clone $this;
        $self['contestDocuments'] = $contestDocuments;

        return $self;
    }

    /**
     * Per-round submission audit trail. Each entry records one `POST /infringement_claims/{id}/contest` call (notes, timestamp, document count). Aggregated documents live on `contest_documents`.
     *
     * @param list<ContestHistory|ContestHistoryShape> $contestHistory
     */
    public function withContestHistory(array $contestHistory): self
    {
        $self = clone $this;
        $self['contestHistory'] = $contestHistory;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Snapshot of the DIR the claim is filed against, embedded for convenience.
     *
     * @param Dir|DirShape $dir
     */
    public function withDir(Dir|array $dir): self
    {
        $self = clone $this;
        $self['dir'] = $dir;

        return $self;
    }

    public function withDirID(string $dirID): self
    {
        $self = clone $this;
        $self['dirID'] = $dirID;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * Set only when `status` is `resolved`.
     *
     * @param Resolution|value-of<Resolution>|null $resolution
     */
    public function withResolution(Resolution|string|null $resolution): self
    {
        $self = clone $this;
        $self['resolution'] = $resolution;

        return $self;
    }

    public function withResolutionDate(
        ?\DateTimeInterface $resolutionDate
    ): self {
        $self = clone $this;
        $self['resolutionDate'] = $resolutionDate;

        return $self;
    }

    public function withResolutionNotes(?string $resolutionNotes): self
    {
        $self = clone $this;
        $self['resolutionNotes'] = $resolutionNotes;

        return $self;
    }

    /**
     * Lifecycle status. `pending` - newly filed; the DIR is auto-suspended. `contested` - you have submitted contest evidence; awaiting Telnyx review. `resolved` - final.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
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
}
