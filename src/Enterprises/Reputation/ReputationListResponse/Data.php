<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\ReputationListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\ReputationListResponse\Data\CheckFrequency;
use Telnyx\Enterprises\Reputation\ReputationListResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   checkFrequency?: null|CheckFrequency|value-of<CheckFrequency>,
 *   createdAt?: \DateTimeInterface|null,
 *   enterpriseID?: string|null,
 *   loaDocumentID?: string|null,
 *   rejectionReasons?: list<string>|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Frequency for refreshing reputation data.
     *
     * @var value-of<CheckFrequency>|null $checkFrequency
     */
    #[Optional('check_frequency', enum: CheckFrequency::class)]
    public ?string $checkFrequency;

    /**
     * When the reputation settings were created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * ID of the associated enterprise.
     */
    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * ID of the signed LOA document.
     */
    #[Optional('loa_document_id', nullable: true)]
    public ?string $loaDocumentID;

    /**
     * Reasons for rejection (present when status is rejected).
     *
     * @var list<string>|null $rejectionReasons
     */
    #[Optional('rejection_reasons', list: 'string', nullable: true)]
    public ?array $rejectionReasons;

    /**
     * Current enrollment status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * When the reputation settings were last updated.
     */
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
     * @param CheckFrequency|value-of<CheckFrequency>|null $checkFrequency
     * @param list<string>|null $rejectionReasons
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        CheckFrequency|string|null $checkFrequency = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $enterpriseID = null,
        ?string $loaDocumentID = null,
        ?array $rejectionReasons = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $checkFrequency && $self['checkFrequency'] = $checkFrequency;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $loaDocumentID && $self['loaDocumentID'] = $loaDocumentID;
        null !== $rejectionReasons && $self['rejectionReasons'] = $rejectionReasons;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Frequency for refreshing reputation data.
     *
     * @param CheckFrequency|value-of<CheckFrequency> $checkFrequency
     */
    public function withCheckFrequency(
        CheckFrequency|string $checkFrequency
    ): self {
        $self = clone $this;
        $self['checkFrequency'] = $checkFrequency;

        return $self;
    }

    /**
     * When the reputation settings were created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ID of the associated enterprise.
     */
    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * ID of the signed LOA document.
     */
    public function withLoaDocumentID(?string $loaDocumentID): self
    {
        $self = clone $this;
        $self['loaDocumentID'] = $loaDocumentID;

        return $self;
    }

    /**
     * Reasons for rejection (present when status is rejected).
     *
     * @param list<string>|null $rejectionReasons
     */
    public function withRejectionReasons(?array $rejectionReasons): self
    {
        $self = clone $this;
        $self['rejectionReasons'] = $rejectionReasons;

        return $self;
    }

    /**
     * Current enrollment status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * When the reputation settings were last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
