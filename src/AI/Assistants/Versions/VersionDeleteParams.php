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
 * @see Telnyx\Services\AI\Assistants\VersionsService::delete()
 *
 * @phpstan-type VersionDeleteParamsShape = array{assistant_id: string}
 */
final class VersionDeleteParams implements BaseModel
{
    /** @use SdkModel<VersionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistant_id;

    /**
     * `new VersionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionDeleteParams::with(assistant_id: ...)
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
