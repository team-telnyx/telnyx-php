<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a messaging hosted number order.
 *
 * @see Telnyx\Services\MessagingHostedNumberOrdersService::create()
 *
 * @phpstan-type MessagingHostedNumberOrderCreateParamsShape = array{
 *   messaging_profile_id?: string, phone_numbers?: list<string>
 * }
 */
final class MessagingHostedNumberOrderCreateParams implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Automatically associate the number with this messaging profile ID when the order is complete.
     */
    #[Optional]
    public ?string $messaging_profile_id;

    /**
     * Phone numbers to be used for hosted messaging.
     *
     * @var list<string>|null $phone_numbers
     */
    #[Optional(list: 'string')]
    public ?array $phone_numbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phone_numbers
     */
    public static function with(
        ?string $messaging_profile_id = null,
        ?array $phone_numbers = null
    ): self {
        $obj = new self;

        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;
        null !== $phone_numbers && $obj['phone_numbers'] = $phone_numbers;

        return $obj;
    }

    /**
     * Automatically associate the number with this messaging profile ID when the order is complete.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }

    /**
     * Phone numbers to be used for hosted messaging.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }
}
