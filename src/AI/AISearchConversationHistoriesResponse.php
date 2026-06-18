<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\AI\AISearchConversationHistoriesResponse\Data;
use Telnyx\AI\AISearchConversationHistoriesResponse\Meta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Search response following the standard Telnyx V2 API format.
 *
 * @phpstan-import-type DataShape from \Telnyx\AI\AISearchConversationHistoriesResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\AI\AISearchConversationHistoriesResponse\Meta
 *
 * @phpstan-type AISearchConversationHistoriesResponseShape = array{
 *   data: list<Data|DataShape>, meta: Meta|MetaShape
 * }
 */
final class AISearchConversationHistoriesResponse implements BaseModel
{
    /** @use SdkModel<AISearchConversationHistoriesResponseShape> */
    use SdkModel;

    /**
     * Ranked list of matching text chunks, sorted by cosine similarity score descending.
     *
     * @var list<Data> $data
     */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * Pagination metadata following the standard Telnyx V2 API format.
     */
    #[Required]
    public Meta $meta;

    /**
     * `new AISearchConversationHistoriesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AISearchConversationHistoriesResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AISearchConversationHistoriesResponse)->withData(...)->withMeta(...)
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
     * @param list<Data|DataShape> $data
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * Ranked list of matching text chunks, sorted by cosine similarity score descending.
     *
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Pagination metadata following the standard Telnyx V2 API format.
     *
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
