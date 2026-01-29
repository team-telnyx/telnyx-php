<?php

declare(strict_types=1);

namespace Telnyx\Seti\SetiGetBlackBoxTestResultsResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BlackBoxTestShape = array{
 *   id?: string|null, recordType?: string|null, result?: float|null
 * }
 */
final class BlackBoxTest implements BaseModel
{
    /** @use SdkModel<BlackBoxTestShape> */
    use SdkModel;

    /**
     * The name of the black box test.
     */
    #[Optional]
    public ?string $id;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The average result of the black box test over the last hour.
     */
    #[Optional]
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $result && $self['result'] = $result;

        return $self;
    }

    /**
     * The name of the black box test.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The average result of the black box test over the last hour.
     */
    public function withResult(float $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }
}
