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
 *   action?: value-of<Action>|null,
 *   countryCode?: string|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
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
     * @param Action|value-of<Action> $action
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public static function with(
        Action|string|null $action = null,
        ?string $countryCode = null,
        PhoneNumberType|string|null $phoneNumberType = null,
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Filters requirements to those applying to a specific action.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * Filters results to those applying to a 2-character (ISO 3166-1 alpha-2) country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * Filters results to those applying to a specific phone_number_type.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }
}
