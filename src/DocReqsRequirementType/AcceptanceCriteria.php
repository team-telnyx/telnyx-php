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
 *   acceptableCharacters?: string|null,
 *   acceptableValues?: list<string>|null,
 *   localityLimit?: string|null,
 *   maxLength?: int|null,
 *   minLength?: int|null,
 *   timeLimit?: string|null,
 * }
 */
final class AcceptanceCriteria implements BaseModel
{
    /** @use SdkModel<AcceptanceCriteriaShape> */
    use SdkModel;

    /**
     * Specifies the allowed characters as a string.
     */
    #[Optional('acceptable_characters')]
    public ?string $acceptableCharacters;

    /**
     * Specifies the list of strictly possible values for the requirement. Ignored when empty.
     *
     * @var list<string>|null $acceptableValues
     */
    #[Optional('acceptable_values', list: 'string')]
    public ?array $acceptableValues;

    /**
     * Specifies geography-based acceptance criteria.
     */
    #[Optional('locality_limit')]
    public ?string $localityLimit;

    /**
     * Maximum length allowed for the value.
     */
    #[Optional('max_length')]
    public ?int $maxLength;

    /**
     * Minimum length allowed for the value.
     */
    #[Optional('min_length')]
    public ?int $minLength;

    /**
     * Specifies time-based acceptance criteria.
     */
    #[Optional('time_limit')]
    public ?string $timeLimit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $acceptableValues
     */
    public static function with(
        ?string $acceptableCharacters = null,
        ?array $acceptableValues = null,
        ?string $localityLimit = null,
        ?int $maxLength = null,
        ?int $minLength = null,
        ?string $timeLimit = null,
    ): self {
        $obj = new self;

        null !== $acceptableCharacters && $obj['acceptableCharacters'] = $acceptableCharacters;
        null !== $acceptableValues && $obj['acceptableValues'] = $acceptableValues;
        null !== $localityLimit && $obj['localityLimit'] = $localityLimit;
        null !== $maxLength && $obj['maxLength'] = $maxLength;
        null !== $minLength && $obj['minLength'] = $minLength;
        null !== $timeLimit && $obj['timeLimit'] = $timeLimit;

        return $obj;
    }

    /**
     * Specifies the allowed characters as a string.
     */
    public function withAcceptableCharacters(string $acceptableCharacters): self
    {
        $obj = clone $this;
        $obj['acceptableCharacters'] = $acceptableCharacters;

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
        $obj['acceptableValues'] = $acceptableValues;

        return $obj;
    }

    /**
     * Specifies geography-based acceptance criteria.
     */
    public function withLocalityLimit(string $localityLimit): self
    {
        $obj = clone $this;
        $obj['localityLimit'] = $localityLimit;

        return $obj;
    }

    /**
     * Maximum length allowed for the value.
     */
    public function withMaxLength(int $maxLength): self
    {
        $obj = clone $this;
        $obj['maxLength'] = $maxLength;

        return $obj;
    }

    /**
     * Minimum length allowed for the value.
     */
    public function withMinLength(int $minLength): self
    {
        $obj = clone $this;
        $obj['minLength'] = $minLength;

        return $obj;
    }

    /**
     * Specifies time-based acceptance criteria.
     */
    public function withTimeLimit(string $timeLimit): self
    {
        $obj = clone $this;
        $obj['timeLimit'] = $timeLimit;

        return $obj;
    }
}
