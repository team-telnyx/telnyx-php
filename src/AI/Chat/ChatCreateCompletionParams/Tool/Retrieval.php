<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;

use Telnyx\AI\Assistants\InferenceEmbeddingBucketIDs;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\Retrieval\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type retrieval_alias = array{
 *   retrieval: InferenceEmbeddingBucketIDs, type: value-of<Type>
 * }
 */
final class Retrieval implements BaseModel
{
    /** @use SdkModel<retrieval_alias> */
    use SdkModel;

    #[Api]
    public InferenceEmbeddingBucketIDs $retrieval;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new Retrieval()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Retrieval::with(retrieval: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Retrieval)->withRetrieval(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        InferenceEmbeddingBucketIDs $retrieval,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->retrieval = $retrieval;
        $obj['type'] = $type;

        return $obj;
    }

    public function withRetrieval(InferenceEmbeddingBucketIDs $retrieval): self
    {
        $obj = clone $this;
        $obj->retrieval = $retrieval;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
