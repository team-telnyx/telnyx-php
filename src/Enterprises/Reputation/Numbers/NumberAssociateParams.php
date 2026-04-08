<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Associate one or more phone numbers with an enterprise for Number Reputation monitoring.
 *
 * **Validations:**
 * - Phone numbers must be in E.164 format (e.g., `+16035551234`)
 * - Phone numbers must be in-service and belong to your account (verified via Warehouse)
 * - Phone numbers must be US local numbers
 * - Phone numbers cannot already be associated with any enterprise
 *
 * **Note:** This operation is atomic — if any number fails validation, the entire request fails.
 *
 * **Maximum:** 100 phone numbers per request.
 *
 * @see Telnyx\Services\Enterprises\Reputation\NumbersService::associate()
 *
 * @phpstan-type NumberAssociateParamsShape = array{phoneNumbers: list<string>}
 */
final class NumberAssociateParams implements BaseModel
{
    /** @use SdkModel<NumberAssociateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of phone numbers to associate for reputation monitoring (max 100).
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new NumberAssociateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberAssociateParams::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberAssociateParams)->withPhoneNumbers(...)
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
     * List of phone numbers to associate for reputation monitoring (max 100).
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
