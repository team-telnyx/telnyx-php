<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Opens the user's default dialer app with the agent-specified phone number filled in.
 *
 * @phpstan-type DialActionShape = array{phone_number: string}
 */
final class DialAction implements BaseModel
{
    /** @use SdkModel<DialActionShape> */
    use SdkModel;

    /**
     * Phone number in +E.164 format.
     */
    #[Api]
    public string $phone_number;

    /**
     * `new DialAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialAction::with(phone_number: ...)
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
    public static function with(string $phone_number): self
    {
        $obj = new self;

        $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
