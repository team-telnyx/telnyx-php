<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WhatsappPhoneResponseShape from \Telnyx\Whatsapp\PhoneNumbers\WhatsappPhoneResponse
 *
 * @phpstan-type PhoneNumberGetPhoneNumberResponseShape = array{
 *   data: WhatsappPhoneResponse|WhatsappPhoneResponseShape
 * }
 */
final class PhoneNumberGetPhoneNumberResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberGetPhoneNumberResponseShape> */
    use SdkModel;

    #[Required]
    public WhatsappPhoneResponse $data;

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
     * @param WhatsappPhoneResponse|WhatsappPhoneResponseShape $data
     */
    public static function with(WhatsappPhoneResponse|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param WhatsappPhoneResponse|WhatsappPhoneResponseShape $data
     */
    public function withData(WhatsappPhoneResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
