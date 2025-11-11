<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\From\LineType;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\From\Status;

/**
 * @phpstan-type FromShape = array{
 *   carrier?: string|null,
 *   line_type?: value-of<LineType>|null,
 *   phone_number?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class From implements BaseModel
{
    /** @use SdkModel<FromShape> */
    use SdkModel;

    /**
     * The carrier of the sender.
     */
    #[Api(optional: true)]
    public ?string $carrier;

    /**
     * The line-type of the sender.
     *
     * @var value-of<LineType>|null $line_type
     */
    #[Api(enum: LineType::class, optional: true)]
    public ?string $line_type;

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param LineType|value-of<LineType> $line_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $carrier = null,
        LineType|string|null $line_type = null,
        ?string $phone_number = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $carrier && $obj->carrier = $carrier;
        null !== $line_type && $obj['line_type'] = $line_type;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * The carrier of the sender.
     */
    public function withCarrier(string $carrier): self
    {
        $obj = clone $this;
        $obj->carrier = $carrier;

        return $obj;
    }

    /**
     * The line-type of the sender.
     *
     * @param LineType|value-of<LineType> $lineType
     */
    public function withLineType(LineType|string $lineType): self
    {
        $obj = clone $this;
        $obj['line_type'] = $lineType;

        return $obj;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

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
