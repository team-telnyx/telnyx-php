<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\Research\ResearchGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\WebSearch\Research\ResearchGetResponse\Data
 *
 * @phpstan-type ResearchGetResponseShape = array{data?: null|Data|DataShape}
 */
final class ResearchGetResponse implements BaseModel
{
    /** @use SdkModel<ResearchGetResponseShape> */
    use SdkModel;

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
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
