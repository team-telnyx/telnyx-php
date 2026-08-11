<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\CarrierApprovalResponse\ScopeType;
use Telnyx\Rcs\Agents\CarrierApprovalResponse\Status;

/**
 * @phpstan-type CarrierApprovalResponseShape = array{
 *   approvalID: string,
 *   approvedAt: \DateTimeInterface|null,
 *   carrier: string|null,
 *   rejectedReason: string|null,
 *   scopeType: ScopeType|value-of<ScopeType>,
 *   status: Status|value-of<Status>,
 *   submittedAt: \DateTimeInterface|null,
 * }
 */
final class CarrierApprovalResponse implements BaseModel
{
    /** @use SdkModel<CarrierApprovalResponseShape> */
    use SdkModel;

    #[Required('approval_id')]
    public string $approvalID;

    #[Required('approved_at')]
    public ?\DateTimeInterface $approvedAt;

    #[Required]
    public ?string $carrier;

    #[Required('rejected_reason')]
    public ?string $rejectedReason;

    /** @var value-of<ScopeType> $scopeType */
    #[Required('scope_type', enum: ScopeType::class)]
    public string $scopeType;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('submitted_at')]
    public ?\DateTimeInterface $submittedAt;

    /**
     * `new CarrierApprovalResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CarrierApprovalResponse::with(
     *   approvalID: ...,
     *   approvedAt: ...,
     *   carrier: ...,
     *   rejectedReason: ...,
     *   scopeType: ...,
     *   status: ...,
     *   submittedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CarrierApprovalResponse)
     *   ->withApprovalID(...)
     *   ->withApprovedAt(...)
     *   ->withCarrier(...)
     *   ->withRejectedReason(...)
     *   ->withScopeType(...)
     *   ->withStatus(...)
     *   ->withSubmittedAt(...)
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
     * @param ScopeType|value-of<ScopeType> $scopeType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $approvalID,
        ?\DateTimeInterface $approvedAt,
        ?string $carrier,
        ?string $rejectedReason,
        ScopeType|string $scopeType,
        Status|string $status,
        ?\DateTimeInterface $submittedAt,
    ): self {
        $self = new self;

        $self['approvalID'] = $approvalID;
        $self['approvedAt'] = $approvedAt;
        $self['carrier'] = $carrier;
        $self['rejectedReason'] = $rejectedReason;
        $self['scopeType'] = $scopeType;
        $self['status'] = $status;
        $self['submittedAt'] = $submittedAt;

        return $self;
    }

    public function withApprovalID(string $approvalID): self
    {
        $self = clone $this;
        $self['approvalID'] = $approvalID;

        return $self;
    }

    public function withApprovedAt(?\DateTimeInterface $approvedAt): self
    {
        $self = clone $this;
        $self['approvedAt'] = $approvedAt;

        return $self;
    }

    public function withCarrier(?string $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    public function withRejectedReason(?string $rejectedReason): self
    {
        $self = clone $this;
        $self['rejectedReason'] = $rejectedReason;

        return $self;
    }

    /**
     * @param ScopeType|value-of<ScopeType> $scopeType
     */
    public function withScopeType(ScopeType|string $scopeType): self
    {
        $self = clone $this;
        $self['scopeType'] = $scopeType;

        return $self;
    }

    /**
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
}
