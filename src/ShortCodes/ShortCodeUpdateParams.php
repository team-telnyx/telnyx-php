<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the settings for a specific short code. To unbind a short code from a profile, set the `messaging_profile_id` to `null` or an empty string.
 *
 * @see Telnyx\ShortCodes->update
 *
 * @phpstan-type short_code_update_params = array{messagingProfileID: string}
 */
final class ShortCodeUpdateParams implements BaseModel
{
    /** @use SdkModel<short_code_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Api('messaging_profile_id')]
    public string $messagingProfileID;

    /**
     * `new ShortCodeUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ShortCodeUpdateParams::with(messagingProfileID: ...)
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
    public static function with(string $messagingProfileID): self
    {
        $obj = new self;

        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }
}
