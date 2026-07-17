<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FromShape = array{email: string, name?: string|null}
 */
final class From implements BaseModel
{
    /** @use SdkModel<FromShape> */
    use SdkModel;

    #[Required]
    public string $email;

    #[Optional]
    public ?string $name;

    /**
     * `new From()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * From::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new From)->withEmail(...)
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
    public static function with(string $email, ?string $name = null): self
    {
        $self = new self;

        $self['email'] = $email;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
