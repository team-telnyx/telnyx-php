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
 * @phpstan-type AutorespConfigListParamsShape = array{
 *   country_code?: string,
 *   created_at?: CreatedAt|array{gte?: string|null, lte?: string|null},
 *   updated_at?: UpdatedAt|array{gte?: string|null, lte?: string|null},
 * }
 */
final class AutorespConfigListParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $country_code;

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    #[Optional]
    public ?CreatedAt $created_at;

    /**
     * Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte].
     */
    #[Optional]
    public ?UpdatedAt $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|array{gte?: string|null, lte?: string|null} $created_at
     * @param UpdatedAt|array{gte?: string|null, lte?: string|null} $updated_at
     */
    public static function with(
        ?string $country_code = null,
        CreatedAt|array|null $created_at = null,
        UpdatedAt|array|null $updated_at = null,
    ): self {
        $obj = new self;

        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     *
     * @param CreatedAt|array{gte?: string|null, lte?: string|null} $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte].
     *
     * @param UpdatedAt|array{gte?: string|null, lte?: string|null} $updatedAt
     */
    public function withUpdatedAt(UpdatedAt|array $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
