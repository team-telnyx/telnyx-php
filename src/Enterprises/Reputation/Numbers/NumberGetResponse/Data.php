<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse\Data\ReputationData;

/**
 * @phpstan-import-type ReputationDataVariants from \Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse\Data\ReputationData
 * @phpstan-import-type ReputationDataShape from \Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse\Data\ReputationData
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   enterpriseID?: string|null,
 *   phoneNumber?: string|null,
 *   reputationData?: ReputationDataShape|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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
     * Reputation metrics (null if not yet fetched).
     *
     * @var ReputationDataVariants|null $reputationData
     */
    #[Optional('reputation_data', union: ReputationData::class)]
    public mixed $reputationData;

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
     * @param ReputationDataShape|null $reputationData
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $enterpriseID = null,
        ?string $phoneNumber = null,
        mixed $reputationData = null,
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
     * Reputation metrics (null if not yet fetched).
     *
     * @param ReputationDataShape $reputationData
     */
    public function withReputationData(mixed $reputationData): self
    {
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
