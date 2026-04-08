<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Remove a phone number from Number Reputation monitoring for an enterprise.
 *
 * The number will no longer be tracked and reputation data will no longer be refreshed.
 *
 * @see Telnyx\Services\Enterprises\Reputation\NumbersService::delete()
 *
 * @phpstan-type NumberDeleteParamsShape = array{enterpriseID: string}
 */
final class NumberDeleteParams implements BaseModel
{
    /** @use SdkModel<NumberDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $enterpriseID;

    /**
     * `new NumberDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberDeleteParams::with(enterpriseID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberDeleteParams)->withEnterpriseID(...)
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
