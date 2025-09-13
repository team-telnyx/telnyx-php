<?php

declare(strict_types=1);

namespace Telnyx\InboundChannels\InboundChannelUpdateResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{channels?: int, recordType?: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The number of channels set for the account.
     */
    #[Api(optional: true)]
    public ?int $channels;

    /**
     * Identifies the type of the response.
     */
    #[Api('record_type', optional: true)]
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

        null !== $channels && $obj->channels = $channels;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The number of channels set for the account.
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
        $obj->recordType = $recordType;

        return $obj;
    }
}
