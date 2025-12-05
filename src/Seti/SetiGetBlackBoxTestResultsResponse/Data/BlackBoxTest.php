<?php

declare(strict_types=1);

namespace Telnyx\Seti\SetiGetBlackBoxTestResultsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BlackBoxTestShape = array{
 *   id?: string|null, record_type?: string|null, result?: float|null
 * }
 */
final class BlackBoxTest implements BaseModel
{
    /** @use SdkModel<BlackBoxTestShape> */
    use SdkModel;

    /**
     * The name of the black box test.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $record_type;

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
        ?string $record_type = null,
        ?float $result = null
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $result && $obj['result'] = $result;

        return $obj;
    }

    /**
     * The name of the black box test.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The average result of the black box test over the last hour.
     */
    public function withResult(float $result): self
    {
        $obj = clone $this;
        $obj['result'] = $result;

        return $obj;
    }
}
