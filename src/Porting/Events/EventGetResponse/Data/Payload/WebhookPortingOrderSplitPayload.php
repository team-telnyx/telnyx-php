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
 * @phpstan-type webhook_porting_order_split_payload = array{
 *   from?: From|null,
 *   portingPhoneNumbers?: list<PortingPhoneNumber>|null,
 *   to?: To|null,
 * }
 */
final class WebhookPortingOrderSplitPayload implements BaseModel
{
    /** @use SdkModel<webhook_porting_order_split_payload> */
    use SdkModel;

    /**
     * The porting order that was split.
     */
    #[Api(optional: true)]
    public ?From $from;

    /**
     * The list of porting phone numbers that were moved to the new porting order.
     *
     * @var list<PortingPhoneNumber>|null $portingPhoneNumbers
     */
    #[Api(
        'porting_phone_numbers',
        list: PortingPhoneNumber::class,
        optional: true
    )]
    public ?array $portingPhoneNumbers;

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
     * @param list<PortingPhoneNumber> $portingPhoneNumbers
     */
    public static function with(
        ?From $from = null,
        ?array $portingPhoneNumbers = null,
        ?To $to = null
    ): self {
        $obj = new self;

        null !== $from && $obj->from = $from;
        null !== $portingPhoneNumbers && $obj->portingPhoneNumbers = $portingPhoneNumbers;
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
        $obj->portingPhoneNumbers = $portingPhoneNumbers;

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
