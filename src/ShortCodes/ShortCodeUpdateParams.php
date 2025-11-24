<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the settings for a specific short code. To unbind a short code from a profile, set the `messaging_profile_id` to `null` or an empty string.
 * To add or update tags, include the tags field as an array of strings.
 *
 * @see Telnyx\Services\ShortCodesService::update()
 *
 * @phpstan-type ShortCodeUpdateParamsShape = array{messaging_profile_id: string}
 */
final class ShortCodeUpdateParams implements BaseModel
{
    /** @use SdkModel<ShortCodeUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Api]
    public string $messaging_profile_id;

    /**
     * `new ShortCodeUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShortCodeUpdateParams::with(messaging_profile_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ShortCodeUpdateParams)->withMessagingProfileID(...)
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
    public static function with(string $messaging_profile_id): self
    {
        $obj = new self;

        $obj->messaging_profile_id = $messaging_profile_id;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messaging_profile_id = $messagingProfileID;

        return $obj;
    }
}
