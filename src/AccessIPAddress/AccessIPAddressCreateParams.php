<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create new Access IP Address.
 *
 * @see Telnyx\Services\AccessIPAddressService::create()
 *
 * @phpstan-type AccessIPAddressCreateParamsShape = array{
 *   ipAddress: string, description?: string
 * }
 */
final class AccessIPAddressCreateParams implements BaseModel
{
    /** @use SdkModel<AccessIPAddressCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('ip_address')]
    public string $ipAddress;

    #[Optional]
    public ?string $description;

    /**
     * `new AccessIPAddressCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPAddressCreateParams::with(ipAddress: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPAddressCreateParams)->withIPAddress(...)
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
    public static function with(
        string $ipAddress,
        ?string $description = null
    ): self {
        $self = new self;

        $self['ipAddress'] = $ipAddress;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
