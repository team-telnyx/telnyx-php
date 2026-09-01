<?php

declare(strict_types=1);

namespace Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The end user's identity details for the action requirement. Australia mobile ID verification is currently the only action requirement. It requires `first_name` and `last_name`, the same fields the corresponding GET lists in `fields_required`.
 *
 * @phpstan-type RequirementShape = array{firstName: string, lastName: string}
 */
final class Requirement implements BaseModel
{
    /** @use SdkModel<RequirementShape> */
    use SdkModel;

    /**
     * The end user's first name.
     */
    #[Required('first_name')]
    public string $firstName;

    /**
     * The end user's last name.
     */
    #[Required('last_name')]
    public string $lastName;

    /**
     * `new Requirement()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Requirement::with(firstName: ..., lastName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Requirement)->withFirstName(...)->withLastName(...)
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
        $self = new self;

        $self['firstName'] = $firstName;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * The end user's first name.
     */
    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The end user's last name.
     */
    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }
}
