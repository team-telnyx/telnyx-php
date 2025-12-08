<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a phone number block order.
 *
 * @see Telnyx\Services\NumberBlockOrdersService::create()
 *
 * @phpstan-type NumberBlockOrderCreateParamsShape = array{
 *   range: int,
 *   starting_number: string,
 *   connection_id?: string,
 *   customer_reference?: string,
 *   messaging_profile_id?: string,
 * }
 */
final class NumberBlockOrderCreateParams implements BaseModel
{
    /** @use SdkModel<NumberBlockOrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The phone number range included in the block.
     */
    #[Required]
    public int $range;

    /**
     * Starting phone number block.
     */
    #[Required]
    public string $starting_number;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional]
    public ?string $customer_reference;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Optional]
    public ?string $messaging_profile_id;

    /**
     * `new NumberBlockOrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberBlockOrderCreateParams::with(range: ..., starting_number: ...)
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
        string $starting_number,
        ?string $connection_id = null,
        ?string $customer_reference = null,
        ?string $messaging_profile_id = null,
    ): self {
        $obj = new self;

        $obj['range'] = $range;
        $obj['starting_number'] = $starting_number;

        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;

        return $obj;
    }

    /**
     * The phone number range included in the block.
     */
    public function withRange(int $range): self
    {
        $obj = clone $this;
        $obj['range'] = $range;

        return $obj;
    }

    /**
     * Starting phone number block.
     */
    public function withStartingNumber(string $startingNumber): self
    {
        $obj = clone $this;
        $obj['starting_number'] = $startingNumber;

        return $obj;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }
}
