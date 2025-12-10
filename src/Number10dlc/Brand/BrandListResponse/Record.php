<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand\BrandListResponse;

use Telnyx\Brand\BrandIdentityStatus;
use Telnyx\Brand\EntityType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Number10dlc\Brand\BrandListResponse\Record\Status;

/**
 * @phpstan-type RecordShape = array{
 *   assignedCampaingsCount?: int|null,
 *   brandID?: string|null,
 *   companyName?: string|null,
 *   createdAt?: string|null,
 *   displayName?: string|null,
 *   email?: string|null,
 *   entityType?: value-of<EntityType>|null,
 *   failureReasons?: string|null,
 *   identityStatus?: value-of<BrandIdentityStatus>|null,
 *   status?: value-of<Status>|null,
 *   tcrBrandID?: string|null,
 *   updatedAt?: string|null,
 *   website?: string|null,
 * }
 */
final class Record implements BaseModel
{
    /** @use SdkModel<RecordShape> */
    use SdkModel;

    /**
     * Number of campaigns associated with the brand.
     */
    #[Optional]
    public ?int $assignedCampaingsCount;

    /**
     * Unique identifier assigned to the brand.
     */
    #[Optional('brandId')]
    public ?string $brandID;

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    #[Optional]
    public ?string $companyName;

    /**
     * Date and time that the brand was created at.
     */
    #[Optional]
    public ?string $createdAt;

    /**
     * Display or marketing name of the brand.
     */
    #[Optional]
    public ?string $displayName;

    /**
     * Valid email address of brand support contact.
     */
    #[Optional]
    public ?string $email;

    /**
     * Entity type behind the brand. This is the form of business establishment.
     *
     * @var value-of<EntityType>|null $entityType
     */
    #[Optional(enum: EntityType::class)]
    public ?string $entityType;

    /**
     * Failure reasons for brand.
     */
    #[Optional]
    public ?string $failureReasons;

    /**
     * The verification status of an active brand.
     *
     * @var value-of<BrandIdentityStatus>|null $identityStatus
     */
    #[Optional(enum: BrandIdentityStatus::class)]
    public ?string $identityStatus;

    /**
     * Status of the brand.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Unique identifier assigned to the brand by the registry.
     */
    #[Optional('tcrBrandId')]
    public ?string $tcrBrandID;

    /**
     * Date and time that the brand was last updated at.
     */
    #[Optional]
    public ?string $updatedAt;

    /**
     * Brand website URL.
     */
    #[Optional]
    public ?string $website;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EntityType|value-of<EntityType> $entityType
     * @param BrandIdentityStatus|value-of<BrandIdentityStatus> $identityStatus
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?int $assignedCampaingsCount = null,
        ?string $brandID = null,
        ?string $companyName = null,
        ?string $createdAt = null,
        ?string $displayName = null,
        ?string $email = null,
        EntityType|string|null $entityType = null,
        ?string $failureReasons = null,
        BrandIdentityStatus|string|null $identityStatus = null,
        Status|string|null $status = null,
        ?string $tcrBrandID = null,
        ?string $updatedAt = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $assignedCampaingsCount && $self['assignedCampaingsCount'] = $assignedCampaingsCount;
        null !== $brandID && $self['brandID'] = $brandID;
        null !== $companyName && $self['companyName'] = $companyName;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $email && $self['email'] = $email;
        null !== $entityType && $self['entityType'] = $entityType;
        null !== $failureReasons && $self['failureReasons'] = $failureReasons;
        null !== $identityStatus && $self['identityStatus'] = $identityStatus;
        null !== $status && $self['status'] = $status;
        null !== $tcrBrandID && $self['tcrBrandID'] = $tcrBrandID;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $website && $self['website'] = $website;

        return $self;
    }

    /**
     * Number of campaigns associated with the brand.
     */
    public function withAssignedCampaingsCount(
        int $assignedCampaingsCount
    ): self {
        $self = clone $this;
        $self['assignedCampaingsCount'] = $assignedCampaingsCount;

        return $self;
    }

    /**
     * Unique identifier assigned to the brand.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    public function withCompanyName(string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    /**
     * Date and time that the brand was created at.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Display or marketing name of the brand.
     */
    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Valid email address of brand support contact.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Entity type behind the brand. This is the form of business establishment.
     *
     * @param EntityType|value-of<EntityType> $entityType
     */
    public function withEntityType(EntityType|string $entityType): self
    {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    /**
     * Failure reasons for brand.
     */
    public function withFailureReasons(string $failureReasons): self
    {
        $self = clone $this;
        $self['failureReasons'] = $failureReasons;

        return $self;
    }

    /**
     * The verification status of an active brand.
     *
     * @param BrandIdentityStatus|value-of<BrandIdentityStatus> $identityStatus
     */
    public function withIdentityStatus(
        BrandIdentityStatus|string $identityStatus
    ): self {
        $self = clone $this;
        $self['identityStatus'] = $identityStatus;

        return $self;
    }

    /**
     * Status of the brand.
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
     * Unique identifier assigned to the brand by the registry.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $self = clone $this;
        $self['tcrBrandID'] = $tcrBrandID;

        return $self;
    }

    /**
     * Date and time that the brand was last updated at.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Brand website URL.
     */
    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
