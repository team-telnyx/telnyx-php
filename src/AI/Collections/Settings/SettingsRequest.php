<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RetrievalSettingsShape from \Telnyx\AI\Collections\Settings\RetrievalSettings
 *
 * @phpstan-type SettingsRequestShape = array{
 *   retrieval?: null|RetrievalSettings|RetrievalSettingsShape
 * }
 */
final class SettingsRequest implements BaseModel
{
    /** @use SdkModel<SettingsRequestShape> */
    use SdkModel;

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
    public static function with(RetrievalSettings|array|null $retrieval = null): self
    {
        $self = new self;

        null !== $retrieval && $self['retrieval'] = $retrieval;

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
