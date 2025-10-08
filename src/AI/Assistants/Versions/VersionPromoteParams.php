<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VersionPromoteParams); // set properties as needed
 * $client->ai.assistants.versions->promote(...$params->toArray());
 * ```
 * Promotes a specific version to be the main/current version of the assistant. This will delete any existing canary deploy configuration and send all live production traffic to this version.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants.versions->promote(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants\Versions->promote
 *
 * @phpstan-type version_promote_params = array{assistantID: string}
 */
final class VersionPromoteParams implements BaseModel
{
    /** @use SdkModel<version_promote_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistantID;

    /**
     * `new VersionPromoteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionPromoteParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionPromoteParams)->withAssistantID(...)
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
    public static function with(string $assistantID): self
    {
        $obj = new self;

        $obj->assistantID = $assistantID;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistantID = $assistantID;

        return $obj;
    }
}
