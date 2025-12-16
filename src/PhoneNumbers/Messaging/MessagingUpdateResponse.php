<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberWithMessagingSettings;

/**
 * @phpstan-import-type PhoneNumberWithMessagingSettingsShape from \Telnyx\PhoneNumberWithMessagingSettings
 *
 * @phpstan-type MessagingUpdateResponseShape = array{
 *   data?: null|PhoneNumberWithMessagingSettings|PhoneNumberWithMessagingSettingsShape,
 * }
 */
final class MessagingUpdateResponse implements BaseModel
{
    /** @use SdkModel<MessagingUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PhoneNumberWithMessagingSettings $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberWithMessagingSettingsShape $data
     */
    public static function with(
        PhoneNumberWithMessagingSettings|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PhoneNumberWithMessagingSettingsShape $data
     */
    public function withData(PhoneNumberWithMessagingSettings|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
