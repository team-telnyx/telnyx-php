<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\TestDevices;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Adds an RCS-capable test number after provider agent creation. Repeating the request for a number already attached to the agent returns the existing test device.
 *
 * @see Telnyx\Services\Rcs\Agents\TestDevicesService::create()
 *
 * @phpstan-type TestDeviceCreateParamsShape = array{phoneNumber: string}
 */
final class TestDeviceCreateParams implements BaseModel
{
    /** @use SdkModel<TestDeviceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * `new TestDeviceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestDeviceCreateParams::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestDeviceCreateParams)->withPhoneNumber(...)
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
    public static function with(string $phoneNumber): self
    {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
