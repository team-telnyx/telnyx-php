<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type GlobalIPShape = array{id?: string|null, ip_address?: string|null}
 */
final class GlobalIP implements BaseModel
{
    /** @use SdkModel<GlobalIPShape> */
    use SdkModel;

    /**
     * Global IP ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * The Global IP address.
     */
    #[Optional]
    public ?string $ip_address;

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
        ?string $id = null,
        ?string $ip_address = null
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $ip_address && $obj['ip_address'] = $ip_address;

        return $obj;
    }

    /**
     * Global IP ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The Global IP address.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ip_address'] = $ipAddress;

        return $obj;
    }
}
