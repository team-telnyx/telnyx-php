<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a Global IP.
 *
 * @see Telnyx\Services\GlobalIPsService::create()
 *
 * @phpstan-type GlobalIPCreateParamsShape = array{
 *   description?: string|null,
 *   name?: string|null,
 *   ports?: array<string,mixed>|null,
 * }
 */
final class GlobalIPCreateParams implements BaseModel
{
    /** @use SdkModel<GlobalIPCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A user specified description for the address.
     */
    #[Optional]
    public ?string $description;

    /**
     * A user specified name for the address.
     */
    #[Optional]
    public ?string $name;

    /**
     * A Global IP ports grouped by protocol code.
     *
     * @var array<string,mixed>|null $ports
     */
    #[Optional(map: 'mixed')]
    public ?array $ports;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $ports
     */
    public static function with(
        ?string $description = null,
        ?string $name = null,
        ?array $ports = null
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $ports && $self['ports'] = $ports;

        return $self;
    }

    /**
     * A user specified description for the address.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * A user specified name for the address.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A Global IP ports grouped by protocol code.
     *
     * @param array<string,mixed> $ports
     */
    public function withPorts(array $ports): self
    {
        $self = clone $this;
        $self['ports'] = $ports;

        return $self;
    }
}
