<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\From\LineType;
use Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload\From\Status;

/**
 * @phpstan-type from_alias = array{
 *   carrier?: string|null,
 *   lineType?: value-of<LineType>|null,
 *   phoneNumber?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class From implements BaseModel
{
    /** @use SdkModel<from_alias> */
    use SdkModel;

    /**
     * The carrier of the sender.
     */
    #[Api(optional: true)]
    public ?string $carrier;

    /**
     * The line-type of the sender.
     *
     * @var value-of<LineType>|null $lineType
     */
    #[Api('line_type', enum: LineType::class, optional: true)]
    public ?string $lineType;

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

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
     * @param LineType|value-of<LineType> $lineType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $carrier = null,
        LineType|string|null $lineType = null,
        ?string $phoneNumber = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $carrier && $obj->carrier = $carrier;
        null !== $lineType && $obj->lineType = $lineType instanceof LineType ? $lineType->value : $lineType;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;

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
        $obj->lineType = $lineType instanceof LineType ? $lineType->value : $lineType;

        return $obj;
    }

    /**
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
