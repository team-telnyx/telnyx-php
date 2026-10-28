<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\EmailBracketCursorPagination;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BasicAuthenticationAlsoTheValidationDefault;
use Telnyx\PayConnectors\GenericPayConnectorConfig\BearerAuthentication;
use Telnyx\PayConnectors\GenericPayConnectorConfig\NoProcessorAuthentication;
use Telnyx\PayConnectors\PayConnector;
use Telnyx\PayConnectors\PayConnectorCreateParams\Mode;
use Telnyx\PayConnectors\PayConnectorCreateParams\Type;
use Telnyx\PayConnectors\PayConnectorResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PayConnectorsContract;

/**
 * Generic payment connector configuration.
 *
 * @phpstan-import-type GenericPayConnectorConfigShape from \Telnyx\PayConnectors\GenericPayConnectorConfig
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PayConnectorsService implements PayConnectorsContract
{
    /**
     * @api
     */
    public PayConnectorsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PayConnectorsRawService($client);
    }

    /**
     * @api
     *
     * Create a generic payment connector in the authenticated organization. The name must be unique in that organization. Authentication supplies ownership; do not send user_id or organization_id. Config is encrypted at rest; passwords and tokens are omitted from responses. This operation stores configuration and does not initiate a payment. See the [processor contract](/docs/voice/programmable-voice/pay#request-sent-to-the-payment-processor).
     *
     * @param GenericPayConnectorConfigShape $config Configuration for a generic connector. A config update replaces the complete object, not individual keys. Unknown config keys are discarded. Authentication credentials must be nonblank strings when required by the selected auth_type.
     * @param string $name Unique within the authenticated organization. Used in resource paths and as connector_name in the Call Control Pay request. Cannot be renamed by update.
     * @param Mode|value-of<Mode> $mode Defaults to test on creation. Test restricts collected card numbers but still contacts the configured processor; use a processor sandbox URL and sandbox credentials. Live removes the test-card restriction. Neither mode locks API updates.
     * @param Type|value-of<Type> $type connector type covered by this reference
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        BasicAuthenticationAlsoTheValidationDefault|array|BearerAuthentication|NoProcessorAuthentication $config,
        string $name,
        Mode|string $mode = 'test',
        Type|string $type = 'generic',
        RequestOptions|array|null $requestOptions = null,
    ): PayConnectorResponse {
        $params = [
            'config' => $config, 'name' => $name, 'mode' => $mode, 'type' => $type,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a connector by name within the authenticated organization. Password and token are omitted. A missing name or a connector owned by another organization returns 404.
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): PayConnectorResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($name, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a generic connector by name in the authenticated organization. Both test and live connectors can be updated through the API. Omitted fields remain unchanged. Supplying config replaces the entire config; it does not merge keys. Include endpoint_url and the credentials required for the selected auth_type on every config replacement. Omitting config preserves existing credentials, allowing a mode-only update. The path name cannot be renamed. Public updates use PATCH.
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param GenericPayConnectorConfigShape $config Configuration for a generic connector. A config update replaces the complete object, not individual keys. Unknown config keys are discarded. Authentication credentials must be nonblank strings when required by the selected auth_type.
     * @param \Telnyx\PayConnectors\PayConnectorUpdateParams\Mode|value-of<\Telnyx\PayConnectors\PayConnectorUpdateParams\Mode> $mode Omit to preserve the existing mode. Use an explicit test or live value.
     * @param \Telnyx\PayConnectors\PayConnectorUpdateParams\Type|value-of<\Telnyx\PayConnectors\PayConnectorUpdateParams\Type> $type Generic connector type. Omit to preserve the existing value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $name,
        BasicAuthenticationAlsoTheValidationDefault|array|BearerAuthentication|NoProcessorAuthentication|null $config = null,
        \Telnyx\PayConnectors\PayConnectorUpdateParams\Mode|string|null $mode = null,
        \Telnyx\PayConnectors\PayConnectorUpdateParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): PayConnectorResponse {
        $params = array_filter(
            [
                'config' => $config ?? Omitted::VALUE,
                'mode' => $mode ?? Omitted::VALUE,
                'type' => $type ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($name, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List connectors belonging to the authenticated organization, including connectors created by other users in that organization. Set filter[type]=generic to restrict results to the type covered here. Results default to newest created_at first. Use meta.end_cursor as page[after] for the next page, or meta.start_cursor as page[before] for the preceding page. Omit both cursors for the first page; if both are supplied, page[after] takes precedence. Responses omit passwords and tokens.
     *
     * @param string $filterCreatedAtEq equal to this created_at timestamp
     * @param string $filterCreatedAtGt after this created_at timestamp
     * @param string $filterCreatedAtGte at or after this created_at timestamp
     * @param string $filterCreatedAtLt before this created_at timestamp
     * @param string $filterCreatedAtLte at or before this created_at timestamp
     * @param string $filterMode exact match on mode
     * @param string $filterName exact match on name
     * @param string $filterType exact match on type
     * @param string $filterUpdatedAtEq equal to this updated_at timestamp
     * @param string $filterUpdatedAtGt after this updated_at timestamp
     * @param string $filterUpdatedAtGte at or after this updated_at timestamp
     * @param string $filterUpdatedAtLt before this updated_at timestamp
     * @param string $filterUpdatedAtLte at or before this updated_at timestamp
     * @param string $pageAfter Opaque cursor from meta.end_cursor.
     * @param string $pageBefore Opaque cursor from meta.start_cursor.
     * @param int $pageSize number of records per page
     * @param string $sort comma-separated created_at or updated_at fields, optionally prefixed with - for descending order
     * @param RequestOpts|null $requestOptions
     *
     * @return EmailBracketCursorPagination<PayConnector>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterCreatedAtEq = null,
        ?string $filterCreatedAtGt = null,
        ?string $filterCreatedAtGte = null,
        ?string $filterCreatedAtLt = null,
        ?string $filterCreatedAtLte = null,
        ?string $filterMode = null,
        ?string $filterName = null,
        ?string $filterType = null,
        ?string $filterUpdatedAtEq = null,
        ?string $filterUpdatedAtGt = null,
        ?string $filterUpdatedAtGte = null,
        ?string $filterUpdatedAtLt = null,
        ?string $filterUpdatedAtLte = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        int $pageSize = 25,
        string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): EmailBracketCursorPagination {
        $params = array_filter(
            [
                'filterCreatedAtEq' => $filterCreatedAtEq ?? Omitted::VALUE,
                'filterCreatedAtGt' => $filterCreatedAtGt ?? Omitted::VALUE,
                'filterCreatedAtGte' => $filterCreatedAtGte ?? Omitted::VALUE,
                'filterCreatedAtLt' => $filterCreatedAtLt ?? Omitted::VALUE,
                'filterCreatedAtLte' => $filterCreatedAtLte ?? Omitted::VALUE,
                'filterMode' => $filterMode ?? Omitted::VALUE,
                'filterName' => $filterName ?? Omitted::VALUE,
                'filterType' => $filterType ?? Omitted::VALUE,
                'filterUpdatedAtEq' => $filterUpdatedAtEq ?? Omitted::VALUE,
                'filterUpdatedAtGt' => $filterUpdatedAtGt ?? Omitted::VALUE,
                'filterUpdatedAtGte' => $filterUpdatedAtGte ?? Omitted::VALUE,
                'filterUpdatedAtLt' => $filterUpdatedAtLt ?? Omitted::VALUE,
                'filterUpdatedAtLte' => $filterUpdatedAtLte ?? Omitted::VALUE,
                'pageAfter' => $pageAfter ?? Omitted::VALUE,
                'pageBefore' => $pageBefore ?? Omitted::VALUE,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a connector by name in the authenticated organization. Both test and live connectors can be deleted. Returns no response body on success; a missing name or a connector in another organization returns 404.
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($name, requestOptions: $requestOptions);

        return $response->parse();
    }
}
