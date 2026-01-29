<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Verifies ownership of the provided phone numbers and returns a mapping of numbers to their IDs, plus a list of numbers not found in the account.
 *
 * @see Telnyx\Services\PhoneNumbers\ActionsService::verifyOwnership()
 *
 * @phpstan-type ActionVerifyOwnershipParamsShape = array{
 *   phoneNumbers: list<string>
 * }
 */
final class ActionVerifyOwnershipParams implements BaseModel
{
    /** @use SdkModel<ActionVerifyOwnershipParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of phone numbers to verify ownership for.
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new ActionVerifyOwnershipParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionVerifyOwnershipParams::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionVerifyOwnershipParams)->withPhoneNumbers(...)
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
     * Array of phone numbers to verify ownership for.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
