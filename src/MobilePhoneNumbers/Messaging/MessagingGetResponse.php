<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MobilePhoneNumberWithMessagingSettingsShape from \Telnyx\MobilePhoneNumbers\Messaging\MobilePhoneNumberWithMessagingSettings
 *
 * @phpstan-type MessagingGetResponseShape = array{
 *   data?: null|MobilePhoneNumberWithMessagingSettings|MobilePhoneNumberWithMessagingSettingsShape,
 * }
 */
final class MessagingGetResponse implements BaseModel
{
    /** @use SdkModel<MessagingGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MobilePhoneNumberWithMessagingSettings $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MobilePhoneNumberWithMessagingSettings|MobilePhoneNumberWithMessagingSettingsShape|null $data
     */
    public static function with(
        MobilePhoneNumberWithMessagingSettings|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MobilePhoneNumberWithMessagingSettings|MobilePhoneNumberWithMessagingSettingsShape $data
     */
    public function withData(
        MobilePhoneNumberWithMessagingSettings|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
