<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse\Data\PhoneNumber;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse\Data\PhoneNumber\Status;

/**
 * @phpstan-type DataShape = array{
 *   orderID: string, phoneNumbers: list<PhoneNumber>
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('order_id')]
    public string $orderID;

    /** @var list<PhoneNumber> $phoneNumbers */
    #[Required('phone_numbers', list: PhoneNumber::class)]
    public array $phoneNumbers;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(orderID: ..., phoneNumbers: ...)
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
     *   phoneNumber: string, status: value-of<Status>
     * }> $phoneNumbers
     */
    public static function with(string $orderID, array $phoneNumbers): self
    {
        $obj = new self;

        $obj['orderID'] = $orderID;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    public function withOrderID(string $orderID): self
    {
        $obj = clone $this;
        $obj['orderID'] = $orderID;

        return $obj;
    }

    /**
     * @param list<PhoneNumber|array{
     *   phoneNumber: string, status: value-of<Status>
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }
}
