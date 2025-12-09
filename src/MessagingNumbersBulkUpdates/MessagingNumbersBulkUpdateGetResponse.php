<?php

declare(strict_types=1);

namespace Telnyx\MessagingNumbersBulkUpdates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse\Data;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse\Data\RecordType;

/**
 * @phpstan-type MessagingNumbersBulkUpdateGetResponseShape = array{
 *   data?: Data|null
 * }
 */
final class MessagingNumbersBulkUpdateGetResponse implements BaseModel
{
    /** @use SdkModel<MessagingNumbersBulkUpdateGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   failed?: list<string>|null,
     *   orderID?: string|null,
     *   pending?: list<string>|null,
     *   recordType?: value-of<RecordType>|null,
     *   success?: list<string>|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   failed?: list<string>|null,
     *   orderID?: string|null,
     *   pending?: list<string>|null,
     *   recordType?: value-of<RecordType>|null,
     *   success?: list<string>|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
