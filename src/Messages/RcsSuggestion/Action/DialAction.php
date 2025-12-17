<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Required;
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
    #[Required('phone_number')]
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
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
