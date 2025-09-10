<?php

declare(strict_types=1);

namespace Telnyx\AI\AISummarizeResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{summary: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api]
    public string $summary;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(summary: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withSummary(...)
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
    public static function with(string $summary): self
    {
        $obj = new self;

        $obj->summary = $summary;

        return $obj;
    }

    public function withSummary(string $summary): self
    {
        $obj = clone $this;
        $obj->summary = $summary;

        return $obj;
    }
}
