<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Delete Auto-Response Setting.
 *
 * @see Telnyx\STAINLESS_FIXME_MessagingProfiles\AutorespConfigsService::delete()
 *
 * @phpstan-type AutorespConfigDeleteParamsShape = array{profile_id: string}
 */
final class AutorespConfigDeleteParams implements BaseModel
{
    /** @use SdkModel<AutorespConfigDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $profile_id;

    /**
     * `new AutorespConfigDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigDeleteParams::with(profile_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutorespConfigDeleteParams)->withProfileID(...)
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
     */
    public static function with(string $profile_id): self
    {
        $obj = new self;

        $obj->profile_id = $profile_id;

        return $obj;
    }

    public function withProfileID(string $profileID): self
    {
        $obj = clone $this;
        $obj->profile_id = $profileID;

        return $obj;
    }
}
