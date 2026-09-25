<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sender projection in account event polling. The display name is explicitly null when the message has no sender name.
 *
 * @phpstan-type FromShape = array{email: string, name: string|null}
 */
final class From implements BaseModel
{
    /** @use SdkModel<FromShape> */
    use SdkModel;

    #[Required]
    public string $email;

    #[Required]
    public ?string $name;

    /**
     * `new From()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * From::with(email: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new From)->withEmail(...)->withName(...)
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
    public static function with(string $email, ?string $name): self
    {
        $self = new self;

        $self['email'] = $email;
        $self['name'] = $name;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
