<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderSplitPayload\From;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderSplitPayload\PortingPhoneNumber;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderSplitPayload\To;

/**
 * The webhook payload for the porting_order.split event.
 *
 * @phpstan-type WebhookPortingOrderSplitPayloadShape = array{
 *   from?: From|null,
 *   portingPhoneNumbers?: list<PortingPhoneNumber>|null,
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
    #[Optional]
    public ?From $from;

    /**
     * The list of porting phone numbers that were moved to the new porting order.
     *
     * @var list<PortingPhoneNumber>|null $portingPhoneNumbers
     */
    #[Optional('porting_phone_numbers', list: PortingPhoneNumber::class)]
    public ?array $portingPhoneNumbers;

    /**
     * The new porting order that the phone numbers was moved to.
     */
    #[Optional]
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
     * @param From|array{id?: string|null} $from
     * @param list<PortingPhoneNumber|array{id?: string|null}> $portingPhoneNumbers
     * @param To|array{id?: string|null} $to
     */
    public static function with(
        From|array|null $from = null,
        ?array $portingPhoneNumbers = null,
        To|array|null $to = null,
    ): self {
        $obj = new self;

        null !== $from && $obj['from'] = $from;
        null !== $portingPhoneNumbers && $obj['portingPhoneNumbers'] = $portingPhoneNumbers;
        null !== $to && $obj['to'] = $to;

        return $obj;
    }

    /**
     * The porting order that was split.
     *
     * @param From|array{id?: string|null} $from
     */
    public function withFrom(From|array $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The list of porting phone numbers that were moved to the new porting order.
     *
     * @param list<PortingPhoneNumber|array{id?: string|null}> $portingPhoneNumbers
     */
    public function withPortingPhoneNumbers(array $portingPhoneNumbers): self
    {
        $obj = clone $this;
        $obj['portingPhoneNumbers'] = $portingPhoneNumbers;

        return $obj;
    }

    /**
     * The new porting order that the phone numbers was moved to.
     *
     * @param To|array{id?: string|null} $to
     */
    public function withTo(To|array $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }
}
