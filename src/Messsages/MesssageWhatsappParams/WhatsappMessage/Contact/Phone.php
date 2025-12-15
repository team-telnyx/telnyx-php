<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Contact;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneShape = array{
 *   phone?: string|null, type?: string|null, waID?: string|null
 * }
 */
final class Phone implements BaseModel
{
    /** @use SdkModel<PhoneShape> */
    use SdkModel;

    #[Optional]
    public ?string $phone;

    #[Optional]
    public ?string $type;

    #[Optional('wa_id')]
    public ?string $waID;

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
        ?string $phone = null,
        ?string $type = null,
        ?string $waID = null
    ): self {
        $self = new self;

        null !== $phone && $self['phone'] = $phone;
        null !== $type && $self['type'] = $type;
        null !== $waID && $self['waID'] = $waID;

        return $self;
    }

    public function withPhone(string $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withWaID(string $waID): self
    {
        $self = clone $this;
        $self['waID'] = $waID;

        return $self;
    }
}
