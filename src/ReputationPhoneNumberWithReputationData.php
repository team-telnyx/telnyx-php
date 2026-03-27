<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReputationDataShape from \Telnyx\ReputationData
 *
 * @phpstan-type ReputationPhoneNumberWithReputationDataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   enterpriseID?: string|null,
 *   phoneNumber?: string|null,
 *   reputationData?: null|ReputationData|ReputationDataShape,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class ReputationPhoneNumberWithReputationData implements BaseModel
{
    /** @use SdkModel<ReputationPhoneNumberWithReputationDataShape> */
    use SdkModel;

    /**
     * Unique identifier.
     */
    #[Optional]
    public ?string $id;

    /**
     * When the number was associated.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * ID of the associated enterprise.
     */
    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * Phone number in E.164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Reputation metrics.
     */
    #[Optional('reputation_data')]
    public ?ReputationData $reputationData;

    /**
     * When the record was last updated.
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

    /**
     * Unique identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * When the number was associated.
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
     * Phone number in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Reputation metrics.
     *
     * @param ReputationData|ReputationDataShape $reputationData
     */
    public function withReputationData(
        ReputationData|array $reputationData
    ): self {
        $self = clone $this;
        $self['reputationData'] = $reputationData;

        return $self;
    }

    /**
     * When the record was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
