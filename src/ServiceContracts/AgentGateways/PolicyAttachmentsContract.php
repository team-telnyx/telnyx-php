<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\PolicyAttachments\AgentGatewayPolicyAttachmentResponse;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PolicyAttachmentsContract
{
    /**
     * @api
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
    ): AgentGatewayPolicyAttachmentResponse;

    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): PolicyAttachmentListResponse;

    /**
     * @api
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
    ): AgentGatewayPolicyAttachmentResponse;
}
