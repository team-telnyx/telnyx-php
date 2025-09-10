<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessagingUpdateParams); // set properties as needed
 * $client->phoneNumbers.messaging->update(...$params->toArray());
 * ```
 * Update the messaging profile and/or messaging product of a phone number.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbers.messaging->update(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbers\Messaging->update
 *
 * @phpstan-type messaging_update_params = array{
 *   messagingProduct?: string, messagingProfileID?: string
 * }
 */
final class MessagingUpdateParams implements BaseModel
{
    /** @use SdkModel<messaging_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Configure the messaging product for this number:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to a quoted product ID to set this phone number to that product
     */
    #[Api('messaging_product', optional: true)]
    public ?string $messagingProduct;

    /**
     * Configure the messaging profile this phone number is assigned to:
     *
     * * Omit this field or set its value to `null` to keep the current value.
     * * Set this field to `""` to unassign the number from its messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign this number to that messaging profile
     */
    #[Api('messaging_profile_id', optional: true)]
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

        null !== $messagingProduct && $obj->messagingProduct = $messagingProduct;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;

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
        $obj->messagingProduct = $messagingProduct;

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
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }
}
