<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Revokes a key and returns it as it was, without its value. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\KeysService::delete()
 *
 * @phpstan-type KeyDeleteParamsShape = array{instanceID: string}
 */
final class KeyDeleteParams implements BaseModel
{
    /** @use SdkModel<KeyDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `new KeyDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KeyDeleteParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KeyDeleteParams)->withInstanceID(...)
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
    public static function with(string $instanceID): self
    {
        $self = new self;

        $self['instanceID'] = $instanceID;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

        return $self;
    }
}
