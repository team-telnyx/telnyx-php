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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AutorespConfigListParams); // set properties as needed
 * $client->messagingProfiles.autorespConfigs->list(...$params->toArray());
 * ```
 * List Auto-Response Settings.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messagingProfiles.autorespConfigs->list(...$params->toArray());`
 *
 * @see Telnyx\MessagingProfiles\AutorespConfigs->list
 *
 * @phpstan-type autoresp_config_list_params = array{
 *   countryCode?: string, createdAt?: CreatedAt, updatedAt?: UpdatedAt
 * }
 */
final class AutorespConfigListParams implements BaseModel
{
    /** @use SdkModel<autoresp_config_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $countryCode;

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    #[Api(optional: true)]
    public ?CreatedAt $createdAt;

    /**
     * Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte].
     */
    #[Api(optional: true)]
    public ?UpdatedAt $updatedAt;

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
        ?string $countryCode = null,
        ?CreatedAt $createdAt = null,
        ?UpdatedAt $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte].
     */
    public function withUpdatedAt(UpdatedAt $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
