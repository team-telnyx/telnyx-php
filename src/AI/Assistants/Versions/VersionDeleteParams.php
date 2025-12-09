<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Permanently removes a specific version of an assistant. Can not delete main version.
 *
 * @see Telnyx\Services\AI\Assistants\VersionsService::delete()
 *
 * @phpstan-type VersionDeleteParamsShape = array{assistantID: string}
 */
final class VersionDeleteParams implements BaseModel
{
    /** @use SdkModel<VersionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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
        $self = new self;

        $self['assistantID'] = $assistantID;

        return $self;
    }

    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }
}
