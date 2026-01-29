<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A phone number.
 *
 * @phpstan-type TfPhoneNumberShape = array{phoneNumber: string}
 */
final class TfPhoneNumber implements BaseModel
{
    /** @use SdkModel<TfPhoneNumberShape> */
    use SdkModel;

    #[Required]
    public string $phoneNumber;

    /**
     * `new TfPhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TfPhoneNumber::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TfPhoneNumber)->withPhoneNumber(...)
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

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
