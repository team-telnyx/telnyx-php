<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Verifies ownership of the provided phone numbers and returns a mapping of numbers to their IDs, plus a list of numbers not found in the account.
 *
 * @see Telnyx\Services\PhoneNumbers\ActionsService::verifyOwnership()
 *
 * @phpstan-type ActionVerifyOwnershipParamsShape = array{
 *   phone_numbers: list<string>
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
     * @var list<string> $phone_numbers
     */
    #[Api(list: 'string')]
    public array $phone_numbers;

    /**
     * `new ActionVerifyOwnershipParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionVerifyOwnershipParams::with(phone_numbers: ...)
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
     * @param list<string> $phone_numbers
     */
    public static function with(array $phone_numbers): self
    {
        $obj = new self;

        $obj->phone_numbers = $phone_numbers;

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
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }
}
