<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Dir\DirNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Dir\DirNewResponse\Data\CallReason;
use Telnyx\Enterprises\Dir\DirNewResponse\Data\Document;
use Telnyx\Enterprises\Dir\DirNewResponse\Data\RejectionReason;
use Telnyx\Enterprises\Dir\DirNewResponse\Data\Status;

/**
 * @phpstan-import-type CallReasonShape from \Telnyx\Enterprises\Dir\DirNewResponse\Data\CallReason
 * @phpstan-import-type DocumentShape from \Telnyx\Enterprises\Dir\DirNewResponse\Data\Document
 * @phpstan-import-type RejectionReasonShape from \Telnyx\Enterprises\Dir\DirNewResponse\Data\RejectionReason
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   authorizerEmail?: string|null,
 *   authorizerName?: string|null,
 *   callReasons?: list<CallReason|CallReasonShape>|null,
 *   certifyBrandIsAccurate?: bool|null,
 *   certifyIPOwnership?: bool|null,
 *   certifyNoShaftContent?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   displayName?: string|null,
 *   documents?: list<Document|DocumentShape>|null,
 *   enterpriseID?: string|null,
 *   expiringAt?: \DateTimeInterface|null,
 *   logoURL?: string|null,
 *   rejectedAt?: \DateTimeInterface|null,
 *   rejectionReasons?: list<RejectionReason|RejectionReasonShape>|null,
 *   reselling?: bool|null,
 *   status?: null|Status|value-of<Status>,
 *   submittedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   verifiedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('authorizer_email', nullable: true)]
    public ?string $authorizerEmail;

    #[Optional('authorizer_name', nullable: true)]
    public ?string $authorizerName;

    /** @var list<CallReason>|null $callReasons */
    #[Optional('call_reasons', list: CallReason::class)]
    public ?array $callReasons;

    #[Optional('certify_brand_is_accurate')]
    public ?bool $certifyBrandIsAccurate;

    #[Optional('certify_ip_ownership')]
    public ?bool $certifyIPOwnership;

    #[Optional('certify_no_shaft_content')]
    public ?bool $certifyNoShaftContent;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('display_name')]
    public ?string $displayName;

    /** @var list<Document>|null $documents */
    #[Optional(list: Document::class, nullable: true)]
    public ?array $documents;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    #[Optional('expiring_at', nullable: true)]
    public ?\DateTimeInterface $expiringAt;

    #[Optional('logo_url', nullable: true)]
    public ?string $logoURL;

    #[Optional('rejected_at', nullable: true)]
    public ?\DateTimeInterface $rejectedAt;

    /**
     * Populated when `status` is `rejected`; cleared on `/submit` or successful approval.
     *
     * @var list<RejectionReason>|null $rejectionReasons
     */
    #[Optional('rejection_reasons', list: RejectionReason::class, nullable: true)]
    public ?array $rejectionReasons;

    #[Optional]
    public ?bool $reselling;

    /**
     * DIR lifecycle status.
     * - `draft` - newly created; editable; not yet submitted.
     * - `submitted` / `in_review` - Telnyx is reviewing.
     * - `verified` - approved; phone numbers may be attached.
     * - `rejected` - Telnyx rejected this submission; `rejection_reasons` is populated; customer can edit and resubmit.
     * - `unsuccessful` - system-side error during processing; customer can edit and resubmit.
     * - `suspended` - temporarily disabled (e.g. by an active infringement claim).
     * - `expired` - verification expired; customer must resubmit.
     * - `infringement_claimed` - a trademark/impersonation claim is open against this DIR.
     * - `permanently_rejected` - terminal; cannot be resubmitted.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional('submitted_at', nullable: true)]
    public ?\DateTimeInterface $submittedAt;

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
     * @param list<CallReason|CallReasonShape>|null $callReasons
     * @param list<Document|DocumentShape>|null $documents
     * @param list<RejectionReason|RejectionReasonShape>|null $rejectionReasons
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?string $authorizerEmail = null,
        ?string $authorizerName = null,
        ?array $callReasons = null,
        ?bool $certifyBrandIsAccurate = null,
        ?bool $certifyIPOwnership = null,
        ?bool $certifyNoShaftContent = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $displayName = null,
        ?array $documents = null,
        ?string $enterpriseID = null,
        ?\DateTimeInterface $expiringAt = null,
        ?string $logoURL = null,
        ?\DateTimeInterface $rejectedAt = null,
        ?array $rejectionReasons = null,
        ?bool $reselling = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $submittedAt = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $verifiedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $authorizerEmail && $self['authorizerEmail'] = $authorizerEmail;
        null !== $authorizerName && $self['authorizerName'] = $authorizerName;
        null !== $callReasons && $self['callReasons'] = $callReasons;
        null !== $certifyBrandIsAccurate && $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;
        null !== $certifyIPOwnership && $self['certifyIPOwnership'] = $certifyIPOwnership;
        null !== $certifyNoShaftContent && $self['certifyNoShaftContent'] = $certifyNoShaftContent;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $documents && $self['documents'] = $documents;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $expiringAt && $self['expiringAt'] = $expiringAt;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $rejectedAt && $self['rejectedAt'] = $rejectedAt;
        null !== $rejectionReasons && $self['rejectionReasons'] = $rejectionReasons;
        null !== $reselling && $self['reselling'] = $reselling;
        null !== $status && $self['status'] = $status;
        null !== $submittedAt && $self['submittedAt'] = $submittedAt;
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

    public function withAuthorizerEmail(?string $authorizerEmail): self
    {
        $self = clone $this;
        $self['authorizerEmail'] = $authorizerEmail;

        return $self;
    }

    public function withAuthorizerName(?string $authorizerName): self
    {
        $self = clone $this;
        $self['authorizerName'] = $authorizerName;

        return $self;
    }

    /**
     * @param list<CallReason|CallReasonShape> $callReasons
     */
    public function withCallReasons(array $callReasons): self
    {
        $self = clone $this;
        $self['callReasons'] = $callReasons;

        return $self;
    }

    public function withCertifyBrandIsAccurate(
        bool $certifyBrandIsAccurate
    ): self {
        $self = clone $this;
        $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;

        return $self;
    }

    public function withCertifyIPOwnership(bool $certifyIPOwnership): self
    {
        $self = clone $this;
        $self['certifyIPOwnership'] = $certifyIPOwnership;

        return $self;
    }

    public function withCertifyNoShaftContent(bool $certifyNoShaftContent): self
    {
        $self = clone $this;
        $self['certifyNoShaftContent'] = $certifyNoShaftContent;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * @param list<Document|DocumentShape>|null $documents
     */
    public function withDocuments(?array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    public function withExpiringAt(?\DateTimeInterface $expiringAt): self
    {
        $self = clone $this;
        $self['expiringAt'] = $expiringAt;

        return $self;
    }

    public function withLogoURL(?string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }

    public function withRejectedAt(?\DateTimeInterface $rejectedAt): self
    {
        $self = clone $this;
        $self['rejectedAt'] = $rejectedAt;

        return $self;
    }

    /**
     * Populated when `status` is `rejected`; cleared on `/submit` or successful approval.
     *
     * @param list<RejectionReason|RejectionReasonShape>|null $rejectionReasons
     */
    public function withRejectionReasons(?array $rejectionReasons): self
    {
        $self = clone $this;
        $self['rejectionReasons'] = $rejectionReasons;

        return $self;
    }

    public function withReselling(bool $reselling): self
    {
        $self = clone $this;
        $self['reselling'] = $reselling;

        return $self;
    }

    /**
     * DIR lifecycle status.
     * - `draft` - newly created; editable; not yet submitted.
     * - `submitted` / `in_review` - Telnyx is reviewing.
     * - `verified` - approved; phone numbers may be attached.
     * - `rejected` - Telnyx rejected this submission; `rejection_reasons` is populated; customer can edit and resubmit.
     * - `unsuccessful` - system-side error during processing; customer can edit and resubmit.
     * - `suspended` - temporarily disabled (e.g. by an active infringement claim).
     * - `expired` - verification expired; customer must resubmit.
     * - `infringement_claimed` - a trademark/impersonation claim is open against this DIR.
     * - `permanently_rejected` - terminal; cannot be resubmitted.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
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
