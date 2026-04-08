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
 * @see Telnyx\Services\Enterprises\Reputation\NumbersService::disassociate()
 *
 * @phpstan-type NumberDisassociateParamsShape = array{enterpriseID: string}
 */
final class NumberDisassociateParams implements BaseModel
{
    /** @use SdkModel<NumberDisassociateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $enterpriseID;

    /**
     * `new NumberDisassociateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberDisassociateParams::with(enterpriseID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberDisassociateParams)->withEnterpriseID(...)
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
