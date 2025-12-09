<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\HostedNumber;
use Telnyx\MessagingHostedNumberOrder;
use Telnyx\MessagingHostedNumberOrder\Status;

/**
 * @phpstan-type MessagingHostedNumberDeleteResponseShape = array{
 *   data?: MessagingHostedNumberOrder|null
 * }
 */
final class MessagingHostedNumberDeleteResponse implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MessagingHostedNumberOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingHostedNumberOrder|array{
     *   id?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbers?: list<HostedNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     * } $data
     */
    public static function with(
        MessagingHostedNumberOrder|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingHostedNumberOrder|array{
     *   id?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbers?: list<HostedNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     * } $data
     */
    public function withData(MessagingHostedNumberOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
