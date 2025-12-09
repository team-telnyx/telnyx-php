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
 *   messagingProfileID?: string, phoneNumbers?: list<string>
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
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * Phone numbers to be used for hosted messaging.
     *
     * @var list<string>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: 'string')]
    public ?array $phoneNumbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phoneNumbers
     */
    public static function with(
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null
    ): self {
        $obj = new self;

        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbers && $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Automatically associate the number with this messaging profile ID when the order is complete.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

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
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }
}
