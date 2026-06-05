<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deregister phone numbers from a DIR. The enterprise is resolved server-side from the DIR id. Returns a partial-success envelope.
 *
 * @see Telnyx\Services\Dir\PhoneNumbersService::remove()
 *
 * @phpstan-type PhoneNumberRemoveParamsShape = array{phoneNumbers: list<string>}
 */
final class PhoneNumberRemoveParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $phoneNumbers */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new PhoneNumberRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberRemoveParams::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberRemoveParams)->withPhoneNumbers(...)
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
     * @param list<string> $phoneNumbers
     */
    public static function with(array $phoneNumbers): self
    {
        $self = new self;

        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
