<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Promotes a specific version to be the main/current version of the assistant. This will delete any existing canary deploy configuration and send all live production traffic to this version.
 *
 * @see Telnyx\AI\Assistants\Versions->promote
 *
 * @phpstan-type VersionPromoteParamsShape = array{assistant_id: string}
 */
final class VersionPromoteParams implements BaseModel
{
    /** @use SdkModel<VersionPromoteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistant_id;

    /**
     * `new VersionPromoteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionPromoteParams::with(assistant_id: ...)
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
    public static function with(string $assistant_id): self
    {
        $obj = new self;

        $obj->assistant_id = $assistant_id;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistant_id = $assistantID;

        return $obj;
    }
}
