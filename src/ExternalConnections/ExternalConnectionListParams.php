<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ConnectionName;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\PhoneNumber;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Page;

/**
 * This endpoint returns a list of your External Connections inside the 'data' attribute of the response. External Connections are used by Telnyx customers to seamless configure SIP trunking integrations with Telnyx Partners, through External Voice Integrations in Mission Control Portal.
 *
 * @see Telnyx\Services\ExternalConnectionsService::list()
 *
 * @phpstan-type ExternalConnectionListParamsShape = array{
 *   filter?: Filter|array{
 *     id?: string|null,
 *     connectionName?: ConnectionName|null,
 *     createdAt?: string|null,
 *     externalSipConnection?: value-of<ExternalSipConnection>|null,
 *     phoneNumber?: PhoneNumber|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class ExternalConnectionListParams implements BaseModel
{
    /** @use SdkModel<ExternalConnectionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   id?: string|null,
     *   connectionName?: ConnectionName|null,
     *   createdAt?: string|null,
     *   externalSipConnection?: value-of<ExternalSipConnection>|null,
     *   phoneNumber?: PhoneNumber|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     *
     * @param Filter|array{
     *   id?: string|null,
     *   connectionName?: ConnectionName|null,
     *   createdAt?: string|null,
     *   externalSipConnection?: value-of<ExternalSipConnection>|null,
     *   phoneNumber?: PhoneNumber|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
