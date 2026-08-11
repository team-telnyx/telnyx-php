<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RetrievalSettingsWrapperShape from \Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper
 *
 * @phpstan-type SettingsEnvelopeShape = array{
 *   data?: null|RetrievalSettingsWrapper|RetrievalSettingsWrapperShape
 * }
 */
final class SettingsEnvelope implements BaseModel
{
    /** @use SdkModel<SettingsEnvelopeShape> */
    use SdkModel;

    #[Optional]
    public ?RetrievalSettingsWrapper $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RetrievalSettingsWrapper|RetrievalSettingsWrapperShape|null $data
     */
    public static function with(
        RetrievalSettingsWrapper|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RetrievalSettingsWrapper|RetrievalSettingsWrapperShape $data
     */
    public function withData(RetrievalSettingsWrapper|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
