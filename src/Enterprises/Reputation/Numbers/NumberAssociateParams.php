<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Add up to 100 phone numbers to reputation monitoring on this enterprise. Each must be in E.164 format (`+1NPANXXXXXX` for US/CA) and belong to your Telnyx phone-number inventory.
 *
 * **Prerequisite**: reputation must already be enabled on this enterprise (see `POST .../reputation`).
 *
 * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
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
     * 1–100 phone numbers in E.164 format with a leading `+`.
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
     * 1–100 phone numbers in E.164 format with a leading `+`.
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
