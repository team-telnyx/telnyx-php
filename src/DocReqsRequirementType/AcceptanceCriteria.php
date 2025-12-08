<?php

declare(strict_types=1);

namespace Telnyx\DocReqsRequirementType;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Specifies objective criteria for acceptance.
 *
 * @phpstan-type AcceptanceCriteriaShape = array{
 *   acceptable_characters?: string|null,
 *   acceptable_values?: list<string>|null,
 *   locality_limit?: string|null,
 *   max_length?: int|null,
 *   min_length?: int|null,
 *   time_limit?: string|null,
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    /**
     * Specifies the allowed characters as a string.
     */
    #[Optional]
    public ?string $acceptable_characters;

    /**
     * Specifies the list of strictly possible values for the requirement. Ignored when empty.
     *
     * @var list<string>|null $acceptable_values
     */
    #[Optional(list: 'string')]
    public ?array $acceptable_values;

    /**
     * Specifies geography-based acceptance criteria.
     */
    #[Optional]
    public ?string $locality_limit;

    /**
     * Maximum length allowed for the value.
     */
    #[Optional]
    public ?int $max_length;

    /**
     * Minimum length allowed for the value.
     */
    #[Optional]
    public ?int $min_length;

    /**
     * Specifies time-based acceptance criteria.
     */
    #[Optional]
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
        ?string $locality_limit = null,
        ?int $max_length = null,
        ?int $min_length = null,
        ?string $time_limit = null,
    ): self {
        $obj = new self;

        null !== $acceptable_characters && $obj['acceptable_characters'] = $acceptable_characters;
        null !== $acceptable_values && $obj['acceptable_values'] = $acceptable_values;
        null !== $locality_limit && $obj['locality_limit'] = $locality_limit;
        null !== $max_length && $obj['max_length'] = $max_length;
        null !== $min_length && $obj['min_length'] = $min_length;
        null !== $time_limit && $obj['time_limit'] = $time_limit;

        return $obj;
    }

    /**
     * Specifies the allowed characters as a string.
     */
    public function withAcceptableCharacters(string $acceptableCharacters): self
    {
        $obj = clone $this;
        $obj['acceptable_characters'] = $acceptableCharacters;

        return $obj;
    }

    /**
     * Specifies the list of strictly possible values for the requirement. Ignored when empty.
     *
     * @param list<string> $acceptableValues
     */
    public function withAcceptableValues(array $acceptableValues): self
    {
        $obj = clone $this;
        $obj['acceptable_values'] = $acceptableValues;

        return $obj;
    }

    /**
     * Specifies geography-based acceptance criteria.
     */
    public function withLocalityLimit(string $localityLimit): self
    {
        $obj = clone $this;
        $obj['locality_limit'] = $localityLimit;

        return $obj;
    }

    /**
     * Maximum length allowed for the value.
     */
    public function withMaxLength(int $maxLength): self
    {
        $obj = clone $this;
        $obj['max_length'] = $maxLength;

        return $obj;
    }

    /**
     * Minimum length allowed for the value.
     */
    public function withMinLength(int $minLength): self
    {
        $obj = clone $this;
        $obj['min_length'] = $minLength;

        return $obj;
    }

    /**
     * Specifies time-based acceptance criteria.
     */
    public function withTimeLimit(string $timeLimit): self
    {
        $obj = clone $this;
        $obj['time_limit'] = $timeLimit;

        return $obj;
    }
}
