<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type verified_number_new_response = array{
 *   phoneNumber?: string, verificationMethod?: string
 * }
 */
final class VerifiedNumberNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<verified_number_new_response> */
    use SdkModel;

    use SdkResponse;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    #[Api('verification_method', optional: true)]
    public ?string $verificationMethod;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $phoneNumber = null,
        ?string $verificationMethod = null
    ): self {
        $obj = new self;

        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $verificationMethod && $obj->verificationMethod = $verificationMethod;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withVerificationMethod(string $verificationMethod): self
    {
        $obj = clone $this;
        $obj->verificationMethod = $verificationMethod;

        return $obj;
    }
}
