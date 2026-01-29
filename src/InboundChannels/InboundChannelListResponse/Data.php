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
        $self = new self;

        null !== $channels && $self['channels'] = $channels;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The current number of concurrent channels set for the account.
     */
    public function withChannels(int $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * Identifies the type of the response.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
