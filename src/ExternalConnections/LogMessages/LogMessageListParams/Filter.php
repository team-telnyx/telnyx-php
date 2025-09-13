<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter\TelephoneNumber;

/**
 * Filter parameter for log messages (deepObject style). Supports filtering by external_connection_id and telephone_number with eq/contains operations.
 *
 * @phpstan-type filter_alias = array{
 *   externalConnectionID?: string, telephoneNumber?: TelephoneNumber
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * The external connection ID to filter by or "null" to filter for logs without an external connection ID.
     */
    #[Api('external_connection_id', optional: true)]
    public ?string $externalConnectionID;

    /**
     * Telephone number filter operations for log messages. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    #[Api('telephone_number', optional: true)]
    public ?TelephoneNumber $telephoneNumber;

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
        ?string $externalConnectionID = null,
        ?TelephoneNumber $telephoneNumber = null
    ): self {
        $obj = new self;

        null !== $externalConnectionID && $obj->externalConnectionID = $externalConnectionID;
        null !== $telephoneNumber && $obj->telephoneNumber = $telephoneNumber;

        return $obj;
    }

    /**
     * The external connection ID to filter by or "null" to filter for logs without an external connection ID.
     */
    public function withExternalConnectionID(string $externalConnectionID): self
    {
        $obj = clone $this;
        $obj->externalConnectionID = $externalConnectionID;

        return $obj;
    }

    /**
     * Telephone number filter operations for log messages. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    public function withTelephoneNumber(TelephoneNumber $telephoneNumber): self
    {
        $obj = clone $this;
        $obj->telephoneNumber = $telephoneNumber;

        return $obj;
    }
}
