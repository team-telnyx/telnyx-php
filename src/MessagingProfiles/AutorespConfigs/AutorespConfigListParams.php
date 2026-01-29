<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\CreatedAt;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\UpdatedAt;

/**
 * List Auto-Response Settings.
 *
 * @see Telnyx\Services\MessagingProfiles\AutorespConfigsService::list()
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\CreatedAt
 * @phpstan-import-type UpdatedAtShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\UpdatedAt
 *
 * @phpstan-type AutorespConfigListParamsShape = array{
 *   countryCode?: string|null,
 *   createdAt?: null|CreatedAt|CreatedAtShape,
 *   updatedAt?: null|UpdatedAt|UpdatedAtShape,
 * }
 */
final class AutorespConfigListParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $countryCode;

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    #[Optional]
    public ?CreatedAt $createdAt;

    /**
     * Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte].
     */
    #[Optional]
    public ?UpdatedAt $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|CreatedAtShape|null $createdAt
     * @param UpdatedAt|UpdatedAtShape|null $updatedAt
     */
    public static function with(
        ?string $countryCode = null,
        CreatedAt|array|null $createdAt = null,
        UpdatedAt|array|null $updatedAt = null,
    ): self {
        $self = new self;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     *
     * @param CreatedAt|CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte].
     *
     * @param UpdatedAt|UpdatedAtShape $updatedAt
     */
    public function withUpdatedAt(UpdatedAt|array $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
