<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submit verification code for a phone number.
 *
 * @see Telnyx\Services\Whatsapp\PhoneNumbersService::verify()
 *
 * @phpstan-type PhoneNumberVerifyParamsShape = array{code: string}
 */
final class PhoneNumberVerifyParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberVerifyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $code;

    /**
     * `new PhoneNumberVerifyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberVerifyParams::with(code: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberVerifyParams)->withCode(...)
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
    public static function with(string $code): self
    {
        $self = new self;

        $self['code'] = $code;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }
}
