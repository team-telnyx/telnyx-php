<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter\TelephoneNumber;

/**
 * Filter parameter for log messages (deepObject style). Supports filtering by external_connection_id and telephone_number with eq/contains operations.
 *
 * @phpstan-type FilterShape = array{
 *   external_connection_id?: string|null, telephone_number?: TelephoneNumber|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The external connection ID to filter by or "null" to filter for logs without an external connection ID.
     */
    #[Optional]
    public ?string $external_connection_id;

    /**
     * Telephone number filter operations for log messages. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    #[Optional]
    public ?TelephoneNumber $telephone_number;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TelephoneNumber|array{
     *   contains?: string|null, eq?: string|null
     * } $telephone_number
     */
    public static function with(
        ?string $external_connection_id = null,
        TelephoneNumber|array|null $telephone_number = null,
    ): self {
        $obj = new self;

        null !== $external_connection_id && $obj['external_connection_id'] = $external_connection_id;
        null !== $telephone_number && $obj['telephone_number'] = $telephone_number;

        return $obj;
    }

    /**
     * The external connection ID to filter by or "null" to filter for logs without an external connection ID.
     */
    public function withExternalConnectionID(string $externalConnectionID): self
    {
        $obj = clone $this;
        $obj['external_connection_id'] = $externalConnectionID;

        return $obj;
    }

    /**
     * Telephone number filter operations for log messages. Use 'eq' for exact matches or 'contains' for partial matches.
     *
     * @param TelephoneNumber|array{
     *   contains?: string|null, eq?: string|null
     * } $telephoneNumber
     */
    public function withTelephoneNumber(
        TelephoneNumber|array $telephoneNumber
    ): self {
        $obj = clone $this;
        $obj['telephone_number'] = $telephoneNumber;

        return $obj;
    }
}
