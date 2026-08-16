<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\Research\ResearchNewResponse\Data\ResearchResponseAsync;
use Telnyx\WebSearch\Research\ResearchNewResponse\Data\ResearchResponseSync;

/**
 * @phpstan-import-type DataVariants from \Telnyx\WebSearch\Research\ResearchNewResponse\Data
 * @phpstan-import-type DataShape from \Telnyx\WebSearch\Research\ResearchNewResponse\Data
 *
 * @phpstan-type ResearchNewResponseShape = array{data?: DataShape|null}
 */
final class ResearchNewResponse implements BaseModel
{
    /** @use SdkModel<ResearchNewResponseShape> */
    use SdkModel;

    /**
     * Synchronous research response (when `background` is false or unset).
     *
     * @var DataVariants|null $data
     */
    #[Optional]
    public ResearchResponseSync|ResearchResponseAsync|null $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DataShape|null $data
     */
    public static function with(
        ResearchResponseSync|array|ResearchResponseAsync|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Synchronous research response (when `background` is false or unset).
     *
     * @param DataShape $data
     */
    public function withData(
        ResearchResponseSync|array|ResearchResponseAsync $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
