<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get the ownership status of a phone number, when it was last checked, the carrier recorded as its baseline, and the history of ownership events.
 *
 * @see Telnyx\Services\Enterprises\Reputation\NumbersService::retrieveOwnership()
 *
 * @phpstan-type NumberRetrieveOwnershipParamsShape = array{enterpriseID: string}
 */
final class NumberRetrieveOwnershipParams implements BaseModel
{
    /** @use SdkModel<NumberRetrieveOwnershipParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $enterpriseID;

    /**
     * `new NumberRetrieveOwnershipParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberRetrieveOwnershipParams::with(enterpriseID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberRetrieveOwnershipParams)->withEnterpriseID(...)
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
    public static function with(string $enterpriseID): self
    {
        $self = new self;

        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }
}
