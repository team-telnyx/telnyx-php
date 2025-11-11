<?php

declare(strict_types=1);

namespace Telnyx\InboundChannels\InboundChannelListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{channels?: int|null, record_type?: string|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The current number of concurrent channels set for the account.
     */
    #[Api(optional: true)]
    public ?int $channels;

    /**
     * Identifies the type of the response.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
        ?string $record_type = null
    ): self {
        $obj = new self;

        null !== $channels && $obj->channels = $channels;
        null !== $record_type && $obj->record_type = $record_type;

        return $obj;
    }

    /**
     * The current number of concurrent channels set for the account.
     */
    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels;

        return $obj;
    }

    /**
     * Identifies the type of the response.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }
}
