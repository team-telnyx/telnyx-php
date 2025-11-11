<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Requirements\RequirementListParams\Filter\Action;
use Telnyx\Requirements\RequirementListParams\Filter\PhoneNumberType;

/**
 * Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action].
 *
 * @phpstan-type FilterShape = array{
 *   action?: value-of<Action>|null,
 *   country_code?: string|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
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
    #[Api(enum: Action::class, optional: true)]
    public ?string $action;

    /**
     * Filters results to those applying to a 2-character (ISO 3166-1 alpha-2) country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Filters results to those applying to a specific phone_number_type.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

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
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        Action|string|null $action = null,
        ?string $country_code = null,
        PhoneNumberType|string|null $phone_number_type = null,
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;

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
        $obj->country_code = $countryCode;

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
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }
}
