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
 *   startingNumber: string,
 *   connectionID?: string,
 *   customerReference?: string,
 *   messagingProfileID?: string,
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
    #[Required('starting_number')]
    public string $startingNumber;

    /**
     * Identifies the connection associated with this phone number.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    #[Optional('messaging_profile_id')]
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
        $self = new self;

        $self['range'] = $range;
        $self['startingNumber'] = $startingNumber;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The phone number range included in the block.
     */
    public function withRange(int $range): self
    {
        $self = clone $this;
        $self['range'] = $range;

        return $self;
    }

    /**
     * Starting phone number block.
     */
    public function withStartingNumber(string $startingNumber): self
    {
        $self = clone $this;
        $self['startingNumber'] = $startingNumber;

        return $self;
    }

    /**
     * Identifies the connection associated with this phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Identifies the messaging profile associated with the phone number.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }
}
