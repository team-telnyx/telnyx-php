<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneResponse;

use Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer\DecisionModelChoiceAnswer;
use Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer\DecisionModelNoulAnswer;
use Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer\DecisionModelScoreAnswer;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * An answer whose type matches its question.
 *
 * @phpstan-import-type DecisionModelChoiceAnswerShape from \Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer\DecisionModelChoiceAnswer
 * @phpstan-import-type DecisionModelNoulAnswerShape from \Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer\DecisionModelNoulAnswer
 * @phpstan-import-type DecisionModelScoreAnswerShape from \Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer\DecisionModelScoreAnswer
 *
 * @phpstan-type AnswerVariants = DecisionModelChoiceAnswer|DecisionModelNoulAnswer|DecisionModelScoreAnswer
 * @phpstan-type AnswerShape = AnswerVariants|DecisionModelChoiceAnswerShape|DecisionModelNoulAnswerShape|DecisionModelScoreAnswerShape
 */
final class Answer implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'choice' => DecisionModelChoiceAnswer::class,
            'noul' => DecisionModelNoulAnswer::class,
            'score' => DecisionModelScoreAnswer::class,
        ];
    }
}
