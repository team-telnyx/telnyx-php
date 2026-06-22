<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\EnterpriseReputationPublic\LoaStatus;
use Telnyx\Enterprises\Reputation\EnterpriseReputationPublic\Status;

/**
 * @phpstan-type EnterpriseReputationPublicShape = array{
 *   checkFrequency?: null|ReputationCheckFrequency|value-of<ReputationCheckFrequency>,
 *   createdAt?: \DateTimeInterface|null,
 *   enterpriseID?: string|null,
 *   loaDocumentID?: string|null,
 *   loaStatus?: null|LoaStatus|value-of<LoaStatus>,
 *   rejectionReasons?: list<string>|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class EnterpriseReputationPublic implements BaseModel
{
    /** @use SdkModel<EnterpriseReputationPublicShape> */
    use SdkModel;

    /**
     * How often Telnyx refreshes the stored reputation data for this enterprise's registered numbers.
     *
     * @var value-of<ReputationCheckFrequency>|null $checkFrequency
     */
    #[Optional('check_frequency', enum: ReputationCheckFrequency::class)]
    public ?string $checkFrequency;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * Id of the signed LOA document.
     */
    #[Optional('loa_document_id', nullable: true)]
    public ?string $loaDocumentID;

    /**
     * Customer-facing Letter-of-Authorization verification state. `approved` is required (alongside reputation status) before phone numbers can be added.
     *
     * @var value-of<LoaStatus>|null $loaStatus
     */
    #[Optional('loa_status', enum: LoaStatus::class)]
    public ?string $loaStatus;

    /**
     * Populated when `status` is `rejected`.
     *
     * @var list<string>|null $rejectionReasons
     */
    #[Optional('rejection_reasons', list: 'string', nullable: true)]
    public ?array $rejectionReasons;

    /**
     * Lifecycle status of the enterprise's Phone Number Reputation activation.
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
     * @param ReputationCheckFrequency|value-of<ReputationCheckFrequency>|null $checkFrequency
     * @param LoaStatus|value-of<LoaStatus>|null $loaStatus
     * @param list<string>|null $rejectionReasons
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ReputationCheckFrequency|string|null $checkFrequency = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $enterpriseID = null,
        ?string $loaDocumentID = null,
        LoaStatus|string|null $loaStatus = null,
        ?array $rejectionReasons = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $checkFrequency && $self['checkFrequency'] = $checkFrequency;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $loaDocumentID && $self['loaDocumentID'] = $loaDocumentID;
        null !== $loaStatus && $self['loaStatus'] = $loaStatus;
        null !== $rejectionReasons && $self['rejectionReasons'] = $rejectionReasons;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * How often Telnyx refreshes the stored reputation data for this enterprise's registered numbers.
     *
     * @param ReputationCheckFrequency|value-of<ReputationCheckFrequency> $checkFrequency
     */
    public function withCheckFrequency(
        ReputationCheckFrequency|string $checkFrequency
    ): self {
        $self = clone $this;
        $self['checkFrequency'] = $checkFrequency;

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
     * Id of the signed LOA document.
     */
    public function withLoaDocumentID(?string $loaDocumentID): self
    {
        $self = clone $this;
        $self['loaDocumentID'] = $loaDocumentID;

        return $self;
    }

    /**
     * Customer-facing Letter-of-Authorization verification state. `approved` is required (alongside reputation status) before phone numbers can be added.
     *
     * @param LoaStatus|value-of<LoaStatus> $loaStatus
     */
    public function withLoaStatus(LoaStatus|string $loaStatus): self
    {
        $self = clone $this;
        $self['loaStatus'] = $loaStatus;

        return $self;
    }

    /**
     * Populated when `status` is `rejected`.
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
     * Lifecycle status of the enterprise's Phone Number Reputation activation.
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
