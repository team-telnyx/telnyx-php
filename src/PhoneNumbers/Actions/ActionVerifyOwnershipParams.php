<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionVerifyOwnershipParams); // set properties as needed
 * $client->phoneNumbers.actions->verifyOwnership(...$params->toArray());
 * ```
 * Verifies ownership of the provided phone numbers and returns a mapping of numbers to their IDs, plus a list of numbers not found in the account.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbers.actions->verifyOwnership(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbers\Actions->verifyOwnership
 *
 * @phpstan-type action_verify_ownership_params = array{phoneNumbers: list<string>}
 */
final class ActionVerifyOwnershipParams implements BaseModel
{
    /** @use SdkModel<action_verify_ownership_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of phone numbers to verify ownership for.
     *
     * @var list<string> $phoneNumbers
     */
    #[Api('phone_numbers', list: 'string')]
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
        $obj = new self;

        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * Array of phone numbers to verify ownership for.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
