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
 *   externalConnectionID?: string|null, telephoneNumber?: TelephoneNumber|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The external connection ID to filter by or "null" to filter for logs without an external connection ID.
     */
    #[Optional('external_connection_id')]
    public ?string $externalConnectionID;

    /**
     * Telephone number filter operations for log messages. Use 'eq' for exact matches or 'contains' for partial matches.
     */
    #[Optional('telephone_number')]
    public ?TelephoneNumber $telephoneNumber;

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
     * } $telephoneNumber
     */
    public static function with(
        ?string $externalConnectionID = null,
        TelephoneNumber|array|null $telephoneNumber = null,
    ): self {
        $obj = new self;

        null !== $externalConnectionID && $obj['externalConnectionID'] = $externalConnectionID;
        null !== $telephoneNumber && $obj['telephoneNumber'] = $telephoneNumber;

        return $obj;
    }

    /**
     * The external connection ID to filter by or "null" to filter for logs without an external connection ID.
     */
    public function withExternalConnectionID(string $externalConnectionID): self
    {
        $obj = clone $this;
        $obj['externalConnectionID'] = $externalConnectionID;

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
        $obj['telephoneNumber'] = $telephoneNumber;

        return $obj;
    }
}
