<?php

declare(strict_types=1);

namespace Telnyx\MessagingNumbersBulkUpdates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BulkMessagingSettingsUpdatePhoneNumbersShape from \Telnyx\MessagingNumbersBulkUpdates\BulkMessagingSettingsUpdatePhoneNumbers
 *
 * @phpstan-type MessagingNumbersBulkUpdateGetResponseShape = array{
 *   data?: null|BulkMessagingSettingsUpdatePhoneNumbers|BulkMessagingSettingsUpdatePhoneNumbersShape,
 * }
 */
final class MessagingNumbersBulkUpdateGetResponse implements BaseModel
{
    /** @use SdkModel<MessagingNumbersBulkUpdateGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?BulkMessagingSettingsUpdatePhoneNumbers $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BulkMessagingSettingsUpdatePhoneNumbers|BulkMessagingSettingsUpdatePhoneNumbersShape|null $data
     */
    public static function with(
        BulkMessagingSettingsUpdatePhoneNumbers|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param BulkMessagingSettingsUpdatePhoneNumbers|BulkMessagingSettingsUpdatePhoneNumbersShape $data
     */
    public function withData(
        BulkMessagingSettingsUpdatePhoneNumbers|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
