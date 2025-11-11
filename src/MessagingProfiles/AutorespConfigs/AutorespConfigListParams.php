<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\CreatedAt;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\UpdatedAt;

/**
 * List Auto-Response Settings.
 *
 * @see Telnyx\MessagingProfiles\AutorespConfigs->list
 *
 * @phpstan-type AutorespConfigListParamsShape = array{
 *   country_code?: string, created_at?: CreatedAt, updated_at?: UpdatedAt
 * }
 */
final class AutorespConfigListParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    /**
     * Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte].
     */
    #[Api(optional: true)]
    public ?UpdatedAt $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $country_code = null,
        ?CreatedAt $created_at = null,
        ?UpdatedAt $updated_at = null,
    ): self {
        $obj = new self;

        null !== $country_code && $obj->country_code = $country_code;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte].
     */
    public function withUpdatedAt(UpdatedAt $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
