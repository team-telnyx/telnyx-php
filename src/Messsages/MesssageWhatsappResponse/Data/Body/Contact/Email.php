<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappResponse\Data\Body\Contact;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailShape = array{email?: string|null, type?: string|null}
 */
final class Email implements BaseModel
{
    /** @use SdkModel<EmailShape> */
    use SdkModel;

    #[Optional]
    public ?string $email;

    #[Optional]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $email = null, ?string $type = null): self
    {
        $self = new self;

        null !== $email && $self['email'] = $email;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
