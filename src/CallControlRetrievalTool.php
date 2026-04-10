<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\CallControlRetrievalTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallControlBucketIDsShape from \Telnyx\CallControlBucketIDs
 *
 * @phpstan-type CallControlRetrievalToolShape = array{
 *   retrieval: CallControlBucketIDs|CallControlBucketIDsShape,
 *   type: Type|value-of<Type>,
 * }
 */
final class CallControlRetrievalTool implements BaseModel
{
    /** @use SdkModel<CallControlRetrievalToolShape> */
    use SdkModel;

    #[Required]
    public CallControlBucketIDs $retrieval;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new CallControlRetrievalTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallControlRetrievalTool::with(retrieval: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallControlRetrievalTool)->withRetrieval(...)->withType(...)
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
     * @param CallControlBucketIDs|CallControlBucketIDsShape $retrieval
     * @param Type|value-of<Type> $type
     */
    public static function with(
        CallControlBucketIDs|array $retrieval,
        Type|string $type
    ): self {
        $self = new self;

        $self['retrieval'] = $retrieval;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param CallControlBucketIDs|CallControlBucketIDsShape $retrieval
     */
    public function withRetrieval(CallControlBucketIDs|array $retrieval): self
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
