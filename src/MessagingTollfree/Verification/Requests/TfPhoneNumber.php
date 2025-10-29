<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Api;
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

    #[Api]
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
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
