<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Permanently removes a specific version of an assistant. Can not delete main version.
 *
 * @see Telnyx\AI\Assistants\Versions->delete
 *
 * @phpstan-type version_delete_params = array{assistantID: string}
 */
final class VersionDeleteParams implements BaseModel
{
    /** @use SdkModel<version_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistantID;

    /**
     * `new VersionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionDeleteParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionDeleteParams)->withAssistantID(...)
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
