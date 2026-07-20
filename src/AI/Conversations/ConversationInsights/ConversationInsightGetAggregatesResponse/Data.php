<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationInsights\ConversationInsightGetAggregatesResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An aggregation row. Contains the grouped field values (keyed by the group_by field names) and a `record_count` integer. For example, when grouping by `score`, each row has a `score` value and a `record_count` of conversations with that score. When also splitting by `metadata.assistant_version_id`, each row includes both `score` and `metadata.assistant_version_id` plus their combined `record_count`.
 *
 * @phpstan-type DataShape = array{recordCount: int}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Number of conversation insights that match this combination of grouped field values.
     */
    #[Required('record_count')]
    public int $recordCount;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(recordCount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withRecordCount(...)
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
     */
    public static function with(int $recordCount): self
    {
        $self = new self;

        $self['recordCount'] = $recordCount;

        return $self;
    }

    /**
     * Number of conversation insights that match this combination of grouped field values.
     */
    public function withRecordCount(int $recordCount): self
    {
        $self = clone $this;
        $self['recordCount'] = $recordCount;

        return $self;
    }
}
