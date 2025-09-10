<?php

declare(strict_types=1);

namespace Telnyx\Seti;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse\Data;

/**
 * @phpstan-type seti_get_black_box_test_results_response = array{
 *   data?: list<Data>|null
 * }
 */
final class SetiGetBlackBoxTestResultsResponse implements BaseModel
{
    /** @use SdkModel<seti_get_black_box_test_results_response> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
