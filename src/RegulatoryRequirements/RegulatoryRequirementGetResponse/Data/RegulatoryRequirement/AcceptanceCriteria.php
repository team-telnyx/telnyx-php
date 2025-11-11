<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AcceptanceCriteriaShape = array{
 *   acceptable_characters?: string|null,
 *   acceptable_values?: list<string>|null,
 *   case_sensitive?: string|null,
 *   locality_limit?: string|null,
 *   max_length?: string|null,
 *   min_length?: string|null,
 *   regex?: string|null,
 *   time_limit?: string|null,
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $acceptable_characters;

    /** @var list<string>|null $acceptable_values */
    #[Api(list: 'string', optional: true)]
    public ?array $acceptable_values;

    #[Api(optional: true)]
    public ?string $case_sensitive;

    #[Api(optional: true)]
    public ?string $locality_limit;

    #[Api(optional: true)]
    public ?string $max_length;

    #[Api(optional: true)]
    public ?string $min_length;

    #[Api(optional: true)]
    public ?string $regex;

    #[Api(optional: true)]
    public ?string $time_limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $acceptable_values
     */
    public static function with(
        ?string $acceptable_characters = null,
        ?array $acceptable_values = null,
        ?string $case_sensitive = null,
        ?string $locality_limit = null,
        ?string $max_length = null,
        ?string $min_length = null,
        ?string $regex = null,
        ?string $time_limit = null,
    ): self {
        $obj = new self;

        null !== $acceptable_characters && $obj->acceptable_characters = $acceptable_characters;
        null !== $acceptable_values && $obj->acceptable_values = $acceptable_values;
        null !== $case_sensitive && $obj->case_sensitive = $case_sensitive;
        null !== $locality_limit && $obj->locality_limit = $locality_limit;
        null !== $max_length && $obj->max_length = $max_length;
        null !== $min_length && $obj->min_length = $min_length;
        null !== $regex && $obj->regex = $regex;
        null !== $time_limit && $obj->time_limit = $time_limit;

        return $obj;
    }

    public function withAcceptableCharacters(string $acceptableCharacters): self
    {
        $obj = clone $this;
        $obj->acceptable_characters = $acceptableCharacters;

        return $obj;
    }

    /**
     * @param list<string> $acceptableValues
     */
    public function withAcceptableValues(array $acceptableValues): self
    {
        $obj = clone $this;
        $obj->acceptable_values = $acceptableValues;

        return $obj;
    }

    public function withCaseSensitive(string $caseSensitive): self
    {
        $obj = clone $this;
        $obj->case_sensitive = $caseSensitive;

        return $obj;
    }

    public function withLocalityLimit(string $localityLimit): self
    {
        $obj = clone $this;
        $obj->locality_limit = $localityLimit;

        return $obj;
    }

    public function withMaxLength(string $maxLength): self
    {
        $obj = clone $this;
        $obj->max_length = $maxLength;

        return $obj;
    }

    public function withMinLength(string $minLength): self
    {
        $obj = clone $this;
        $obj->min_length = $minLength;

        return $obj;
    }

    public function withRegex(string $regex): self
    {
        $obj = clone $this;
        $obj->regex = $regex;

        return $obj;
    }

    public function withTimeLimit(string $timeLimit): self
    {
        $obj = clone $this;
        $obj->time_limit = $timeLimit;

        return $obj;
    }
}
