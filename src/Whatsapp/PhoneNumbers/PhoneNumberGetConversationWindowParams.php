<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns whether the 24-hour conversation window is currently open for a given source/destination pair. If window_active is false, only template messages may be sent.
 *
 * @see Telnyx\Services\Whatsapp\PhoneNumbersService::getConversationWindow()
 *
 * @phpstan-type PhoneNumberGetConversationWindowParamsShape = array{
 *   destinationNumber: string
 * }
 */
final class PhoneNumberGetConversationWindowParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberGetConversationWindowParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Destination phone number in E.164 format.
     */
    #[Required]
    public string $destinationNumber;

    /**
     * `new PhoneNumberGetConversationWindowParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberGetConversationWindowParams::with(destinationNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberGetConversationWindowParams)->withDestinationNumber(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $destinationNumber): self
    {
        $self = new self;

        $self['destinationNumber'] = $destinationNumber;

        return $self;
    }

    /**
     * Destination phone number in E.164 format.
     */
    public function withDestinationNumber(string $destinationNumber): self
    {
        $self = clone $this;
        $self['destinationNumber'] = $destinationNumber;

        return $self;
    }
}
