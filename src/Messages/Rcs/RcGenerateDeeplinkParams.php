<?php

declare(strict_types=1);

namespace Telnyx\Messages\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RcGenerateDeeplinkParams); // set properties as needed
 * $client->messages.rcs->generateDeeplink(...$params->toArray());
 * ```
 * Generate a deeplink URL that can be used to start an RCS conversation with a specific agent.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messages.rcs->generateDeeplink(...$params->toArray());`
 *
 * @see Telnyx\Messages\Rcs->generateDeeplink
 *
 * @phpstan-type rc_generate_deeplink_params = array{
 *   body?: string, phoneNumber?: string
 * }
 */
final class RcGenerateDeeplinkParams implements BaseModel
{
    /** @use SdkModel<rc_generate_deeplink_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Pre-filled message body (URL encoded).
     */
    #[Api(optional: true)]
    public ?string $body;

    /**
     * Phone number in E164 format (URL encoded).
     */
    #[Api(optional: true)]
    public ?string $phoneNumber;

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
        ?string $body = null,
        ?string $phoneNumber = null
    ): self {
        $obj = new self;

        null !== $body && $obj->body = $body;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Pre-filled message body (URL encoded).
     */
    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }

    /**
     * Phone number in E164 format (URL encoded).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
