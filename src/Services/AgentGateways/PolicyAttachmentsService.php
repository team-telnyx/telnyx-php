<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\PolicyAttachments\AgentGatewayPolicyAttachmentResponse;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\PolicyAttachmentsContract;

/**
 * Where an instance applies each policy.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PolicyAttachmentsService implements PolicyAttachmentsContract
{
    /**
     * @api
     */
    public PolicyAttachmentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PolicyAttachmentsRawService($client);
    }

    /**
     * @api
     *
     * Applies a policy to every request, or to the requests for the models named. It applies from the next request on.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param string $policy the policy to apply, by name
     * @param bool $default `true` applies the policy only to the requests no other attachment matches
     * @param list<string> $models The models whose requests the policy applies to, by name. A name can use `*` as a wildcard. Empty applies the policy to every request.
     * @param int|Omitted|null $priority an attachment with a priority applies before the others
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        string $policy,
        bool $default = false,
        array $models = [],
        int|Omitted|null $priority = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayPolicyAttachmentResponse {
        $params = array_filter(
            [
                'policy' => $policy,
                'default' => $default,
                'models' => $models,
                'priority' => $priority,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($instanceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists where the instance applies each policy.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): PolicyAttachmentListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($instanceID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes an attachment and returns it as it was. The policy stays.
     *
     * @param string $attachmentID the attachment's `id`
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $attachmentID,
        string $instanceID,
        RequestOptions|array|null $requestOptions = null,
    ): AgentGatewayPolicyAttachmentResponse {
        $params = ['instanceID' => $instanceID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($attachmentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
