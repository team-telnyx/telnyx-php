<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\RetrievalTool\Type;
use Telnyx\AI\Chat\BucketIDs;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BucketIDsShape from \Telnyx\AI\Chat\BucketIDs
 *
 * @phpstan-type RetrievalToolShape = array{
 *   retrieval: BucketIDs|BucketIDsShape, type: Type|value-of<Type>
 * }
 */
final class RetrievalTool implements BaseModel
{
    /** @use SdkModel<RetrievalToolShape> */
    use SdkModel;

    #[Required]
    public BucketIDs $retrieval;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new RetrievalTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RetrievalTool::with(retrieval: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RetrievalTool)->withRetrieval(...)->withType(...)
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
     * @param BucketIDs|BucketIDsShape $retrieval
     * @param Type|value-of<Type> $type
     */
    public static function with(
        BucketIDs|array $retrieval,
        Type|string $type
    ): self {
        $self = new self;

        $self['retrieval'] = $retrieval;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param BucketIDs|BucketIDsShape $retrieval
     */
    public function withRetrieval(BucketIDs|array $retrieval): self
    {
        $self = clone $this;
        $self['retrieval'] = $retrieval;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
