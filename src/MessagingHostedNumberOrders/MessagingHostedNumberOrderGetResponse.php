<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\HostedNumber;
use Telnyx\MessagingHostedNumberOrder;
use Telnyx\MessagingHostedNumberOrder\Status;

/**
 * @phpstan-type MessagingHostedNumberOrderGetResponseShape = array{
 *   data?: MessagingHostedNumberOrder|null
 * }
 */
final class MessagingHostedNumberOrderGetResponse implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderGetResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   messaging_profile_id?: string|null,
     *   phone_numbers?: list<HostedNumber>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     * } $data
     */
    public static function with(
        MessagingHostedNumberOrder|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param MessagingHostedNumberOrder|array{
     *   id?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_numbers?: list<HostedNumber>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     * } $data
     */
    public function withData(MessagingHostedNumberOrder|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
