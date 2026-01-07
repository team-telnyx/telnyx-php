<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent\Payload\From;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent\Payload\PortingPhoneNumber;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent\Payload\To;

/**
 * The webhook payload for the porting_order.split event.
 *
 * @phpstan-import-type FromShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent\Payload\From
 * @phpstan-import-type PortingPhoneNumberShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent\Payload\PortingPhoneNumber
 * @phpstan-import-type ToShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent\Payload\To
 *
 * @phpstan-type PayloadShape = array{
 *   from?: null|From|FromShape,
 *   portingPhoneNumbers?: list<PortingPhoneNumber|PortingPhoneNumberShape>|null,
 *   to?: null|To|ToShape,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
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
     * @param From|FromShape|null $from
     * @param list<PortingPhoneNumber|PortingPhoneNumberShape>|null $portingPhoneNumbers
     * @param To|ToShape|null $to
     */
    public static function with(
        From|array|null $from = null,
        ?array $portingPhoneNumbers = null,
        To|array|null $to = null,
    ): self {
        $self = new self;

        null !== $from && $self['from'] = $from;
        null !== $portingPhoneNumbers && $self['portingPhoneNumbers'] = $portingPhoneNumbers;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * The porting order that was split.
     *
     * @param From|FromShape $from
     */
    public function withFrom(From|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The list of porting phone numbers that were moved to the new porting order.
     *
     * @param list<PortingPhoneNumber|PortingPhoneNumberShape> $portingPhoneNumbers
     */
    public function withPortingPhoneNumbers(array $portingPhoneNumbers): self
    {
        $self = clone $this;
        $self['portingPhoneNumbers'] = $portingPhoneNumbers;

        return $self;
    }

    /**
     * The new porting order that the phone numbers was moved to.
     *
     * @param To|ToShape $to
     */
    public function withTo(To|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
