<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationInsights;

use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightGetAggregatesResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Aggregated conversation insight counts grouped by the specified fields. Each item in `data` contains the grouped field values and a `record_count` indicating how many conversation insights match that combination.
 *
 * @phpstan-import-type DataShape from \Telnyx\AI\Conversations\ConversationInsights\ConversationInsightGetAggregatesResponse\Data
 *
 * @phpstan-type ConversationInsightGetAggregatesResponseShape = array{
 *   data: list<Data|DataShape>
 * }
 */
final class ConversationInsightGetAggregatesResponse implements BaseModel
{
    /** @use SdkModel<ConversationInsightGetAggregatesResponseShape> */
    use SdkModel;

    /**
     * Aggregation result rows. Each row contains the grouped field values and a `record_count`.
     *
     * @var list<Data> $data
     */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * `new ConversationInsightGetAggregatesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationInsightGetAggregatesResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationInsightGetAggregatesResponse)->withData(...)
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
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Aggregation result rows. Each row contains the grouped field values and a `record_count`.
     *
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
