<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AutorespConfigDeleteParams); // set properties as needed
 * $client->messagingProfiles.autorespConfigs->delete(...$params->toArray());
 * ```
 * Delete Auto-Response Setting.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messagingProfiles.autorespConfigs->delete(...$params->toArray());`
 *
 * @see Telnyx\MessagingProfiles\AutorespConfigs->delete
 *
 * @phpstan-type autoresp_config_delete_params = array{profileID: string}
 */
final class AutorespConfigDeleteParams implements BaseModel
{
    /** @use SdkModel<autoresp_config_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $profileID;

    /**
     * `new AutorespConfigDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutorespConfigDeleteParams::with(profileID: ...)
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
    public static function with(string $profileID): self
    {
        $obj = new self;

        $obj->profileID = $profileID;

        return $obj;
    }

    public function withProfileID(string $profileID): self
    {
        $obj = clone $this;
        $obj->profileID = $profileID;

        return $obj;
    }
}
