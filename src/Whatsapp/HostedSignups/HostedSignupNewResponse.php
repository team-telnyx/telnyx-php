<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\HostedSignups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WhatsappHostedSignupShape from \Telnyx\Whatsapp\HostedSignups\WhatsappHostedSignup
 *
 * @phpstan-type HostedSignupNewResponseShape = array{
 *   data?: null|WhatsappHostedSignup|WhatsappHostedSignupShape
 * }
 */
final class HostedSignupNewResponse implements BaseModel
{
    /** @use SdkModel<HostedSignupNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WhatsappHostedSignup $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WhatsappHostedSignup|WhatsappHostedSignupShape|null $data
     */
    public static function with(WhatsappHostedSignup|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WhatsappHostedSignup|WhatsappHostedSignupShape $data
     */
    public function withData(WhatsappHostedSignup|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
