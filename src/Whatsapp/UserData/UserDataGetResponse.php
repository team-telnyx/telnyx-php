<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\UserData;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WhatsappUserDataShape from \Telnyx\Whatsapp\UserData\WhatsappUserData
 *
 * @phpstan-type UserDataGetResponseShape = array{
 *   data?: null|WhatsappUserData|WhatsappUserDataShape
 * }
 */
final class UserDataGetResponse implements BaseModel
{
    /** @use SdkModel<UserDataGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WhatsappUserData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WhatsappUserData|WhatsappUserDataShape|null $data
     */
    public static function with(WhatsappUserData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WhatsappUserData|WhatsappUserDataShape $data
     */
    public function withData(WhatsappUserData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
