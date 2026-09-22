<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneParams;

use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelChoiceQuestion;
use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelNoulQuestion;
use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelScoreQuestion;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * A choice, yes/no, or ordered-score question.
 *
 * @phpstan-import-type DecisionModelChoiceQuestionShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelChoiceQuestion
 * @phpstan-import-type DecisionModelNoulQuestionShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelNoulQuestion
 * @phpstan-import-type DecisionModelScoreQuestionShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelScoreQuestion
 *
 * @phpstan-type QuestionVariants = DecisionModelChoiceQuestion|DecisionModelNoulQuestion|DecisionModelScoreQuestion
 * @phpstan-type QuestionShape = QuestionVariants|DecisionModelChoiceQuestionShape|DecisionModelNoulQuestionShape|DecisionModelScoreQuestionShape
 */
final class Question implements ConverterSource
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
            'choice' => DecisionModelChoiceQuestion::class,
            'noul' => DecisionModelNoulQuestion::class,
            'score' => DecisionModelScoreQuestion::class,
        ];
    }
}
