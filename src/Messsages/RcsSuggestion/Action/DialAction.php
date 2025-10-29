<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Opens the user's default dialer app with the agent-specified phone number filled in.
 *
 * @phpstan-type DialActionShape = array{phoneNumber: string}
 */
final class DialAction implements BaseModel
{
    /** @use SdkModel<DialActionShape> */
    use SdkModel;

    /**
     * Phone number in +E.164 format.
     */
    #[Api('phone_number')]
    public string $phoneNumber;

    /**
     * `new DialAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialAction::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DialAction)->withPhoneNumber(...)
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
    public static function with(string $phoneNumber): self
    {
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
