<?php

declare(strict_types=1);

namespace Telnyx\MessagingNumbersBulkUpdates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse\Data;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse\Data\RecordType;

/**
 * @phpstan-type MessagingNumbersBulkUpdateNewResponseShape = array{
 *   data?: Data|null
 * }
 */
final class MessagingNumbersBulkUpdateNewResponse implements BaseModel
{
    /** @use SdkModel<MessagingNumbersBulkUpdateNewResponseShape> */
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
     *   order_id?: string|null,
     *   pending?: list<string>|null,
     *   record_type?: value-of<RecordType>|null,
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
     *   order_id?: string|null,
     *   pending?: list<string>|null,
     *   record_type?: value-of<RecordType>|null,
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
