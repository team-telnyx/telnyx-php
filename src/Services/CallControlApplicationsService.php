<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallControlApplications\CallControlApplicationCreateParams;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationInbound;
use Telnyx\CallControlApplications\CallControlApplicationListParams;
use Telnyx\CallControlApplications\CallControlApplicationListResponse;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationOutbound;
use Telnyx\CallControlApplications\CallControlApplicationUpdateParams;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallControlApplicationsContract;

final class CallControlApplicationsService implements CallControlApplicationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a call control application.
     *
     * @param array{
     *   application_name: string,
     *   webhook_event_url: string,
     *   active?: bool,
     *   anchorsite_override?: "\"Latency\""|"\"Chicago, IL\""|"\"Ashburn, VA\""|"\"San Jose, CA\"",
     *   call_cost_in_webhooks?: bool,
     *   dtmf_type?: "RFC 2833"|"Inband"|"SIP INFO",
     *   first_command_timeout?: bool,
     *   first_command_timeout_secs?: int,
     *   inbound?: array{
     *     channel_limit?: int,
     *     shaken_stir_enabled?: bool,
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: "only_my_connections"|"from_anyone",
     *   }|CallControlApplicationInbound,
     *   outbound?: array{
     *     channel_limit?: int, outbound_voice_profile_id?: string
     *   }|CallControlApplicationOutbound,
     *   redact_dtmf_debug_logging?: bool,
     *   webhook_api_version?: "1"|"2",
     *   webhook_event_failover_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }|CallControlApplicationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CallControlApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationNewResponse {
        [$parsed, $options] = CallControlApplicationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'call_control_applications',
            body: (object) $parsed,
            options: $options,
            convert: CallControlApplicationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing call control application.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['call_control_applications/%1$s', $id],
            options: $requestOptions,
            convert: CallControlApplicationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing call control application.
     *
     * @param array{
     *   application_name: string,
     *   webhook_event_url: string,
     *   active?: bool,
     *   anchorsite_override?: "\"Latency\""|"\"Chicago, IL\""|"\"Ashburn, VA\""|"\"San Jose, CA\"",
     *   call_cost_in_webhooks?: bool,
     *   dtmf_type?: "RFC 2833"|"Inband"|"SIP INFO",
     *   first_command_timeout?: bool,
     *   first_command_timeout_secs?: int,
     *   inbound?: array{
     *     channel_limit?: int,
     *     shaken_stir_enabled?: bool,
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: "only_my_connections"|"from_anyone",
     *   }|CallControlApplicationInbound,
     *   outbound?: array{
     *     channel_limit?: int, outbound_voice_profile_id?: string
     *   }|CallControlApplicationOutbound,
     *   redact_dtmf_debug_logging?: bool,
     *   tags?: list<string>,
     *   webhook_api_version?: "1"|"2",
     *   webhook_event_failover_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }|CallControlApplicationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CallControlApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationUpdateResponse {
        [$parsed, $options] = CallControlApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['call_control_applications/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CallControlApplicationUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Return a list of call control applications.
     *
     * @param array{
     *   filter?: array{
     *     application_name?: array{contains?: string},
     *     application_session_id?: string,
     *     connection_id?: string,
     *     failed?: bool,
     *     from?: string,
     *     leg_id?: string,
     *     name?: string,
     *     occurred_at?: array{
     *       eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *     },
     *     'outbound.outbound_voice_profile_id'?: string,
     *     product?: "call_control"|"fax"|"texml",
     *     status?: "init"|"in_progress"|"completed",
     *     to?: string,
     *     type?: "command"|"webhook",
     *   },
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     *   sort?: "created_at"|"connection_name"|"active",
     * }|CallControlApplicationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CallControlApplicationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationListResponse {
        [$parsed, $options] = CallControlApplicationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'call_control_applications',
            query: $parsed,
            options: $options,
            convert: CallControlApplicationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a call control application.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['call_control_applications/%1$s', $id],
            options: $requestOptions,
            convert: CallControlApplicationDeleteResponse::class,
        );
    }
}
