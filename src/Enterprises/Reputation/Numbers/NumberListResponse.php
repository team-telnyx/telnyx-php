<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ReputationData;

/**
 * @phpstan-import-type ReputationDataShape from \Telnyx\ReputationData
 *
 * @phpstan-type NumberListResponseShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   enterpriseID?: string|null,
 *   phoneNumber?: string|null,
 *   reputationData?: null|ReputationData|ReputationDataShape,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class NumberListResponse implements BaseModel
{
    /** @use SdkModel<NumberListResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * E.164 with leading `+`.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * `null` until the first refresh has been collected for this number.
     */
    #[Optional('reputation_data', nullable: true)]
    public ?ReputationData $reputationData;

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
     * @param ReputationData|ReputationDataShape|null $reputationData
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $enterpriseID = null,
        ?string $phoneNumber = null,
        ReputationData|array|null $reputationData = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $reputationData && $self['reputationData'] = $reputationData;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * E.164 with leading `+`.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * `null` until the first refresh has been collected for this number.
     *
     * @param ReputationData|ReputationDataShape|null $reputationData
     */
    public function withReputationData(
        ReputationData|array|null $reputationData
    ): self {
        $self = clone $this;
        $self['reputationData'] = $reputationData;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
