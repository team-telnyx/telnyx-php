<?php

declare(strict_types=1);

namespace Telnyx\NotificationProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new NotificationProfileCreateParams); // set properties as needed
 * $client->notificationProfiles->create(...$params->toArray());
 * ```
 * Create a notification profile.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->notificationProfiles->create(...$params->toArray());`
 *
 * @see Telnyx\NotificationProfiles->create
 *
 * @phpstan-type notification_profile_create_params = array{name?: string}
 */
final class NotificationProfileCreateParams implements BaseModel
{
    /** @use SdkModel<notification_profile_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A human readable name.
     */
    #[Api(optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null): self
    {
        $obj = new self;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * A human readable name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
