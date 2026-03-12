<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceDesigns\VoiceDesignGetResponse\Data;

/**
 * Response envelope for a single voice design with full version detail.
 *
 * @phpstan-import-type DataShape from \Telnyx\VoiceDesigns\VoiceDesignGetResponse\Data
 *
 * @phpstan-type VoiceDesignGetResponseShape = array{data?: null|Data|DataShape}
 */
final class VoiceDesignGetResponse implements BaseModel
{
    /** @use SdkModel<VoiceDesignGetResponseShape> */
    use SdkModel;

    /**
     * A voice design object with full version detail.
     */
    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A voice design object with full version detail.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
