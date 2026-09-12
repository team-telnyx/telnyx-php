<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberGetPhoneNumberResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Whatsapp\PhoneNumbers\PhoneNumberGetPhoneNumberResponse\Data
 *
 * @phpstan-type PhoneNumberGetPhoneNumberResponseShape = array{
 *   data: Data|DataShape
 * }
 */
final class PhoneNumberGetPhoneNumberResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberGetPhoneNumberResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new PhoneNumberGetPhoneNumberResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberGetPhoneNumberResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberGetPhoneNumberResponse)->withData(...)
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
     *
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
