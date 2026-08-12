<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\TestDevices;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Removes a test device from an RCS agent and its provider registration.
 *
 * @see Telnyx\Services\Rcs\Agents\TestDevicesService::delete()
 *
 * @phpstan-type TestDeviceDeleteParamsShape = array{id: string}
 */
final class TestDeviceDeleteParams implements BaseModel
{
    /** @use SdkModel<TestDeviceDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new TestDeviceDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestDeviceDeleteParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestDeviceDeleteParams)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
