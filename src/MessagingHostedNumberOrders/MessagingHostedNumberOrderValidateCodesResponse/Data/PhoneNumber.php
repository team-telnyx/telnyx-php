<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse\Data\PhoneNumber\Status;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   phoneNumber: string, status: value-of<Status>
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    #[Api('phone_number')]
    public string $phoneNumber;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * `new PhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumber::with(phoneNumber: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumber)->withPhoneNumber(...)->withStatus(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $phoneNumber,
        Status|string $status
    ): self {
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;
        $obj['status'] = $status;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
