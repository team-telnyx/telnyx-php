<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListResponse\PhoneNumber\RejectionReason;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListResponse\PhoneNumber\Status;

/**
 * @phpstan-import-type RejectionReasonShape from \Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListResponse\PhoneNumber\RejectionReason
 *
 * @phpstan-type PhoneNumberShape = array{
 *   id?: string|null,
 *   batchID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   dirID?: string|null,
 *   enterpriseID?: string|null,
 *   loaDocumentID?: string|null,
 *   phoneNumber?: string|null,
 *   rejectionReason?: null|RejectionReason|RejectionReasonShape,
 *   status?: null|\Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListResponse\PhoneNumber\Status|value-of<\Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListResponse\PhoneNumber\Status>,
 *   updatedAt?: \DateTimeInterface|null,
 *   verifiedAt?: \DateTimeInterface|null,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Id of the batch this number was vetted as part of.
     */
    #[Optional('batch_id', nullable: true)]
    public ?string $batchID;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('dir_id')]
    public ?string $dirID;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * Id of the Letter of Authorization document attached to this number's batch.
     */
    #[Optional('loa_document_id', nullable: true)]
    public ?string $loaDocumentID;

    /**
     * E.164 with leading `+`.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Populated when `status` is `unsuccessful` or `permanently_rejected`.
     */
    #[Optional('rejection_reason', nullable: true)]
    public ?RejectionReason $rejectionReason;

    /**
     * Phone-number lifecycle status.
     * - `submitted` / `in_review` — Telnyx is reviewing the batch this number belongs to.
     * - `verified` — approved; the DIR's display identity will be shown on outbound calls from this number.
     * - `unsuccessful` — Telnyx rejected this submission; the customer may re-add to retry.
     * - `suspended` — temporarily disabled (e.g. by an active infringement claim on the DIR).
     * - `expired` — verification expired; re-add to renew.
     * - `permanently_rejected` — terminal; cannot be re-added on this or any other DIR you own.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(
        enum: Status::class,
    )]
    public ?string $status;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('verified_at', nullable: true)]
    public ?\DateTimeInterface $verifiedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RejectionReason|RejectionReasonShape|null $rejectionReason
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?string $batchID = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $dirID = null,
        ?string $enterpriseID = null,
        ?string $loaDocumentID = null,
        ?string $phoneNumber = null,
        RejectionReason|array|null $rejectionReason = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $verifiedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $batchID && $self['batchID'] = $batchID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $dirID && $self['dirID'] = $dirID;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $loaDocumentID && $self['loaDocumentID'] = $loaDocumentID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $rejectionReason && $self['rejectionReason'] = $rejectionReason;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $verifiedAt && $self['verifiedAt'] = $verifiedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Id of the batch this number was vetted as part of.
     */
    public function withBatchID(?string $batchID): self
    {
        $self = clone $this;
        $self['batchID'] = $batchID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * Id of the Letter of Authorization document attached to this number's batch.
     */
    public function withLoaDocumentID(?string $loaDocumentID): self
    {
        $self = clone $this;
        $self['loaDocumentID'] = $loaDocumentID;

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
     * Populated when `status` is `unsuccessful` or `permanently_rejected`.
     *
     * @param RejectionReason|RejectionReasonShape|null $rejectionReason
     */
    public function withRejectionReason(
        RejectionReason|array|null $rejectionReason
    ): self {
        $self = clone $this;
        $self['rejectionReason'] = $rejectionReason;

        return $self;
    }

    /**
     * Phone-number lifecycle status.
     * - `submitted` / `in_review` — Telnyx is reviewing the batch this number belongs to.
     * - `verified` — approved; the DIR's display identity will be shown on outbound calls from this number.
     * - `unsuccessful` — Telnyx rejected this submission; the customer may re-add to retry.
     * - `suspended` — temporarily disabled (e.g. by an active infringement claim on the DIR).
     * - `expired` — verification expired; re-add to renew.
     * - `permanently_rejected` — terminal; cannot be re-added on this or any other DIR you own.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status,
    ): self {
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

    public function withVerifiedAt(?\DateTimeInterface $verifiedAt): self
    {
        $self = clone $this;
        $self['verifiedAt'] = $verifiedAt;

        return $self;
    }
}
