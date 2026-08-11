<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RetrievalSettingsShape from \Telnyx\AI\Collections\Settings\RetrievalSettings
 *
 * @phpstan-type RetrievalSettingsWrapperShape = array{
 *   recordType?: string|null,
 *   retrieval?: null|RetrievalSettings|RetrievalSettingsShape,
 * }
 */
final class RetrievalSettingsWrapper implements BaseModel
{
    /** @use SdkModel<RetrievalSettingsWrapperShape> */
    use SdkModel;

    /**
     * Identifies the record type. Always `ai_collection_settings`.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * How documents are retrieved when searching the collection.
     */
    #[Optional]
    public ?RetrievalSettings $retrieval;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RetrievalSettings|RetrievalSettingsShape|null $retrieval
     */
    public static function with(
        ?string $recordType = null,
        RetrievalSettings|array|null $retrieval = null
    ): self {
        $self = new self;

        null !== $recordType && $self['recordType'] = $recordType;
        null !== $retrieval && $self['retrieval'] = $retrieval;

        return $self;
    }

    /**
     * Identifies the record type. Always `ai_collection_settings`.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * How documents are retrieved when searching the collection.
     *
     * @param RetrievalSettings|RetrievalSettingsShape $retrieval
     */
    public function withRetrieval(RetrievalSettings|array $retrieval): self
    {
        $self = clone $this;
        $self['retrieval'] = $retrieval;

        return $self;
    }
}
