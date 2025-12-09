<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Required information for initiating the action requirement for AU ID verification.
 *
 * @phpstan-type ParamsShape = array{firstName: string, lastName: string}
 */
final class Params implements BaseModel
{
    /** @use SdkModel<ParamsShape> */
    use SdkModel;

    /**
     * The first name of the person that will perform the verification flow.
     */
    #[Required('first_name')]
    public string $firstName;

    /**
     * The last name of the person that will perform the verification flow.
     */
    #[Required('last_name')]
    public string $lastName;

    /**
     * `new Params()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Params::with(firstName: ..., lastName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Params)->withFirstName(...)->withLastName(...)
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
    public static function with(string $firstName, string $lastName): self
    {
        $obj = new self;

        $obj['firstName'] = $firstName;
        $obj['lastName'] = $lastName;

        return $obj;
    }

    /**
     * The first name of the person that will perform the verification flow.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['firstName'] = $firstName;

        return $obj;
    }

    /**
     * The last name of the person that will perform the verification flow.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['lastName'] = $lastName;

        return $obj;
    }
}
