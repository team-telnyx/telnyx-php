<?php

declare(strict_types=1);

namespace Telnyx\Brand\BrandListResponse;

use Telnyx\Brand\BrandIdentityStatus;
use Telnyx\Brand\BrandListResponse\Record\Status;
use Telnyx\Brand\EntityType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type record_alias = array{
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
    /** @use SdkModel<record_alias> */
    use SdkModel;

    /**
     * Number of campaigns associated with the brand.
     */
    #[Api(optional: true)]
    public ?int $assignedCampaingsCount;

    /**
     * Unique identifier assigned to the brand.
     */
    #[Api('brandId', optional: true)]
    public ?string $brandID;

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    #[Api(optional: true)]
    public ?string $companyName;

    /**
     * Date and time that the brand was created at.
     */
    #[Api(optional: true)]
    public ?string $createdAt;

    /**
     * Display or marketing name of the brand.
     */
    #[Api(optional: true)]
    public ?string $displayName;

    /**
     * Valid email address of brand support contact.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * Entity type behind the brand. This is the form of business establishment.
     *
     * @var value-of<EntityType>|null $entityType
     */
    #[Api(enum: EntityType::class, optional: true)]
    public ?string $entityType;

    /**
     * Failure reasons for brand.
     */
    #[Api(optional: true)]
    public ?string $failureReasons;

    /**
     * The verification status of an active brand.
     *
     * @var value-of<BrandIdentityStatus>|null $identityStatus
     */
    #[Api(enum: BrandIdentityStatus::class, optional: true)]
    public ?string $identityStatus;

    /**
     * Status of the brand.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Unique identifier assigned to the brand by the registry.
     */
    #[Api('tcrBrandId', optional: true)]
    public ?string $tcrBrandID;

    /**
     * Date and time that the brand was last updated at.
     */
    #[Api(optional: true)]
    public ?string $updatedAt;

    /**
     * Brand website URL.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $assignedCampaingsCount && $obj->assignedCampaingsCount = $assignedCampaingsCount;
        null !== $brandID && $obj->brandID = $brandID;
        null !== $companyName && $obj->companyName = $companyName;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $displayName && $obj->displayName = $displayName;
        null !== $email && $obj->email = $email;
        null !== $entityType && $obj->entityType = $entityType instanceof EntityType ? $entityType->value : $entityType;
        null !== $failureReasons && $obj->failureReasons = $failureReasons;
        null !== $identityStatus && $obj->identityStatus = $identityStatus instanceof BrandIdentityStatus ? $identityStatus->value : $identityStatus;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $tcrBrandID && $obj->tcrBrandID = $tcrBrandID;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $website && $obj->website = $website;

        return $obj;
    }

    /**
     * Number of campaigns associated with the brand.
     */
    public function withAssignedCampaingsCount(
        int $assignedCampaingsCount
    ): self {
        $obj = clone $this;
        $obj->assignedCampaingsCount = $assignedCampaingsCount;

        return $obj;
    }

    /**
     * Unique identifier assigned to the brand.
     */
    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj->brandID = $brandID;

        return $obj;
    }

    /**
     * (Required for Non-profit/private/public) Legal company name.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj->companyName = $companyName;

        return $obj;
    }

    /**
     * Date and time that the brand was created at.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Display or marketing name of the brand.
     */
    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj->displayName = $displayName;

        return $obj;
    }

    /**
     * Valid email address of brand support contact.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

        return $obj;
    }

    /**
     * Entity type behind the brand. This is the form of business establishment.
     *
     * @param EntityType|value-of<EntityType> $entityType
     */
    public function withEntityType(EntityType|string $entityType): self
    {
        $obj = clone $this;
        $obj->entityType = $entityType instanceof EntityType ? $entityType->value : $entityType;

        return $obj;
    }

    /**
     * Failure reasons for brand.
     */
    public function withFailureReasons(string $failureReasons): self
    {
        $obj = clone $this;
        $obj->failureReasons = $failureReasons;

        return $obj;
    }

    /**
     * The verification status of an active brand.
     *
     * @param BrandIdentityStatus|value-of<BrandIdentityStatus> $identityStatus
     */
    public function withIdentityStatus(
        BrandIdentityStatus|string $identityStatus
    ): self {
        $obj = clone $this;
        $obj->identityStatus = $identityStatus instanceof BrandIdentityStatus ? $identityStatus->value : $identityStatus;

        return $obj;
    }

    /**
     * Status of the brand.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Unique identifier assigned to the brand by the registry.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $obj = clone $this;
        $obj->tcrBrandID = $tcrBrandID;

        return $obj;
    }

    /**
     * Date and time that the brand was last updated at.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Brand website URL.
     */
    public function withWebsite(string $website): self
    {
        $obj = clone $this;
        $obj->website = $website;

        return $obj;
    }
}
