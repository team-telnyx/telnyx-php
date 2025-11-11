<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload\From;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload\PortingPhoneNumber;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderSplitPayload\To;

/**
 * The webhook payload for the porting_order.split event.
 *
 * @phpstan-type WebhookPortingOrderSplitPayloadShape = array{
 *   from?: From|null,
 *   porting_phone_numbers?: list<PortingPhoneNumber>|null,
 *   to?: To|null,
 * }
 */
final class WebhookPortingOrderSplitPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortingOrderSplitPayloadShape> */
    use SdkModel;

    /**
     * The porting order that was split.
     */
    #[Api(optional: true)]
    public ?From $from;

    /**
     * The list of porting phone numbers that were moved to the new porting order.
     *
     * @var list<PortingPhoneNumber>|null $porting_phone_numbers
     */
    #[Api(list: PortingPhoneNumber::class, optional: true)]
    public ?array $porting_phone_numbers;

    /**
     * The new porting order that the phone numbers was moved to.
     */
    #[Api(optional: true)]
    public ?To $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortingPhoneNumber> $porting_phone_numbers
     */
    public static function with(
        ?From $from = null,
        ?array $porting_phone_numbers = null,
        ?To $to = null
    ): self {
        $obj = new self;

        null !== $from && $obj->from = $from;
        null !== $porting_phone_numbers && $obj->porting_phone_numbers = $porting_phone_numbers;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * The porting order that was split.
     */
    public function withFrom(From $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The list of porting phone numbers that were moved to the new porting order.
     *
     * @param list<PortingPhoneNumber> $portingPhoneNumbers
     */
    public function withPortingPhoneNumbers(array $portingPhoneNumbers): self
    {
        $obj = clone $this;
        $obj->porting_phone_numbers = $portingPhoneNumbers;

        return $obj;
    }

    /**
     * The new porting order that the phone numbers was moved to.
     */
    public function withTo(To $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
