<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response envelope for a single voice design with full version detail.
 *
 * @phpstan-import-type VoiceDesignDataShape from \Telnyx\VoiceDesigns\VoiceDesignData
 *
 * @phpstan-type VoiceDesignGetResponseShape = array{
 *   data?: null|VoiceDesignData|VoiceDesignDataShape
 * }
 */
final class VoiceDesignGetResponse implements BaseModel
{
    /** @use SdkModel<VoiceDesignGetResponseShape> */
    use SdkModel;

    /**
     * A voice design object with full version detail.
     */
    #[Optional]
    public ?VoiceDesignData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VoiceDesignData|VoiceDesignDataShape|null $data
     */
    public static function with(VoiceDesignData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A voice design object with full version detail.
     *
     * @param VoiceDesignData|VoiceDesignDataShape $data
     */
    public function withData(VoiceDesignData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
