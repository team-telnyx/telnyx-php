<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListResponse\Status;

/**
 * Slim list-endpoint shape. Omits per-number results and webhook URLs to keep responses small.
 *
 * @phpstan-type RemediationListResponseShape = array{
 *   id: string,
 *   callPurpose: string,
 *   createdAt: \DateTimeInterface,
 *   phoneNumbersCount: int,
 *   status: Status|value-of<Status>,
 *   updatedAt: \DateTimeInterface,
 *   tier1CompletedAt?: \DateTimeInterface|null,
 *   tier2CompletedAt?: \DateTimeInterface|null,
 * }
 */
final class RemediationListResponse implements BaseModel
{
    /** @use SdkModel<RemediationListResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('call_purpose')]
    public string $callPurpose;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('phone_numbers_count')]
    public int $phoneNumbersCount;

    /**
     * Customer-facing status of a remediation request.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Optional('tier1_completed_at', nullable: true)]
    public ?\DateTimeInterface $tier1CompletedAt;

    #[Optional('tier2_completed_at', nullable: true)]
    public ?\DateTimeInterface $tier2CompletedAt;

    /**
     * `new RemediationListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RemediationListResponse::with(
     *   id: ...,
     *   callPurpose: ...,
     *   createdAt: ...,
     *   phoneNumbersCount: ...,
     *   status: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RemediationListResponse)
     *   ->withID(...)
     *   ->withCallPurpose(...)
     *   ->withCreatedAt(...)
     *   ->withPhoneNumbersCount(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        string $callPurpose,
        \DateTimeInterface $createdAt,
        int $phoneNumbersCount,
        Status|string $status,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $tier1CompletedAt = null,
        ?\DateTimeInterface $tier2CompletedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['callPurpose'] = $callPurpose;
        $self['createdAt'] = $createdAt;
        $self['phoneNumbersCount'] = $phoneNumbersCount;
        $self['status'] = $status;
        $self['updatedAt'] = $updatedAt;

        null !== $tier1CompletedAt && $self['tier1CompletedAt'] = $tier1CompletedAt;
        null !== $tier2CompletedAt && $self['tier2CompletedAt'] = $tier2CompletedAt;

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

    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $self = clone $this;
        $self['phoneNumbersCount'] = $phoneNumbersCount;

        return $self;
    }

    /**
     * Customer-facing status of a remediation request.
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
}
