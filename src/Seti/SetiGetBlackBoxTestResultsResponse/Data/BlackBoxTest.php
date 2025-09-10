<?php

declare(strict_types=1);

namespace Telnyx\Seti\SetiGetBlackBoxTestResultsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type black_box_test = array{
 *   id?: string|null, recordType?: string|null, result?: float|null
 * }
 */
final class BlackBoxTest implements BaseModel
{
    /** @use SdkModel<black_box_test> */
    use SdkModel;

    /**
     * The name of the black box test.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The average result of the black box test over the last hour.
     */
    #[Api(optional: true)]
    public ?float $result;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $recordType = null,
        ?float $result = null
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $result && $obj->result = $result;

        return $obj;
    }

    /**
     * The name of the black box test.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The average result of the black box test over the last hour.
     */
    public function withResult(float $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
