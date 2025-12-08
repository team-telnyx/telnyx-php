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
 *   messaging_product?: string, messaging_profile_id?: string
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
    #[Optional]
    public ?string $messaging_product;

    /**
     * Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     */
    #[Optional]
    public ?string $messaging_profile_id;

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
        ?string $messaging_product = null,
        ?string $messaging_profile_id = null
    ): self {
        $obj = new self;

        null !== $messaging_product && $obj['messaging_product'] = $messaging_product;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;

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
        $obj['messaging_product'] = $messagingProduct;

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
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }
}
