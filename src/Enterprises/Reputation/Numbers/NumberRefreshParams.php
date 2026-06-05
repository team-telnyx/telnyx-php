<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Immediately refresh the stored reputation data for the listed numbers. This is in addition to the periodic refresh determined by `check_frequency`. Up to 100 numbers per call. The response carries the kicked-off jobs; the actual refresh runs asynchronously.
 *
 * **Pricing:** Forcing a refresh performs live reputation lookups, which are billable. See https://telnyx.com/pricing/numbers for current pricing.
 *
 * @see Telnyx\Services\Enterprises\Reputation\NumbersService::refresh()
 *
 * @phpstan-type NumberRefreshParamsShape = array{phoneNumbers: list<string>}
 */
final class NumberRefreshParams implements BaseModel
{
    /** @use SdkModel<NumberRefreshParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Phone numbers to refresh reputation data for. 1–100 numbers per request, each in E.164 format. Reputation refreshes are subject to per-enterprise rate limits.
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new NumberRefreshParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberRefreshParams::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberRefreshParams)->withPhoneNumbers(...)
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
     * Phone numbers to refresh reputation data for. 1–100 numbers per request, each in E.164 format. Reputation refreshes are subject to per-enterprise rate limits.
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
