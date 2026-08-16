<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\WebSearchNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\WebSearchNewResponse\Data\Results;

/**
 * @phpstan-import-type ResultsShape from \Telnyx\WebSearch\WebSearchNewResponse\Data\Results
 *
 * @phpstan-type DataShape = array{results?: null|Results|ResultsShape}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Results $results;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Results|ResultsShape|null $results
     */
    public static function with(Results|array|null $results = null): self
    {
        $self = new self;

        null !== $results && $self['results'] = $results;

        return $self;
    }

    /**
     * @param Results|ResultsShape $results
     */
    public function withResults(Results|array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
