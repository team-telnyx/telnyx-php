<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the messaging profile and/or messaging product of a phone number.
 *
 * @see Telnyx\Services\PhoneNumbers\MessagingService::update()
 *
 * @phpstan-type MessagingUpdateParamsShape = array{
 *   messagingProduct?: string, messagingProfileID?: string
 * }
 */
final class MessagingUpdateParams implements BaseModel
{
    /** @use SdkModel<MessagingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Configure the messaging product for this number:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to a quoted product ID to set this phone number to that product
     */
    #[Optional('messaging_product')]
    public ?string $messagingProduct;

    /**
     * Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

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
        ?string $messagingProduct = null,
        ?string $messagingProfileID = null
    ): self {
        $obj = new self;

        null !== $messagingProduct && $obj['messagingProduct'] = $messagingProduct;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * Configure the messaging product for this number:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to a quoted product ID to set this phone number to that product
     */
    public function withMessagingProduct(string $messagingProduct): self
    {
        $obj = clone $this;
        $obj['messagingProduct'] = $messagingProduct;

        return $obj;
    }

    /**
     * Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }
}
