<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Requirements\RequirementListParams\Filter\Action;
use Telnyx\Requirements\RequirementListParams\Filter\PhoneNumberType;

/**
 * Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action].
 *
 * @phpstan-type FilterShape = array{
 *   action?: null|Action|value-of<Action>,
 *   countryCode?: string|null,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filters requirements to those applying to a specific action.
     *
     * @var value-of<Action>|null $action
     */
    #[Optional(enum: Action::class)]
    public ?string $action;

    /**
     * Filters results to those applying to a 2-character (ISO 3166-1 alpha-2) country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Filters results to those applying to a specific phone_number_type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Action|value-of<Action>|null $action
     * @param PhoneNumberType|value-of<PhoneNumberType>|null $phoneNumberType
     */
    public static function with(
        Action|string|null $action = null,
        ?string $countryCode = null,
        PhoneNumberType|string|null $phoneNumberType = null,
    ): self {
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Filters requirements to those applying to a specific action.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * Filters results to those applying to a 2-character (ISO 3166-1 alpha-2) country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Filters results to those applying to a specific phone_number_type.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }
}
