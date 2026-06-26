<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response envelope for a voice design after a rename operation (no version-specific fields).
 *
 * @phpstan-import-type VoiceDesignSummaryDataShape from \Telnyx\VoiceDesigns\VoiceDesignSummaryData
 *
 * @phpstan-type VoiceDesignRenameResponseShape = array{
 *   data?: null|VoiceDesignSummaryData|VoiceDesignSummaryDataShape
 * }
 */
final class VoiceDesignRenameResponse implements BaseModel
{
    /** @use SdkModel<VoiceDesignRenameResponseShape> */
    use SdkModel;

    /**
     * A summarized voice design object (without version-specific fields).
     */
    #[Optional]
    public ?VoiceDesignSummaryData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VoiceDesignSummaryData|VoiceDesignSummaryDataShape|null $data
     */
    public static function with(VoiceDesignSummaryData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A summarized voice design object (without version-specific fields).
     *
     * @param VoiceDesignSummaryData|VoiceDesignSummaryDataShape $data
     */
    public function withData(VoiceDesignSummaryData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
