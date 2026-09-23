<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\RetrievalTool\Type;
use Telnyx\AI\Chat\BucketIDs;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BucketIDsShape from \Telnyx\AI\Chat\BucketIDs
 *
 * @phpstan-type RetrievalToolShape = array{
 *   retrieval: BucketIDs|BucketIDsShape,
 *   type: Type|value-of<Type>,
 *   shared?: bool|null,
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
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

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
        Type|string $type,
        ?bool $shared = null
    ): self {
        $self = new self;

        $self['retrieval'] = $retrieval;
        $self['type'] = $type;

        null !== $shared && $self['shared'] = $shared;

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

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    public function withShared(bool $shared): self
    {
        $self = clone $this;
        $self['shared'] = $shared;

        return $self;
    }
}
