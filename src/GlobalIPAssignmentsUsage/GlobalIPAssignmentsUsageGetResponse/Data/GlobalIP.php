<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type GlobalIPShape = array{id?: string|null, ipAddress?: string|null}
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
    #[Optional('ip_address')]
    public ?string $ipAddress;

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
        ?string $ipAddress = null
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $ipAddress && $obj['ipAddress'] = $ipAddress;

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
        $obj['ipAddress'] = $ipAddress;

        return $obj;
    }
}
