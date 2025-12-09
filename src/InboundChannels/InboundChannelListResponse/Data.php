<?php

declare(strict_types=1);

namespace Telnyx\InboundChannels\InboundChannelListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{channels?: int|null, recordType?: string|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The current number of concurrent channels set for the account.
     */
    #[Optional]
    public ?int $channels;

    /**
     * Identifies the type of the response.
     */
    #[Optional('record_type')]
    public ?string $recordType;

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
        ?int $channels = null,
        ?string $recordType = null
    ): self {
        $obj = new self;

        null !== $channels && $obj['channels'] = $channels;
        null !== $recordType && $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The current number of concurrent channels set for the account.
     */
    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj['channels'] = $channels;

        return $obj;
    }

    /**
     * Identifies the type of the response.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }
}
