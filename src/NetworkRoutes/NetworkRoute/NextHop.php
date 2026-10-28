<?php

declare(strict_types=1);

namespace Telnyx\NetworkRoutes\NetworkRoute;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkRoutes\NetworkRoute\NextHop\Type;

/**
 * Where the Network sends traffic for the route's CIDR.
 *
 * @phpstan-type NextHopShape = array{id: string, type: Type|value-of<Type>}
 */
final class NextHop implements BaseModel
{
    /** @use SdkModel<NextHopShape> */
    use SdkModel;

    /**
     * The id of the tunnel or attachment.
     */
    #[Required]
    public string $id;

    /**
     * The type of the next hop. Routes added with `POST /network_routes` use `tunnel`. Routes that attachments install carry the attachment's type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new NextHop()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NextHop::with(id: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NextHop)->withID(...)->withType(...)
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
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(string $id, Type|string $type): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The id of the tunnel or attachment.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The type of the next hop. Routes added with `POST /network_routes` use `tunnel`. Routes that attachments install carry the attachment's type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
