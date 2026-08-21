<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\PayPromptValue;

use Telnyx\Calls\Actions\PayPromptValue\PayPromptList\CardType;
use Telnyx\Calls\Actions\PayPromptValue\PayPromptList\ErrorType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A text-to-speech prompt with optional matching qualifiers.
 *
 * @phpstan-type PayPromptListShape = array{
 *   text: string,
 *   attempt?: string|null,
 *   cardType?: null|CardType|value-of<CardType>,
 *   errorType?: null|ErrorType|value-of<ErrorType>,
 * }
 */
final class PayPromptList implements BaseModel
{
    /** @use SdkModel<PayPromptListShape> */
    use SdkModel;

    /**
     * Text spoken for the payment collection step.
     */
    #[Required]
    public string $text;

    /**
     * Space-separated 1-based attempt numbers for which this prompt applies.
     */
    #[Optional]
    public ?string $attempt;

    /**
     * Lowercase, case-sensitive detected card type for which this prompt applies. Only the listed brands are currently detected; accepted UnionPay and Maestro test cards do not produce a card-type qualifier.
     *
     * @var value-of<CardType>|null $cardType
     */
    #[Optional('card_type', enum: CardType::class)]
    public ?string $cardType;

    /**
     * Step error for which this prompt applies.
     *
     * @var value-of<ErrorType>|null $errorType
     */
    #[Optional('error_type', enum: ErrorType::class)]
    public ?string $errorType;

    /**
     * `new PayPromptList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayPromptList::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayPromptList)->withText(...)
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
     *
     * @param CardType|value-of<CardType>|null $cardType
     * @param ErrorType|value-of<ErrorType>|null $errorType
     */
    public static function with(
        string $text,
        ?string $attempt = null,
        CardType|string|null $cardType = null,
        ErrorType|string|null $errorType = null,
    ): self {
        $self = new self;

        $self['text'] = $text;

        null !== $attempt && $self['attempt'] = $attempt;
        null !== $cardType && $self['cardType'] = $cardType;
        null !== $errorType && $self['errorType'] = $errorType;

        return $self;
    }

    /**
     * Text spoken for the payment collection step.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Space-separated 1-based attempt numbers for which this prompt applies.
     */
    public function withAttempt(string $attempt): self
    {
        $self = clone $this;
        $self['attempt'] = $attempt;

        return $self;
    }

    /**
     * Lowercase, case-sensitive detected card type for which this prompt applies. Only the listed brands are currently detected; accepted UnionPay and Maestro test cards do not produce a card-type qualifier.
     *
     * @param CardType|value-of<CardType> $cardType
     */
    public function withCardType(CardType|string $cardType): self
    {
        $self = clone $this;
        $self['cardType'] = $cardType;

        return $self;
    }

    /**
     * Step error for which this prompt applies.
     *
     * @param ErrorType|value-of<ErrorType> $errorType
     */
    public function withErrorType(ErrorType|string $errorType): self
    {
        $self = clone $this;
        $self['errorType'] = $errorType;

        return $self;
    }
}
