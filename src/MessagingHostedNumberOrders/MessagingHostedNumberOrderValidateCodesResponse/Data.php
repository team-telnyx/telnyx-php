<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse\Data\PhoneNumber;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse\Data\PhoneNumber\Status;

/**
 * @phpstan-type DataShape = array{
 *   order_id: string, phone_numbers: list<PhoneNumber>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api]
    public string $order_id;

    /** @var list<PhoneNumber> $phone_numbers */
    #[Api(list: PhoneNumber::class)]
    public array $phone_numbers;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(order_id: ..., phone_numbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withOrderID(...)->withPhoneNumbers(...)
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
     *
     * @param list<PhoneNumber|array{
     *   phone_number: string, status: value-of<Status>
     * }> $phone_numbers
     */
    public static function with(string $order_id, array $phone_numbers): self
    {
        $obj = new self;

        $obj['order_id'] = $order_id;
        $obj['phone_numbers'] = $phone_numbers;

        return $obj;
    }

    public function withOrderID(string $orderID): self
    {
        $obj = clone $this;
        $obj['order_id'] = $orderID;

        return $obj;
    }

    /**
     * @param list<PhoneNumber|array{
     *   phone_number: string, status: value-of<Status>
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }
}
