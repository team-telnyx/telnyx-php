<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a phone number block order.
 *
 * @see Telnyx\NumberBlockOrders->create
 *
 * @phpstan-type number_block_order_create_params = array{
 *   range: int,
 *   startingNumber: string,
 *   connectionID?: string,
 *   customerReference?: string,
 *   messagingProfileID?: string,
 * }
 */
final class NumberBlockOrderCreateParams implements BaseModel
{
    /** @use SdkModel<number_block_order_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The phone number range included in the block.
     */
    #[Api]
    public int $range;

    /**
     * Starting phone number block.
     */
    #[Api('starting_number')]
    public string $startingNumber;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Api('messaging_profile_id', optional: true)]
    public ?string $messagingProfileID;

    /**
     * `new NumberBlockOrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberBlockOrderCreateParams::with(range: ..., startingNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberBlockOrderCreateParams)->withRange(...)->withStartingNumber(...)
     * ```
     */
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
        int $range,
        string $startingNumber,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
    ): self {
        $obj = new self;

        $obj->range = $range;
        $obj->startingNumber = $startingNumber;

        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * The phone number range included in the block.
     */
    public function withRange(int $range): self
    {
        $obj = clone $this;
        $obj->range = $range;

        return $obj;
    }

    /**
     * Starting phone number block.
     */
    public function withStartingNumber(string $startingNumber): self
    {
        $obj = clone $this;
        $obj->startingNumber = $startingNumber;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }
}
