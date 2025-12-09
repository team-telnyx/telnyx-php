<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Promotes a specific version to be the main/current version of the assistant. This will delete any existing canary deploy configuration and send all live production traffic to this version.
 *
 * @see Telnyx\Services\AI\Assistants\VersionsService::promote()
 *
 * @phpstan-type VersionPromoteParamsShape = array{assistantID: string}
 */
final class VersionPromoteParams implements BaseModel
{
    /** @use SdkModel<VersionPromoteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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

        $obj['assistantID'] = $assistantID;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj['assistantID'] = $assistantID;

        return $obj;
    }
}
