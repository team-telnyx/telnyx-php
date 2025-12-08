<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Required information for initiating the action requirement for AU ID verification.
 *
 * @phpstan-type ParamsShape = array{first_name: string, last_name: string}
 */
final class Params implements BaseModel
{
    /** @use SdkModel<ParamsShape> */
    use SdkModel;

    /**
     * The first name of the person that will perform the verification flow.
     */
    #[Required]
    public string $first_name;

    /**
     * The last name of the person that will perform the verification flow.
     */
    #[Required]
    public string $last_name;

    /**
     * `new Params()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Params::with(first_name: ..., last_name: ...)
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
    public static function with(string $first_name, string $last_name): self
    {
        $obj = new self;

        $obj['first_name'] = $first_name;
        $obj['last_name'] = $last_name;

        return $obj;
    }

    /**
     * The first name of the person that will perform the verification flow.
     */
    public function withFirstName(string $firstName): self
    {
        $obj = clone $this;
        $obj['first_name'] = $firstName;

        return $obj;
    }

    /**
     * The last name of the person that will perform the verification flow.
     */
    public function withLastName(string $lastName): self
    {
        $obj = clone $this;
        $obj['last_name'] = $lastName;

        return $obj;
    }
}
